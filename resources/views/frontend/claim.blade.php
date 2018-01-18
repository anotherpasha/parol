@extends('layouts.default')

@section('content')
<section class="sub-page-banner claim">
  <div class="middler-wrapper">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5">
            <h1>PROSES <br> KLAIM</h1>
            <hr class="primary left" />
            <p class="color-white">
              Siapa bilang asuransi itu rumit?<br>
              Dengan Asuransi Harta Benda Parolamas,<br> Anda tidak perlu mengalami proses klaim yang berbelit.
            </p>
            <br/>
            <a href="{{ url('uploads/brochures/Claims_Form_Rumah_Harta_Benda_Parolamas.pdf') }}" class="btn btn-parolamas btn-md to-section" data-target-to="main">Download Formulir</a>
          </div>

        </div>
    </div>
  </div>
  <div class="icon-scroll">
    <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
  </div>

</section>
<section class="half-center-transparent--top extra-padding claim-video ">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4">

      </div>
    </div>
  </div>
</section>

@endsection
