@extends('layouts.default')

@section('content')
  <section class="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      </ol>

      <div class="icon-scroll">
        <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
      </div>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img src="{{url('/uploads/dummies/img-slider-01.jpg')}}" alt="image contains people and home">
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Persetujuan</br>
                  Klaim Dalam</br>
                  7 Hari
                </h1>
                <hr class="primary left" />
                <p class="paragraph">Parolamas memberikan kepastian atas klaim Anda dalam jangka waktu 7 hari sehingga Anda tidak lagi harus cemas menunggu lama.
                </p>
                <a href="" class="btn btn-parolamas btn-md">Lihat Lebih Lanjut</a>
              </div>

          </div>
        </div>

        <div class="item">
          <img src="{{url('/uploads/dummies/img-slider-02.jpg')}}" alt="image contains clock and table">
          <div class="custom-carousel-caption">
          </div>
        </div>

      </div>

    </div>
  </section>
  <section class="half-center-transparent--top extra-padding with-scroll-bottom ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="color-primary text-center">Produk Kami</h1>
                <hr class="primary"/>
                <br><br><br>
            </div>

            <div class="col-xs-12 col-md-4">
                <dl class="card prodcut">
                  <dt><span class="product-icon home"></span></dt>
                  <dt>
                    <h4 class="color-primary medium">Asuransi Rumah</h4>
                    <hr class="primary small"/>
                  </dt>
                  <dt>
                    <p class="color-dark-grey">Perlindungan terhadap<br>tempat tinggal Anda</p>
                  </dt>
                  <dt>
                    <a href="#" class="btn btn-md btn-parolamas">Lihat Lebih lanjut</a>
                  </dt>
                </dl>
            </div>

            <div class="col-xs-12 col-md-4">
                <dl class="card prodcut">
                  <dt><span class="product-icon goods"></span></dt>
                  <dt>
                    <h4 class="color-primary medium">Asuransi Rumah</h4>
                    <hr class="primary small"/>
                  </dt>
                  <dt>
                    <p class="color-dark-grey">Perlindungan terhadap<br>tempat tinggal Anda</p>
                  </dt>
                  <dt>
                    <a href="#" class="btn btn-md btn-parolamas">Lihat Lebih lanjut</a>
                  </dt>
                </dl>
            </div>

            <div class="col-xs-12 col-md-4">
                <dl class="card prodcut">
                  <dt><span class="product-icon goods-home"></span></dt>
                  <dt>
                    <h4 class="color-primary medium">Asuransi Rumah</h4>
                    <hr class="primary small"/>
                  </dt>
                  <dt>
                    <p class="color-dark-grey">Perlindungan terhadap<br>tempat tinggal Anda</p>
                  </dt>
                  <dt>
                    <a href="#" class="btn btn-md btn-parolamas">Lihat Lebih lanjut</a>
                  </dt>
                </dl>
            </div>

        </div>
    </div>
    <!--scroll icon -->
    <div class="half-center-scroll-icon bottom">
      <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
    </div>
  </section>

  <!-- section contact --->
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
                  <input class="form-control grey" type="text" name="" value="">
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
