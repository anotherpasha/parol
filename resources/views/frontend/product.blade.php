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
                Asuransi Rumah & Harta Benda Parolamas menyediakan perlindungan risiko dasar untuk bangunan tempat tinggal dan juga perlindungan terhadap harta benda di dalam rumah Kamu dari kerugian atau kerusakan akibat terjadi kebakaran atau risiko lainnya yang dijamin.
            </p>
            <!-- <a href="#" class="btn btn-parolamas btn-md to-section" data-target-to="main">Lihat Lebih Lanjut</a> -->
          </div>

        </div>
    </div>
  </div>
</section>
<section class="tabs-navigation">
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Rumah</a></li>
    <li role="presentation"><a href="#goods" aria-controls="profile" role="tab" data-toggle="tab">Harta Benda</a></li>
    <li role="presentation"><a href="#home_goods" aria-controls="messages" role="tab" data-toggle="tab">Rumah & Harta Benda</a></li>
  </ul>
</section>


<main class="tab-content" id="main">
  <div role="tabpanel" class="tab-pane active" id="home">
    <section class="with-scroll-bottom  product-summary  ">
          <!-- Tabs pane -->
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-md-1">
                    <span class="product-icon home"></span>
                  </div>
                  <div class="col-xs-12 col-md-7 end">
                    <h3 class="color-primary flush-t">Asuransi Rumah</h3>
                    <p class="color-dark-grey book">
                        Rumah adalah aset berharga yang melindungi Kamu dan keluarga dari panas dan hujan. Kami adalah rekan yang tepat untuk melindungi aset berharga Kamu. Asuransi Kebakaran Rumah dari kami memberikan perlindungan risiko dasar untuk melindungi rumah Kamu dari kerugian atau kerusakan akibat kebakaran atau risiko perluasannya.
                    </p>
                    <div class="row">
                      <div class="col-xs-12 col-md-10">
                        <div class="button-group-parolamas">
                          <a href="{{ url('uploads/brochures/Brosur_Fire_Insurance_OJK_submission_V.1.4c.pdf') }}" target="_blank" class="btn btn-md btn-parolamas-secondary" >Unduh Brosur</a>
                          <a href="javacript:;" class="btn btn-md btn-parolamas to-section" data-target-to="contact">Daftar</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="half-center-scroll-icon bottom">
            <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
          </div>

    </section>

  </div>
  <div role="tabpanel" class="tab-pane" id="goods">
    <section class="with-scroll-bottom  product-summary  ">
          <!-- Tabs pane -->
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-md-1">
                    <span class="product-icon goods"></span>
                  </div>
                  <div class="col-xs-12 col-md-7 end">
                    <h3 class="color-primary flush-t">Asuransi Harta Benda</h3>
                    <p class="color-dark-grey book">
                        Salah satu aset berharga dari seseorang adalah harta benda. Izinkan kami melindungi aset berharga Kamu. Lindungi harta benda Kamu dengan Asuransi Harta Benda Parolamas. Ketenangan hidup yang tidak dapat tergantikan.
                    </p>
                    <div class="row">
                      <div class="col-xs-12 col-md-10">
                        <div class="button-group-parolamas">
                          <a href="{{ url('uploads/brochures/Brosur_Fire_Insurance_OJK_submission_V.1.4c.pdf') }}" target="_blank" class="btn btn-md btn-parolamas-secondary" >Unduh Brosur</a>
                          <a href="javascript:;" class="btn btn-md btn-parolamas to-section" data-target-to="contact" >Daftar</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="half-center-scroll-icon bottom">
            <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
          </div>

    </section>


  </div>
  <div role="tabpanel" class="tab-pane" id="home_goods">
    <section class="with-scroll-bottom  product-summary  ">
          <!-- Tabs pane -->
          <div class="container">
              <div class="row">
                  <div class="col-xs-12 col-md-1">
                    <span class="product-icon goods-home"></span>
                  </div>
                  <div class="col-xs-12 col-md-7 end">
                    <h3 class="color-primary flush-t">Asuransi Rumah & Harta Benda</h3>
                    <p class="color-dark-grey book">
                        Kami memahami bahwa membeli sebuah hunian/tempat tinggal dan harta benda adalah pembelian yang bernilai bagi Kamu, kami menyediakan perlindungan risiko dasar untuk melindungi bangunan tempat tinggal dan juga harta benda di dalam rumah Kamu dari kerugian atau kerusakan akibat terjadi kebakaran atau risiko lainnya yang dijamin.
                    </p>
                    <div class="row">
                      <div class="col-xs-12 col-md-10">
                        <div class="button-group-parolamas">
                          <a href="{{ url('uploads/brochures/Brosur_Fire_Insurance_OJK_submission_V.1.4c.pdf') }}" target="_blank" class="btn btn-md btn-parolamas-secondary" >Unduh Brosur</a>
                          <a href="javascript:;" class="btn btn-md btn-parolamas to-section" data-target-to="contact" >Daftar</a>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="half-center-scroll-icon bottom">
            <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
          </div>

    </section>

  </div>

    @include('partials.product-summary')

    @include('partials.product-extra')

    <!-- @include('partials.product-excluded') -->
</main>

<!-- section contact -->
<!-- @include('partials.contact-form') -->

<!-- @include('partials.toggled-calculator') -->

@endsection
