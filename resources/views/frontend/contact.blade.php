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
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-8">
        <div class="contact-form-wrapper">
        <h1 class="color-dark-grey ">Kontak Kami<br>Secara Online</h1>
        <hr class="primary left"/>
        <br><br>
        <div class="row">
          <div class="col-xs-12">
            <form class="" method="post" action="{{ url('contact-us') }}">
                {{ csrf_field() }}
                <div class="row">

                  <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="">Nama Lengkap</label>
                      <input class="form-control grey" type="text" name="name" value="">
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="">Alamat Email</label>
                      <input class="form-control grey" type="text" name="email" value="">
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="">No Telepon</label>
                      <input class="form-control grey" type="text" name="phone" value="">
                    </div>
                  </div>

                  <div class="col-sm-6 col-xs-12">
                    <div class="form-group">
                      <label for="">Keperluan Anda</label>
                      <div class="select-custom ">
                        <select class="selectpicker" name="occupation">
                          <option value="ask">Bertanya</option>
                          <option value="product_info">Informasi Produk</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <div class="form-group">
                      <label for="">Pertanyaan Anda</label>
                      <textarea class="form-control" name="message"></textarea>
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
                    Jl. Street Magazine
                    Tower Kencana, 121. Meroeya
                </span>
              </dt>
              <dt>
                <span class="ico">
                  <img src="{{url('/images/icon-message.png')}}" alt="">
                </span>
                <span class="details">
                    info@parolamas.com
                </span>
              </dt>
              <dt>
                <span class="ico">
                  <img src="{{url('/images/icon-call-blue.png')}}" alt="">
                </span>
                <span class="details">
                    1500 - 554
                </span>
              </dt>


            </dl>
        </div>
      </div>


    </div>

  </div>
</section>
@endsection
