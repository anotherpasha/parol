@extends('layouts.default')

@section('content')
  <section class="slider">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <img src="{{url('/uploads/dummies/img-slider-01.jpg')}}" alt="image contains people and home">
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Asuransi</br>
                  Harta Benda
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Parolamas menyediakan perlindungan risiko dasar untuk memberikan ganti rugi jika bangunan tempat tinggal dan atau harta benda di dalamnya yang Anda pertanggungkan rusak atau musnah disebabkan akibat terjadinya kebakaran atau risiko lainnya yang dijamin.
                </p>

                <a href="" class="btn btn-parolamas btn-md m-t-20">Lihat Lebih Lanjut</a>
              </div>

          </div>
        </div>

        <div class="item">
          <img src="{{url('/uploads/dummies/img-slider-02.jpg')}}" alt="image contains clock and table">
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Persetujuan</br>
                  Klaim Dalam</br>
                  7 Hari
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Parolamas memberikan kepastian atas klaim Anda dalam jangka waktu 7 hari sehingga Anda tidak lagi harus cemas menunggu lama.
                </p>
                <a href="" class="btn btn-parolamas btn-md m-t-20">Lihat Lebih Lanjut</a>
              </div>

          </div>
        </div>

        <div class="item">
          <img src="{{url('/uploads/dummies/img-slider-03.jpg')}}" alt="image contains clock and table">
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Persyaratan</br>
                  Mudah
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Kini daftar asuransi tidak perlu rumit.
                  Kami menawarkan perlindungan harta benda dengan syarat mudah tanpa survey yang berbelit.
                </p>
                <a href="" class="btn btn-parolamas btn-md m-t-20">Lihat Lebih Lanjut</a>
              </div>

          </div>
        </div>

        <div class="item">
          <img src="{{url('/uploads/dummies/img-slider-04.jpg')}}" alt="image contains clock and table">
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Praktis dan</br>
                  Ekonomis
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Asuransi Parolamas menawarkan fleksibilitas premi dengan harga terjangkau, serta proses pendaftaran yang ringkas kurang dari 10 menit.
                </p>
                <a href="" class="btn btn-parolamas btn-md m-t-20">Lihat Lebih Lanjut</a>
              </div>

          </div>
        </div>

      </div>
      <div class="icon-scroll">
        <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
      </div>
    </div>
  </section>



  <section class="half-center-transparent--top extra-padding with-scroll-bottom info-product ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="color-primary text-center">Produk Kami</h1>
                <hr class="primary"/>
                <br><br><br>
            </div>

            <div class="col-xs-12 col-sm-4">
                <dl class="card product">
                  <dt><span class="product-icon home"></span></dt>
                  <dt>
                    <h4 class="color-dark-grey medium">Asuransi</br>Rumah</h4>
                    <hr class="primary small"/>
                  </dt>
                  <dt class="description">
                    <p class="color-dark-grey book">
                        Perlindungan terhadap<br>tempat tinggal Anda</p>
                  </dt>
                  <dt>
                    <a href="#" class="btn btn-md btn-parolamas">Lihat Lebih lanjut</a>
                  </dt>
                </dl>
            </div>

            <div class="col-xs-12 col-sm-4">
                <dl class="card product">
                  <dt><span class="product-icon goods"></span></dt>
                  <dt>
                    <h4 class="color-dark-grey medium">Asuransi<br/>Harta Benda</h4>
                    <hr class="primary small"/>
                  </dt>
                  <dt class="description">
                    <p class="color-dark-grey book">
                      Asuransi perlindungan terhadap</br>
                      harta benda di dalam rumah Anda
                    </p>
                  </dt>
                  <dt>
                    <a href="#" class="btn btn-md btn-parolamas">Lihat Lebih lanjut</a>
                  </dt>
                </dl>
            </div>

            <div class="col-xs-12 col-sm-4">
                <dl class="card product">
                  <dt><span class="product-icon goods-home"></span></dt>
                  <dt>
                    <h4 class="color-dark-grey medium">Asuransi Rumah </br> & Harta Benda</h4>
                    <hr class="primary small"/>
                  </dt>
                  <dt class="description">
                    <p class="color-dark-grey book">
                      Asuransi perlindungan gabungan antara tempat tinggal Anda dan seluruh
                      harta benda di dalam rumah Anda
                    </p>
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


  <section class="extra-padding grey with-scroll-bottom calculator">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-5">
          <h1 class="color-primary ">Asuransi Rumah & Harta Benda</h1>
          <hr class="primary left"/>
          <p class="color-dark-grey">
            Dapatkan perkiraan premi untuk perlindungan terhadap rumah dan harta benda Anda dengan menjawab pertanyaan-pertanyaan di samping ini.          </p>
        </div>
        <div class="col-xs-12 col-md-7">
          @include('partials.calculator')
        </div>
      </div>
    </div>
    <div class="half-center-scroll-icon bottom">
      <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
    </div>

  </section>

  @include('partials.contact-form')
  @include('partials.quiz')

@endsection
