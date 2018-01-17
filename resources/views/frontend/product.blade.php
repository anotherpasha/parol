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
            <a href="" class="btn btn-parolamas btn-md">Lihat Lebih Lanjut</a>
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


<main class="tab-content">
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
                        Rumah adalah asset berharga yang melindungi Anda dan keluarga dari panas dan hujan. Kami adalah rekan yang tepat untuk melindungi aset berharga Anda. Asuransi Kebakaran Rumah dari kami memberikan perlindungan risiko dasar untuk melindungi rumah Anda dari kerugian atau kerusakan akibat kebakaran atau risiko perluasannya.
                    </p>
                    <div class="row">
                      <div class="col-xs-12 col-md-10">
                        <div class="button-group-parolamas">
                          <a href="javascript:;" class="btn btn-md btn-parolamas-secondary" >Unduh Brosur</a>
                          <a href="javascript:;" class="btn btn-md btn-parolamas" >Daftar</a>
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

    <section class="grey detail-summary">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-md-4">
                <h3 class="color-primary flush-t">Ringkasan Perlindungan yang Kami Sediakan</h3>
                <hr class="primary left"/>
              </div>
              <div class="col-xs-12 col-md-8 end">
                <div class="row">
                  <div class="col-xs-12">
                    <dl class="">
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-fire.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Kebakaran</h5>
                        <p class="color-dark-grey book description">Termasuk penyebaran api atau panas yang disebabkan oleh kekurang hati-hatian atau kesalahan tertanggung atau pihak lain, akibat menjalarnya api atau panas yang timbul sendiri (<i>self-combustion</i>) atau karena sifat barang itu sendiri atau karena hubungan arus pendek (<i>short circuit</i>).</p>
                      </dt>
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-lightning.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Petir</h5>
                        <p class="color-dark-grey book description">Kerusakan harta benda akibat petir yang menyebabkan api dan menyebabkan kerusakan.</p>
                      </dt>
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-bang.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Ledakan</h5>
                        <p class="color-dark-grey book description">Ledakan yang berasal dari harta benda yang diasuransikan. Artinya pelepasan energi yang terjadi secara mendadak yang dihasilkan dari gas atau uap.</p>
                      </dt>

                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-plane.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Kejatuhan Pesawat Terbang</h5>
                        <p class="color-dark-grey book description">Adalah benturan fisik antara pesawat terbang termasuk helikopter atau segala sesuatu jatuh dari padanya dengan harta benda yang Anda asuransikan.</p>
                      </dt>

                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-smoke.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Asap</h5>
                        <p class="color-dark-grey book description">Kerusakan bagian dari harta benda yang berasal dari kebakaran harta benda yang Anda asuransikan.</p>
                      </dt>


                    </dl>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="half-center-scroll-icon bottom">
        <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
      </div>

    </section>

      <section class="with-scroll-bottom  guarantee-summary  ">
            <!-- Tabs pane -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                      <h3 class="color-primary flush-t">Jaminan Tambahan</br> atau Perluasan</h3>
                      <hr class="primary left"/>
                    </div>
                    <div class="col-xs-12 col-md-8">
                      <p class="color-dark-grey book">
                          Dengan tambahan premi, maka tambahan Perlindungan Rumah & Harta Benda dapat diperluas dengan jaminan tambahan yang diinginkan terhadap kerusakan akibat:
                      </p>
                      <ul class="dotted-list ">
                        <li>Kerusuhan, Pemogokan, Perbuatan Jahat, Huru-hara;</li>
                        <li>Tertabrak Kendaraan;</li>
                        <li>Angin Topan, Badai, Banjir, dan Kerusakan Akibat Air;</li>
                        <li>Tanah Longsor;</li>
                        <li>Biaya-biaya pembersihan puing;</li>
                        <li>Gempa bumi dan letusan gunung berapi (menggunakan jaminan
                           polis terpisah) </li>
                      </ul>

                    </div>
                </div>
            </div>
            <div class="half-center-scroll-icon bottom">
              <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
            </div>

      </section>

      <section class="with-scroll-bottom grey ">
            <!-- Tabs pane -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                      <h3 class="color-primary flush-t">Risiko yang</br>Di kecualikan</h3>
                      <hr class="primary left"/>
                    </div>
                    <div class="col-xs-12 col-md-8">
                      <ul class="dotted-list ">
                        <li>Gempa bumi atau letusan gunung berapi</li>
                        <li>Pemogokan, kerusakan, kegaduhan sipil, perbuatan jahat</li>
                        <li>Perang atau akibat dari pemberontakan bersenjata</li>
                        <li>Reaksi energi nuklir</li>
                        <li>Pembawaan sendiri harta benda yang diasuransikan</li>
                      </ul>

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
                        Salah satu aset berharga dari seseorang adalah harta benda. Izinkan kami melindungi aset berharga Anda. Lindungi harta benda Anda dengan Asuransi Harta Benda Parolamas. Ketenangan hidup yang tidak dapat tergantikan.
                    </p>
                    <div class="row">
                      <div class="col-xs-12 col-md-10">
                        <div class="button-group-parolamas">
                          <a href="javascript:;" class="btn btn-md btn-parolamas-secondary" >Unduh Brosur</a>
                          <a href="javascript:;" class="btn btn-md btn-parolamas" >Daftar</a>
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
    <section class="grey detail-summary">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-md-4">
                <h3 class="color-primary flush-t">Ringkasan Perlindungan yang Kami Sediakan</h3>
                <hr class="primary left"/>
              </div>
              <div class="col-xs-12 col-md-8 end">
                <div class="row">
                  <div class="col-xs-12">
                    <dl class="">
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-fire.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Kebakaran</h5>
                        <p class="color-dark-grey book description">Termasuk penyebaran api atau panas yang disebabkan oleh kekurang hati-hatian atau kesalahan tertanggung atau pihak lain, akibat menjalarnya api atau panas yang timbul sendiri (<i>self-combustion</i>) atau karena sifat barang itu sendiri atau karena hubungan arus pendek (<i>short circuit</i>).</p>
                      </dt>
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-lightning.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Petir</h5>
                        <p class="color-dark-grey book description">Kerusakan harta benda akibat petir yang menyebabkan api dan menyebabkan kerusakan.</p>
                      </dt>
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-bang.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Ledakan</h5>
                        <p class="color-dark-grey book description">Ledakan yang berasal dari harta benda yang diasuransikan. Artinya pelepasan energi yang terjadi secara mendadak yang dihasilkan dari gas atau uap.</p>
                      </dt>

                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-plane.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Kejatuhan Pesawat Terbang</h5>
                        <p class="color-dark-grey book description">Adalah benturan fisik antara pesawat terbang termasuk helikopter atau segala sesuatu jatuh dari padanya dengan harta benda yang Anda asuransikan.</p>
                      </dt>

                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-smoke.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Asap</h5>
                        <p class="color-dark-grey book description">Kerusakan bagian dari harta benda yang berasal dari kebakaran harta benda yang Anda asuransikan.</p>
                      </dt>


                    </dl>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="half-center-scroll-icon bottom">
        <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
      </div>

    </section>

      <section class="with-scroll-bottom  guarantee-summary  ">
            <!-- Tabs pane -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                      <h3 class="color-primary flush-t">Jaminan Tambahan</br> atau Perluasan</h3>
                      <hr class="primary left"/>
                    </div>
                    <div class="col-xs-12 col-md-8">
                      <p class="color-dark-grey book">
                          Dengan tambahan premi, maka tambahan Perlindungan Rumah & Harta Benda dapat diperluas dengan jaminan tambahan yang diinginkan terhadap kerusakan akibat:
                      </p>
                      <ul class="dotted-list ">
                        <li>Kerusuhan, Pemogokan, Perbuatan Jahat, Huru-hara;</li>
                        <li>Tertabrak Kendaraan;</li>
                        <li>Angin Topan, Badai, Banjir, dan Kerusakan Akibat Air;</li>
                        <li>Tanah Longsor;</li>
                        <li>Biaya-biaya pembersihan puing;</li>
                        <li>Gempa bumi dan letusan gunung berapi (menggunakan jaminan
                           polis terpisah) </li>
                      </ul>

                    </div>
                </div>
            </div>
            <div class="half-center-scroll-icon bottom">
              <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
            </div>

      </section>

      <section class="with-scroll-bottom grey ">
            <!-- Tabs pane -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                      <h3 class="color-primary flush-t">Risiko yang</br>Di kecualikan</h3>
                      <hr class="primary left"/>
                    </div>
                    <div class="col-xs-12 col-md-8">
                      <ul class="dotted-list ">
                        <li>Gempa bumi atau letusan gunung berapi</li>
                        <li>Pemogokan, kerusakan, kegaduhan sipil, perbuatan jahat</li>
                        <li>Perang atau akibat dari pemberontakan bersenjata</li>
                        <li>Reaksi energi nuklir</li>
                        <li>Pembawaan sendiri harta benda yang diasuransikan</li>
                      </ul>

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
                        Kami memahami bahwa membeli sebuah hunian/tempat tinggal dan harta benda adalah pembelian yang bernilai bagi Anda, kami menyediakan perlindungan risiko dasar untuk melindungi bangunan tempat tinggal dan juga harta benda di dalam rumah Anda dari kerugian atau kerusakan akibat terjadi kebakaran atau risiko lainnya yang dijamin.
                    </p>
                    <div class="row">
                      <div class="col-xs-12 col-md-10">
                        <div class="button-group-parolamas">
                          <a href="javascript:;" class="btn btn-md btn-parolamas-secondary" >Unduh Brosur</a>
                          <a href="javascript:;" class="btn btn-md btn-parolamas" >Daftar</a>
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
    <section class="grey detail-summary">
      <div class="container">
          <div class="row">
              <div class="col-xs-12 col-md-4">
                <h3 class="color-primary flush-t">Ringkasan Perlindungan yang Kami Sediakan</h3>
                <hr class="primary left"/>
              </div>
              <div class="col-xs-12 col-md-8 end">
                <div class="row">
                  <div class="col-xs-12">
                    <dl class="">
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-fire.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Kebakaran</h5>
                        <p class="color-dark-grey book description">Termasuk penyebaran api atau panas yang disebabkan oleh kekurang hati-hatian atau kesalahan tertanggung atau pihak lain, akibat menjalarnya api atau panas yang timbul sendiri (<i>self-combustion</i>) atau karena sifat barang itu sendiri atau karena hubungan arus pendek (<i>short circuit</i>).</p>
                      </dt>
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-lightning.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Petir</h5>
                        <p class="color-dark-grey book description">Kerusakan harta benda akibat petir yang menyebabkan api dan menyebabkan kerusakan.</p>
                      </dt>
                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-bang.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Ledakan</h5>
                        <p class="color-dark-grey book description">Ledakan yang berasal dari harta benda yang diasuransikan. Artinya pelepasan energi yang terjadi secara mendadak yang dihasilkan dari gas atau uap.</p>
                      </dt>

                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-plane.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Kejatuhan Pesawat Terbang</h5>
                        <p class="color-dark-grey book description">Adalah benturan fisik antara pesawat terbang termasuk helikopter atau segala sesuatu jatuh dari padanya dengan harta benda yang Anda asuransikan.</p>
                      </dt>

                      <dt class="summary-wrapper">
                        <span class="ico">
                          <img src="{{url('/uploads/dummies/icon-smoke.png')}}" alt="">
                        </span>
                        <h5 class="color-primary title">Asap</h5>
                        <p class="color-dark-grey book description">Kerusakan bagian dari harta benda yang berasal dari kebakaran harta benda yang Anda asuransikan.</p>
                      </dt>


                    </dl>
                  </div>
                </div>
              </div>
          </div>
      </div>
      <div class="half-center-scroll-icon bottom">
        <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
      </div>

    </section>

      <section class="with-scroll-bottom  guarantee-summary  ">
            <!-- Tabs pane -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                      <h3 class="color-primary flush-t">Jaminan Tambahan</br> atau Perluasan</h3>
                      <hr class="primary left"/>
                    </div>
                    <div class="col-xs-12 col-md-8">
                      <p class="color-dark-grey book">
                          Dengan tambahan premi, maka tambahan Perlindungan Rumah & Harta Benda dapat diperluas dengan jaminan tambahan yang diinginkan terhadap kerusakan akibat:
                      </p>
                      <ul class="dotted-list ">
                        <li>Kerusuhan, Pemogokan, Perbuatan Jahat, Huru-hara;</li>
                        <li>Tertabrak Kendaraan;</li>
                        <li>Angin Topan, Badai, Banjir, dan Kerusakan Akibat Air;</li>
                        <li>Tanah Longsor;</li>
                        <li>Biaya-biaya pembersihan puing;</li>
                        <li>Gempa bumi dan letusan gunung berapi (menggunakan jaminan
                           polis terpisah) </li>
                      </ul>

                    </div>
                </div>
            </div>
            <div class="half-center-scroll-icon bottom">
              <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
            </div>

      </section>

      <section class="with-scroll-bottom grey ">
            <!-- Tabs pane -->
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-4">
                      <h3 class="color-primary flush-t">Risiko yang</br>Di kecualikan</h3>
                      <hr class="primary left"/>
                    </div>
                    <div class="col-xs-12 col-md-8">
                      <ul class="dotted-list ">
                        <li>Gempa bumi atau letusan gunung berapi</li>
                        <li>Pemogokan, kerusakan, kegaduhan sipil, perbuatan jahat</li>
                        <li>Perang atau akibat dari pemberontakan bersenjata</li>
                        <li>Reaksi energi nuklir</li>
                        <li>Pembawaan sendiri harta benda yang diasuransikan</li>
                      </ul>

                    </div>
                </div>
            </div>
            <div class="half-center-scroll-icon bottom">
              <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
            </div>

      </section>
  </div>
</main>

<!-- section contact -->
@include('partials.contact-form')

@include('partials.toggled-calculator')

@endsection
