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
        <li data-target="#carousel-example-generic" data-slide-to="4"></li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">

        <div class="item active">
          <div class="image-slider" data-image-desktop="{{url('/uploads/dummies/img-slider-01.jpg')}}" data-image-mobile="{{url('/uploads/dummies/img-family-mobile.jpg')}}" style="background-image: url({{url('/uploads/dummies/img-slider-01.jpg')}})"></div>
          <!-- <img src="{{url('/uploads/dummies/img-slider-01.jpg')}}" alt="image contains people and home"> -->
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Asuransi Rumah</br>
                  & Harta Benda
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Parolamas menyediakan perlindungan risiko dasar untuk memberikan ganti rugi jika bangunan tempat tinggal dan atau harta benda di dalamnya yang kamu pertanggungkan rusak atau musnah disebabkan akibat terjadinya kebakaran atau risiko lainnya yang dijamin.
                </p>
                <ul class="undotted-list ups-list">
                  <li><img src="{{url('/images/icon-checklist.png')}}" alt=""/>&nbsp;Persetujuan Klaim Dalam 7 Hari</li>
                  <li><img src="{{url('/images/icon-checklist.png')}}" alt=""/>&nbsp;Praktis & Ekonomis</li>
                  <li><img src="{{url('/images/icon-checklist.png')}}" alt=""/>&nbsp;Persyaratan Mudah</li>
                </ul>
                <!-- <a href="" class="btn btn-parolamas btn-md m-t-20">Lihat Lebih Lanjut</a> -->
              </div>

          </div>
        </div>

        <div class="item">
          <div class="image-slider" data-image-desktop="{{url('/uploads/dummies/img-slider-02.jpg')}}" data-image-mobile="{{url('/uploads/dummies/img-calendar-mobile.jpg')}}" style="background-image: url({{url('/uploads/dummies/img-slider-02.jpg')}})"></div>
          <!-- <img src="{{url('/uploads/dummies/img-slider-02.jpg')}}" alt="image contains clock and table"> -->
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Persetujuan</br>
                  Klaim Dalam</br>
                  7 Hari
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Setelah menerima dokumen klaim yang lengkap, Parolamas memberikan kepastian atas klaim kamu dalam 7 hari kerja sehingga kamu tidak lagi harus cemas menunggu lama.
                </p>
                <a href="{{ url('product') }}" class="btn btn-parolamas btn-md m-t-20">Lihat Lebih Lanjut</a>
              </div>

          </div>
        </div>

        <div class="item">
          <div class="image-slider" data-image-desktop="{{url('/uploads/dummies/img-slider-04.jpg')}}" data-image-mobile="{{url('/uploads/dummies/img-praktis-mobile.jpg')}}" style="background-image: url({{url('/uploads/dummies/img-slider-04.jpg')}})"></div>
          <!-- <img src="{{url('/uploads/dummies/img-slider-04.jpg')}}" alt="image contains clock and table"> -->
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Praktis dan</br>
                  Ekonomis
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Asuransi Parolamas menawarkan fleksibilitas premi dengan harga terjangkau, serta proses pendaftaran yang ringkas.
                </p>
                <a href="{{ url('product') }}" class="btn btn-parolamas btn-md m-t-20">Lihat Lebih Lanjut</a>
              </div>

          </div>
        </div>

        <div class="item">
          <div class="image-slider" data-image-desktop="{{url('/uploads/dummies/img-slider-03.jpg')}}" data-image-mobile="{{url('/uploads/dummies/img-syarat-mudah-mobile.jpg')}}" style="background-image: url({{url('/uploads/dummies/img-slider-03.jpg')}})"></div>
          <!-- <img src="{{url('/uploads/dummies/img-slider-03.jpg')}}" alt="image contains clock and table"> -->
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Persyaratan</br>
                  Mudah
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Kini daftar asuransi tidak perlu rumit.
                  Kami menawarkan perlindungan harta benda dengan syarat mudah tanpa survey yang berbelit-belit untuk nilai pertanggungan hingga Rp 1 Miliar.
                </p>
                <a href="{{ url('product') }}" class="btn btn-parolamas btn-md m-t-20">Lihat Lebih Lanjut</a>
              </div>

          </div>
        </div>

        <div class="item">
          <div class="image-slider"  data-image-desktop="{{url('/uploads/dummies/img-slider-05.jpg')}}" data-image-mobile="{{url('/uploads/dummies/img-men-mobile.jpg')}}"  style="background-image: url({{url('/uploads/dummies/img-slider-05.jpg')}})"></div>
          <!-- <img src="{{url('/uploads/dummies/img-slider-03.jpg')}}" alt="image contains clock and table"> -->
          <div class="custom-carousel-caption">
              <div class="container">
                <h1>
                  Jaminan Kenyamanan<br>dalam Memberi<br>Perlindungan
                </h1>
                <hr class="primary left" />
                <p class="paragraph">
                  Kami memahami pentingnya rasa aman dan nyaman dalam menjalani hidup. Selain nyaman atas perlindungan yang kami berikan, kami juga menawarkan kenyamanan dengan proses klaim yang simpel, harga terjangkau serta fleksibilitas pembayaran premi sesuai dengan kenyamananmu.
                </p>
                <a data-toggle="modal" data-target="#video" class="btn btn-parolamas btn-md m-t-20">Lihat Video</a>
              </div>

          </div>
        </div>

      </div>

      <div class="icon-scroll ">
        <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
      </div>
    </div>
  </section>

  <section class="half-center-transparent--top extra-padding with-scroll-bottom info-product ">
  @include('partials.our-product', ['productButton' => true])
  <!--scroll icon -->
  <div class="half-center-scroll-icon bottom">
    <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
  </div>
  </section>



  <section class="extra-padding bordered-grey with-scroll-bottom calculator">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4">
          <h1 class="color-primary ">Simulasi <br/>Premi</h1>
          <hr class="primary left"/>
          <p class="color-dark-grey">
            Dapatkan perkiraan premi untuk perlindungan terhadap rumah dan harta benda kamu dengan menjawab pertanyaan-pertanyaan di samping ini.</p>
        </div>
        <div class="col-xs-12 col-md-8">
          @include('partials.calculator')
        </div>
      </div>
    </div>

  </section>

  @include('partials.video')
  <!-- include('partials.quiz') -->

@endsection
