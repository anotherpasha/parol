@extends('layouts.default')

@section('content')
<section class="sub-page-banner contact">
  <div class="middler-wrapper">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5">
            <h1>Hubungi Kami</h1>
            <hr class="primary left" />
            <p class="color-white">
              Dapatkan informasi lebih lengkap melalui petugas layanan nasabah kami.
            </p>
          </div>

        </div>
    </div>
  </div>
  <div class="icon-scroll">
    <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
  </div>

</section>

<section class="half-center-transparent--top extra-padding with-scroll-bottom ">
  <div class="container" id="contactus">
    <div class="row">
      <div class="col-xs-12 col-sm-8">
        <div class="contact-form-wrapper">
        @if (session('message'))
          <div class="alert alert-success alert-dismissible">
          {{ session('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>
        @endif
        <h1 class="color-dark-grey ">Kontak Kami<br>Secara Online</h1>
        <hr class="primary left"/>
        <br><br>
        <div class="row">
          <div class="col-xs-12">
            <form class="" method="post" action="{{ url('contact-us') }}">
                {{ csrf_field() }}
                <div class="row">

                  <div class="col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input class="form-control grey" type="text" name="name" value="{{ old('name') }}">
                      @if($errors->has('name'))<div class="alert alert-danger" role="alert">{{ $errors->first('name') }}</div>@endif
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="">Alamat Email</label>
                      <input class="form-control grey" type="text" name="email" value="{{ old('email') }}">
                      @if($errors->has('email'))<div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>@endif
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="">No Telepon</label>
                      <input class="form-control grey" type="number" name="phone" value="{{ old('phone') }}">
                      @if($errors->has('phone'))<div class="alert alert-danger" role="alert">{{ $errors->first('phone') }}</div>@endif
                    </div>
                  </div>

                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label for="">Waktu dapat dihubungi</label>
                      <div class='input-group date'>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                           <input type='text' class="form-control grey" id="datepicker" />
                       </div>
                    </div>
                  </div>

                  <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                      <label >&nbsp;</label>
                      <div class='input-group date' id="hour-input">
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                           <input type='text' class="form-control grey" id='hourpicker' value="" />
                       </div>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="">Pertanyaan Anda</label>
                      <textarea class="form-control grey" name="message">{{ old('message') }}</textarea>
                    </div>
                  </div>

                  <div class="col-xs-12 text-center">
                    <button type="submit" class="btn btn-parolamas btn-medium min-width" name="button">Kirim</button>
                  </div>
                </div>

                </div>
            </form>
          </div>
        </div>

      </div>

      <div class="col-xs-12 col-sm-4">
        <div class="contact-information-detail">
            <hr class="primary rounded"/>
            <h1 class="color-dark-grey">Kontak<br>Informasi</h1>
            <dl class="list-contact-information">
              <dt>
                <span class="ico">
                  <img src="{{url('/images/icon-locs.png')}}" alt="">
                </span>
                <span class="details">
                    Pondok Indah Office Tower 2 16th floor suite 1601
                    Jl Sultan Iskandar Muda Kav. V-TA, Pondok Pinang,
                    Jakarta Selatan 12310
                </span>
              </dt>
              <dt>
                <span class="ico">
                  <img src="{{url('/images/icon-message.png')}}" alt="">
                </span>
                <span class="details">
                    <a class="color-dark-grey" href="mailto:info@parolamas.com">nasabah@parolamas.com</a>
                </span>
              </dt>
              <dt>
                <span class="ico">
                  <img src="{{url('/images/icon-call-blue.png')}}" alt="">
                </span>
                <span class="details">
                    <a class="color-dark-grey" href="tel:1500554">1500 - 554</a>
                </span>
              </dt>


            </dl>
        </div>
      </div>


    </div>

  </div>
</section>
@endsection
