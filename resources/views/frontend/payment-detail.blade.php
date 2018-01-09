<!DOCTYPE html>
<html>
<head>
    <title>Billing Detail</title>
</head>
<body>
    <form method="post" action="{!! $dokuParams['url'] !!}">
        Name : {!! $billingDetail['name'] !!}<br/>
        Email : {!! $billingDetail['email'] !!}<br/>
        Phone : {!! $billingDetail['phone'] !!}<br/>
        @foreach($dokuParams as $key => $val)
            <input type="hidden" name="{!! $key !!}" value="{!! $val !!}">
        @endforeach
        <button type="submit">Pay With Doku</button>
    </form>
</body>
</html>
