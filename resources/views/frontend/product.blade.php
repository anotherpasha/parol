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
                Asuransi Harta Benda Parolamas menyediakan perlindungan risiko dasar untuk melindungi bangunan tempat tinggal dan juga perlindungan terhadap segala harta benda di dalam rumah Anda dari kerugian atau kerusakan akibat terjadi kebakaran atau risiko lainnya yang dijamin.
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
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Harta Benda</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Rumah & Harta Benda</a></li>
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
                    <h3 class="color-primary flush-t">Asuransi Rumah & Harta Benda</h3>
                    <p class="color-dark-grey book">
                        Kami memahami bahwa membeli sebuah hunian/tempat tinggal dan harta benda adalah pembelian yang bernilai bagi Anda, kami menyediakan perlindungan risiko dasar untuk melindungi bangunan tempat tinggal dan juga segala harta benda di dalam rumah Anda dari kerugian atau kerusakan akibat terjadi kebakaran atau risiko lainnya yang dijamin.
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
                        <p class="color-dark-grey book description">Termasuk penyebaran api atau panas yang disebabkan oleh kekurang hati-hatian atau kesalahan tertanggung atau pihak lain, akibat menjalarnya api atau panas yang timbul sendiri (self-combustion) atau karena sifat barang itu sendiri atau karena hubungan arus pendek (short circuit).</p>
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
                          Dengan tambahan Premi, maka jaminan Standard Asuransi Kebakaran Indonesia dapat diperluas dengan jaminan tambahan yang diinginkan terhadap kerusakan akibat:
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
  <div role="tabpanel" class="tab-pane" id="profile">profile</div>
  <div role="tabpanel" class="tab-pane" id="messages">messages</div>
</main>
<section class="extra-padding home-contact extra-padding">
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1 class="color-primary ">Hubungi Kami</h1>
            <hr class="primary "/>
            <p class="color-dark-grey">Untuk mendapatkan perlindungan, silahkan tinggalkan informasi diri Anda<br>
            dan tentukan kapan Anda bersedia dihubungi oleh petugas layanan nasabah kami.</p>
            <br><br><br>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
          <form class="" action="index.html" method="post">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input class="form-control grey" type="text" name="" value="">
              </div>
            </div>

            <div class="col-md-7 col-xs-12">
              <div class="form-group">
                <label for="">Alamat Email</label>
                <input class="form-control grey" type="text" name="" value="">
              </div>
            </div>

            <div class="col-md-5 col-xs-12">
              <div class="form-group">
                <label for="">Nomor Telepon</label>
                <input class="form-control grey" type="text" name="" value="">
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="">Waktu dapat dihubungi</label>
                <div class='input-group date'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>

                     <input type='text' class="form-control grey  " id='datepicker' />
                 </div>
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label >&nbsp;</label>
                <div class='input-group date'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>

                     <input type='text' class="form-control grey"  id='hourpicker' />
                 </div>
              </div>
            </div>

            <div class=" col-xs-12">
              <div class="form-group">
                <label >Jenis Asuransi</label>
                <div class="select-custom ">
                  <select class="selectpicker">
                    <option>Asuransi Rumah</option>
                    <option>Asuransi Harta & Benda</option>
                    <option>Asuransi Rumah & Harta Benda</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-xs-12 text-center">
                <br><br>
                <button type="button" name="button" class="btn btn-parolamas btn-md min-width">Kirim</button>
            </div>

          </form>
        </div>
    </div>
  </div>

</section>

@endsection
