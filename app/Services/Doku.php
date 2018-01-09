<?php

namespace App\Services;

use App\Models\DokuCheckout;
use App\Models\DokuResponseCode;
use App\Services\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Doku extends PaymentGateway
{
    protected $mallId;
    protected $sharedKey;

    public function __construct()
    {
        $this->mallId = config('misc.doku.mall_id');
        $this->sharedKey = config('misc.doku.shared_key');
    }

    public function getParameters($billingDetail)
    {
        $grandTotal = $billingDetail['amount'];

        $amount = number_format($grandTotal, 2, '.', '');
        $basket = $billingDetail['description'] . ',' . $amount . ',1,' . $amount;
        $transId = $billingDetail['order_id'];
        $words = sha1(trim($amount) . trim($this->mallId) .  trim($this->sharedKey) . trim($transId));
        $idrCurrency = '360';
        $sessionId = session()->getId();

        $params = [
            'url'              => config('misc.doku.api_url'),
            'MALLID'           => $this->mallId,
            'CHAINMERCHANT'    => 'NA',
            'AMOUNT'           => $amount,
            'PURCHASEAMOUNT'   => $amount,
            'TRANSIDMERCHANT'  => $transId,
            'WORDS'            => $words,
            'REQUESTDATETIME'  => date('YmdHis'),
            'CURRENCY'         => $idrCurrency,
            'PURCHASECURRENCY' => $idrCurrency,
            'SESSIONID'        => $sessionId,
            'PAYMENTCHANNEL'   => "",
            'NAME'             => $billingDetail['name'],
            'EMAIL'            => $billingDetail['email'],
            'MOBILEPHONE'      => $billingDetail['phone'],
            'BASKET'           => $basket,
        ];

        $trx['ipAddress'] = request()->ip();
        $trx['processType'] = 'REQUEST';
        $trx['orderId'] = $transId;
        $trx['amount'] = $amount;
        $trx['sessionId'] = $sessionId;
        $trx['words'] = $words;
        $trx['message'] = "Transaction request start";

        $this->saveDokuCheckout($trx);

        return $params;
    }

    public function notify(Request $request)
    {
        Log::warning('NOTIFYING');

        // get the parameters
        $trx['words'] = ( $request->has('WORDS') ? $request->get('WORDS') : '' );
        $trx['amount'] = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
        $trx['orderId'] = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
        $trx['resultMessage'] = ( $request->has('RESULTMSG') ? $request->get('RESULTMSG') : '' );
        $trx['verifyStatus'] = ( $request->has('VERIFYSTATUS') ? $request->get('VERIFYSTATUS') : '' );
        $trx['sessionId'] = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );
        $trx['ipAddress'] = $request->ip();

        // check IP first
        // if ($this->checkDokuIP($request)) {
            // Log::warning('NOTIFYING -- IP PASSED');
            $wordsGenerated = sha1($trx['amount'] . $this->mallId . $this->sharedKey . $trx['orderId'] . $trx['resultMessage'] . $trx['verifyStatus']);

            if ($trx['words'] == $wordsGenerated) {
                Log::warning('NOTIFYING -- WORD PASSED');
                $trx['responseCode'] = ( $request->has('RESPONSECODE') ? $request->get('RESPONSECODE') : '' );
                $trx['approvalCode'] = ( $request->has('APPROVALCODE') ? $request->get('APPROVALCODE') : '' );
                $trx['paymentChannel'] = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
                $trx['paymentCode'] = ( $request->has('PAYMENTCODE') ? $request->get('PAYMENTCODE') : '' );
                $trx['bank'] = ( $request->has('BANK') ? $request->get('BANK') : '' );
                $trx['creditCard'] = ( $request->has('MCN') ? $request->get('MCN') : '' );
                $trx['paymentDateTime'] = ( $request->has('PAYMENTDATETIME') ? $request->get('PAYMENTDATETIME') : '' );
                $trx['verifyId'] = ( $request->has('VERIFYID') ? $request->get('VERIFYID') : '' );
                $trx['verifyScore'] = ( $request->has('VERIFYSCORE') ? $request->get('VERIFYSCORE') : '' );
                $trx['notifyType'] = ( $request->has('STATUSTYPE') ? $request->get('STATUSTYPE') : '' );

                Log::warning('NOTIFYING -- TRX => ' . \GuzzleHttp\json_encode($trx));

                if ($this->checkTransaction($trx) > 0) {
                    if ( $trx['resultMessage'] == "SUCCESS"
                        && $trx['notifyType'] == "P"
                        && in_array($trx['paymentChannel'], $this->getAtmPaymentChannel()) ) {
                            $trx['message'] = "Notify process message come from DOKU. Success : completed";
                            $status = self::COMPLETED;
                    }

                    if ( $trx['resultMessage'] == "SUCCESS"
                        && $trx['notifyType'] == "P" ) {
                            $trx['message'] = "Notify process message come from DOKU. Success : completed";
                            $status = self::COMPLETED;
                    } elseif ($trx['resultMessage'] == "FAILED"
                        && $trx['notifyType']=="P") {
                            $trx['message'] = "Notify process message come from DOKU. Transaction failed : canceled";
                            $status = self::CANCELLED;
                    } elseif ( $trx['notifyType']=="V" ) {
                        $trx['message'] = "Notify process message come from DOKU. Void by EDU : canceled";
                        $status = self::CANCELLED;
                    } else {
                        $trx['message'] = "Notify process message come from DOKU, use default rule : canceled";
                        $status = self::CANCELLED;
                    }
                    // update status, send email, etc
                    $this->updateOrderStatus($trx['orderId'], $status, 'DOKU');
                    $word = 'Continue';
                } else {
                    Log::warning('NOTIFYING -- INVLID REQUEST');
                    $trx['message'] = 'Invalid Request';
                    $word = 'Stop : Invalid Request';
                }
            } else {
                Log::warning('NOTIFYING -- WORD FAILED');
                $trx['message'] = 'Wrong Signature';
                $word = 'Stop : Wrong signature';
            }
        // } else {
        //     Log::warning('NOTIFYING -- IP FAILED');
        //     $word = "Stop : IP Not Allowed";
        // }

        $trx['processType'] = 'NOTIFY';
        $this->saveDokuCheckout($trx);

        return $word;
    }

    public function redirect(Request $request)
    {
        if (count($request->all()) < 1) {
            $trx['orderStatus'] = self::CANCELLED;
            $trx['message'] = 'Unknown error';
            $trx['errorMessage'] = 'Unknown error';
            return $trx;
        } else {
            $trx['words'] = ( $request->has('WORDS') ? $request->get('WORDS') : '' );
            $trx['amount'] = ( $request->has('AMOUNT') ? $request->get('AMOUNT') : '' );
            $trx['orderId'] = ( $request->has('TRANSIDMERCHANT') ? $request->get('TRANSIDMERCHANT') : '' );
            $trx['statusCode'] = ( $request->has('STATUSCODE') ? $request->get('STATUSCODE') : '' );
            $trx['processType'] = 'REDIRECT';
            $wordsGenerated = sha1($trx['amount'] . $this->sharedKey . $trx['orderId'] . $trx['statusCode']);
            if ( $trx['words'] == $wordsGenerated ) {
                Log::warning('=== RIGHT WORD ===');
                $trx['paymentChannel'] = ( $request->has('PAYMENTCHANNEL') ? $request->get('PAYMENTCHANNEL') : '' );
                $trx['paymentCode'] = ( $request->has('PAYMENTCODE') ? $request->get('PAYMENTCODE') : '' );
                $trx['sessionId'] = ( $request->has('SESSIONID') ? $request->get('SESSIONID') : '' );
                $trx['ipAddress'] = $request->ip();
                // skip notify if using atm / alfa / va
                if ( in_array($trx['paymentChannel'], $this->getAtmPaymentChannel()) && $trx['statusCode'] == "5511" ) {
                    $trx['message'] = "Redirect process come from DOKU. Transaction is pending for payment";
                    $trx['orderStatus'] = self::HOLD;
                } else if ($trx['statusCode'] == "5510") {
                    $trx['message'] = "Redirect process come from DOKU. Transaction is cancelled by User.";
                    $trx['errorMessage'] = $this->getDokuResponse($trx['statusCode']);
                    $trx['orderStatus'] = self::CANCELLED;
                } else {
                    // check for notify
                    switch ($trx['statusCode'])
                    {
                        case "0000":
                            $resultMsg = "SUCCESS";
                            break;
                        default:
                            $resultMsg = "FAILED";
                            break;
                    }

                    $result = $this->checkTransaction($trx, 'NOTIFY', $resultMsg);

                    if ( $result < 1 ) {
                        Log::warning('=== NO NOTIFY ===');
                        $checkStatusResult = $this->checkStatus($trx);

                        if ( $checkStatusResult == 'SUCCESS' ) {
                            Log::warning('=== CHECKED - SUCCEED ===');
                            $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction is Success. Please check on Back Office.";
                            $trx['orderStatus'] = self::COMPLETED;
                        } else {
                            if ( $trx['statusCode'] == "0000" && $checkStatusResult == "NOT SUPPORT" ) {
                                Log::warning('=== CHECKED - NOT SUPPORT ===');
                                $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction got Success Status Code. Please check on Back Office.";
                                $trx['orderStatus'] = self::PENDING;
                            } else {
                                Log::warning('=== CHECKED - FAILED ===');
                                $trx['message'] = "Redirect process with no notify message come from DOKU. Transaction is Failed. Please check on Back Office.";
                                $trx['orderStatus'] = self::CANCELLED;
                                $trx['errorMessage'] = $this->getDokuResponse($trx['statusCode']);
                            }
                        }
                    } else {
                        if ( $trx['statusCode'] == "0000" ) {
                            $trx['message'] = "Redirect process message come from DOKU with succeed notify. Transaction is Success";
                            $trx['orderStatus'] = self::COMPLETED;
                        } else {
                            $trx['message'] = "Redirect process message come from DOKU with failed notify. Transaction is Failed";
                            $trx['orderStatus'] = self::CANCELLED;
                            $trx['errorMessage'] = $this->getDokuResponse($trx['statusCode']);
                        }
                    }
                }
            } else {
                Log::warning('=== DONT HAVE WORDS ===');
                // invalid request
                $trx['message'] = 'Invalid signature. Transaction is Failed';
                $trx['errorMessage'] = 'Invalid signature. Transaction is Failed';
                $trx['orderStatus'] = self::CANCELLED;
            }
        }

        if ($this->isRedirectExists($trx['orderId'])) {
            $trx['message'] = 'Invalid request.';
            $trx['errorMessage'] = 'Invalid request.';
            $trx['orderStatus'] = self::CANCELLED;
        } else {
            // $this->updateOrderStatus($trx['orderId'], $trx['orderStatus'], 'DOKU');
            $this->saveDokuCheckout($trx);
        }

        return $trx;
    }

    public function checkStatus($trx, $returnType = 'string')
    {
        $checkStatusUrl = config('misc.doku.url_check_status');
        $mallId = $this->mallId;
        $sharedKey = $this->sharedKey;
        $chainMerchant = 'NA';
        $transIdMerchant = $trx['orderId'];
        $sessionId = $trx['sessionId'];
        $words = sha1($mallId.$sharedKey.$transIdMerchant);

        $data = "MALLID=".$mallId."&CHAINMERCHANT=".$chainMerchant."&TRANSIDMERCHANT=".$transIdMerchant."&SESSIONID=".$sessionId."&PAYMENTCHANNEL=&WORDS=".$words;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $checkStatusUrl);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $output = curl_exec($ch);
        $curl_errno = curl_errno($ch);
        $curl_error = curl_error($ch);
        curl_close($ch);


        $status = 'failed';

        if ($curl_errno > 0)
        {
            Log::warning("DOKU CHECK STATUS ==> connection error");
            return "Stop : Connection Error";
        }

        libxml_use_internal_errors(true);
        $xml = simplexml_load_string($output);

        if ( $xml )
        {
//             var_dump($xml); exit();
            $trx['ipAddress'] = request()->ip();
            $trx['processType'] = "CHECKSTATUS";
            $trx['orderId'] = (string) $xml->TRANSIDMERCHANT;
            $trx['amount'] = (string) $xml->AMOUNT;
            $trx['notifyType'] = (string) $xml->STATUSTYPE;
            $trx['responseCode'] = (string) $xml->RESPONSECODE;
            $trx['resultMsg'] = (string) $xml->RESULTMSG;
            $trx['approvalCode'] = (string) $xml->APPROVALCODE;
            $trx['paymentChannel'] = (string) $xml->PAYMENTCHANNEL;
            $trx['paymentCode'] = (string) $xml->PAYMENTCODE;
            $trx['words'] = (string) $xml->WORDS;
            $trx['sessionId'] = (string) $xml->SESSIONID;
            $trx['bank'] = (string) $xml->BANK;
            $trx['creditCard'] = (string) $xml->MCN;
            $trx['verifyId'] = (string) $xml->VERIFYID;
            $trx['verifyScore'] = (int) $xml->VERIFYSCORE;
            $trx['verifyStatus'] = (string) $xml->VERIFYSTATUS;
            $trx['message'] = 'Checking payment status from doku.';

            # Insert transaction check status to table onecheckout
            //$this->saveDokuCheckout($trx);

            $trx['statusMessage'] = (string) $xml->RESULTMSG;

            if (! in_array($trx['paymentChannel'], ['01', '15', '04'])  )
            {
                $status = "NOT SUPPORT";
            }

            $status = $trx['statusMessage'];
        } else {
            $trx['statusMessage'] = 'Unknown Error';
        }

        if ($returnType == 'string') {
            return $status;
        } else {
            return $trx;
        }
    }

    public function saveDokuCheckout(array $datas)
    {
        $data['ip_address'] = ( isset($datas['ipAddress']) ? $datas['ipAddress'] : '' );
        $data['process_type'] = ( isset($datas['processType']) ? $datas['processType'] : '' );
        $data['order_id'] = ( isset($datas['orderId']) ? ($datas['orderId'] == '' ? 0 : $datas['orderId']) : 0);
        $data['amount'] = ( isset($datas['amount']) ? ($datas['amount'] == '' ? 0 : $datas['amount'])  : '0');
        $data['response_code'] = ( isset($datas['responseCode']) ? $datas['responseCode'] : '' );
        $data['status_code'] = ( isset($datas['statusCode']) ? $datas['statusCode'] : '' );
        $data['result_msg'] = ( isset($datas['resultMsg']) ? $datas['resultMsg'] : '' );
        $data['payment_channel'] = ( isset($datas['paymentChannel']) ? $datas['paymentChannel'] : '' );
        $data['payment_datetime'] = ( isset($datas['paymentDateTime']) ? ($datas['paymentDateTime'] == '' ? NULL : $datas['paymentDateTime']) : NULL );
        $data['payment_code'] = ( isset($datas['paymentCode']) ? $datas['paymentCode'] : '' );
        $data['words'] = ( isset($datas['words']) ? $datas['words'] : '' );
        $data['session_id'] = ( isset($datas['sessionId']) ? $datas['sessionId'] : '' );
        $data['bank'] = ( isset($datas['bank']) ? $datas['bank'] : '' );
        $data['credit_card'] = ( isset($datas['creditCard']) ? $datas['creditCard'] : '' );
        $data['message'] = ( isset($datas['message']) ? $datas['message'] : '' );

        DokuCheckout::create($data);
    }

    private function getAtmPaymentChannel()
    {
        return ['5', '05', '14', '21', '22'];
    }

    private function checkTransaction($trx, $process = 'REQUEST', $resultMsg = '')
    {
        if ( $resultMsg == "PENDING" ) return 0;

        $orderId = $trx['orderId'];
        $sessionId = $trx['sessionId'];
        $amount = $trx['amount'];

        $query = DokuCheckout::where('order_id', $orderId)
            ->where('session_id', $sessionId)
            ->where('amount', $amount)
            ->where('process_type', $process);

        if ($resultMsg != '') {
            $query = $query->where('result_msg', $resultMsg);
        }

        return $query->count();
    }

    private function checkDokuIP(Request $request)
    {
        $ipAddress = $request->ip();
        $ipRange = '103.10.129.';
        Log::warning($ipAddress);
        return ( substr($ipAddress,0,strlen($ipRange)) == $ipRange );
    }

    private function isRedirectExists($orderId)
    {
        return DokuCheckout::where('order_id', $orderId)
            ->where('process_type', 'REDIRECT')
            ->exists();
    }

    private function getDokuResponse($paymentCode)
    {
        $codeQuery = DokuResponseCode::where('code', $paymentCode);
        if ($codeQuery->count() > 0) {
            $code = $codeQuery->first();
            if ($code->visa_description != '') {
                return $code->visa_description;
            } elseif ($code->master_description != '') {
                return $code->master_description;
            } elseif ($code->general_description != '') {
                return $code->general_description;
            } else {
                return '';
            }
        }

        return '';
    }
}
