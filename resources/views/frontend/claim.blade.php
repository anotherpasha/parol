@extends('layouts.default')

@section('content')
<section class="sub-page-banner claim">
  <div class="middler-wrapper">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5">
            <h1>PROSES <br> KLAIM</h1>
            <hr class="primary left" />
            <p class="color-white">
              Siapa bilang asuransi itu rumit?<br>
              Dengan Asuransi Harta Benda Parolamas,<br> Anda tidak perlu mengalami proses klaim yang berbelit.
            </p>
          </div>

        </div>
    </div>
  </div>
  <div class="icon-scroll">
    <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
  </div>

</section>
<section class="half-center-transparent--top extra-padding claim-description ">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-4">
            <blockquote>
            “Hunian/tempat tinggal
            dan harta benda adalah
            pembelian yang bernilai.”
          </blockquote>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-8 ">
        <div class="about-description-wrapper">
            <h1 class="color-primary">
                Bagaimana Cara</br>
                Membayar Premi?
            </h1>
            <hr class="primary left"/>
            <ol>
              <li>Pilih produk yang Anda inginkan.</li>
              <li>Kami akan mengirimkan tautan ke alamat email Anda, klik tautan tersebut dan pilih cara pembayaran.</li>
              <li>Pilih rencana pembayaran premi.</li>
              <li>Lakukan pembayaran premi sesuai dengan cara yang telah Anda pilih sebelumnya dan...
                  Selamat! Anda sudah resmi terlindungi oleh Asuransi Harta Benda Parolamas.         </li>
            </ol>
        </div>

      </div>

    </div>
  </div>
</section>

@endsection
