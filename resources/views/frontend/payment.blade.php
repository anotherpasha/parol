@extends('layouts.default')

@section('content')
<section class="sub-page-banner payment">
  <div class="middler-wrapper">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5">
            <h1>Metode<br/>Pembayaran</h1>
            <hr class="primary left" />
            <p class="color-white">
                Selain dengan tersedianya berbagai model pembayaran premi, Asuransi Harta Benda Parolamas juga memberi Anda fleksibilitas dalam melakukan pembayaran premi sesuai dengan kenyamanan Anda
            </p>
            </br>
            <!-- <a href="#" class="btn btn-parolamas btn-md to-section" data-target-to="main">Lihat Lebih Lanjut</a> -->

          </div>

        </div>
    </div>
  </div>
  <div class="icon-scroll">
    <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
  </div>

</section>
<section class="half-center-transparent--top extra-padding payment-description " id="main">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-4 ">
            <h1 class="color-primary">
                Bagaimana Cara</br>
                Membayar Premi?
            </h1>
            <hr class="primary left"/>
            <ol>
              <li>Kartu kredit bisa bayar perbulan ataupun pertahun<br>(Hanya opsi kartu kredit yang bisa bayar perbulan, bayar pertahun dengan transfer, ATM, mobile, e-banking, internet, transfer, alfamart/indomaret)</li>
              <li>Ada waktu 30 hari setelah bayar polis</li>
              <li>Metode pembayaran<br>Kartu kredit: Visa, Mastercard, Amex, etc<br>Metode lain: transfer, ATM, mobile, e-banking, internet, transfer, alfamart/indomaret</li>
              <li>Instruksi akan diberikan di e-mail setelah pembelian terjadi.</li>
            </ol>
            </br></br>
            <a href="http://pembayaran.parolamas.co.id/" class="btn btn-parolamas btn-md to-section" data-target-to="main">LAKUKAN PEMBAYARAN DI SINI</a>

      </div>

    </div>
  </div>
</section>

@endsection
