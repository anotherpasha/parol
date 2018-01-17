@extends('layouts.default')

@section('content')
<section class="sub-page-banner about">
  <div class="middler-wrapper">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5">
            <h1>Tentang </br>Parolamas</h1>
            <hr class="primary left" />
            <p class="color-white">
              Di Indonesia, Parolamas memulai operasinya pada tahun 1964 dan telah berpengalaman lebih dari
              53 tahun dalam memberikan perlindungan asuransi umum kepada nasabah perorangan
              dan bisnis.
            </p>
          </div>

        </div>
    </div>
  </div>
  <div class="icon-scroll">
    <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
  </div>

</section>
<section class="half-center-transparent--top extra-padding with-scroll-bottom about-description ">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6">
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
      <div class="col-xs-12 col-md-6 ">
        <div class="about-description-wrapper">
          <p class="color-dark-grey medium">
            PT Asuransi Parolamas (Parolamas) adalah bagian perusahaan dari Grup IAG, perusahaan asuransi umum terbesar di Australia dan Selandia Baru, dan juga salah satu asuransi umum terkemuka di Asia Pasifik. IAG memiliki pengalaman lebih dari 150 tahun dalam menyediakan asuransi bagi individu, keluarga dan bisnis.
            </p>
          <p  class="color-dark-grey medium">
            </br>
            Pada bulan April 2015, IAG mengakuisisi Parolamas, dan memiliki kepemilikan saham 80%. Parolamas terus mendapatkan kepercayaan masyarakat Indonesia dalam memberikan pelayanan terbaik kepada mitra bisnis dan nasabah saat mereka membutuhkan.
          </p>
        </div>

      </div>

    </div>
  </div>
  <div class="half-center-scroll-icon bottom">
    <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
  </div>
</section>


<section class="extra-padding with-scroll-bottom grey ">
  @include('partials.our-product')
</section>
@endsection
