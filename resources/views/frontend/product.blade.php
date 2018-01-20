@extends('layouts.default')

@section('content')

<section class="sub-page-banner product">
  <div class="middler-wrapper">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5">
            <h1>Informasi Produk</h1>
            <hr class="primary left" />
            <p class="color-white">
                Asuransi Rumah & Harta Benda Parolamas menyediakan perlindungan risiko dasar untuk bangunan tempat tinggal dan juga perlindungan terhadap harta benda di dalam rumah Anda dari kerugian atau kerusakan akibat terjadi kebakaran atau risiko lainnya yang dijamin.
            </p>
            <a href="#" class="btn btn-parolamas btn-md to-section" data-target-to="main">Lihat Lebih Lanjut</a>
          </div>

        </div>
    </div>
  </div>
  <div class="icon-scroll">
    <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
  </div>

</section>

<section class="with-scroll-bottom  product-summary half-center-transparent--top extra-padding with-scroll-bottom   ">
  <div class="container">
    
    @foreach($products as $product)
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <dl class="text-center">
            <dt>
              <span class="product-icon {{ $icons[$loop->index] }}"></span>
            </dt>
            <dt>
              <h3 class="color-primary">{{ $product->translations->first()->title }}</h3>
            </dt>
            <dt>
              <p class="color-dark-grey book f-s-16">{!! $product->translations->first()->content !!}</p>
            </dt>
          </dl>
        </div>
      </div>
      @if (!$loop->last)
        <br/>
        <hr class="primary small">
        <br/>
      @endif    
    @endforeach


    <!-- <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <dl class="text-center">
          <dt>
            <span class="product-icon home"></span>
          </dt>
          <dt>
            <h3 class="color-primary">Asuransi Rumah</h3>
          </dt>
          <dt>
            <p class="color-dark-grey book f-s-16">Rumah adalah aset berharga yang melindungi kamu dan keluargamu dari panas dan hujan, juga tempatmu membangun memori-memori bersama orang-orang terdekatmu. Asuransi Rumah dari kami menjamin perlindungan dari kerugian atau kerusakan akibat kebakaran atau risiko lainnya.</p>
          </dt>
        </dl>
      </div>
    </div>
    <br/>
    <hr class="primary small">
    <br/>

    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <dl class="text-center">
          <dt>
            <span class="product-icon goods"></span>
          </dt>
          <dt>
            <h3 class="color-primary">Asuransi Harta Benda</h3>
          </dt>
          <dt>
            <p class="color-dark-grey book f-s-16">Izinkan kami melindungi aset berharga milikmu. Berikan perlindungan untuk harta benda yang berada di dalam rumahmu dengan Asuransi Harta Benda dari kami. Ketenangan hidup yang tidak dapat tergantikan.</p>
          </dt>
        </dl>
      </div>
    </div>
    <br/>
    <hr class="primary small">
    <br/>

    <div class="row">
      <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <dl class="text-center">
          <dt>
            <span class="product-icon home-goods"></span>
          </dt>
          <dt>
            <h3 class="color-primary ">Asuransi Rumah & Harta Benda</h3>
          </dt>
          <dt>
            <p class="color-dark-grey book f-s-16">Kami memahami bahwa membeli sebuah hunian/tempat tinggal
  dan harta benda adalah pembelian yang bernilai bagimu. Kami menyediakan perlindungan risiko dasar untuk melindungi bangunan tempat tinggal dan juga segala harta benda di dalam rumahmu dari kerugian atau kerusakan akibat kebakaran atau risiko lainnya yang dijamin.</p>
          </dt>
        </dl>
      </div>
    </div> -->

  </div>
  <div class="half-center-scroll-icon bottom">
    <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
  </div>

</section>
@include('partials.product-summary')

@include('partials.product-extra')

@include('partials.toggled-calculator')

@endsection
