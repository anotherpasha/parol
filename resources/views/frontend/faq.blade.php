@extends('layouts.default')

@section('content')
<section class="sub-page-banner faq-banner">
  <div class="middler-wrapper">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-5">
            <h1>FAQ</h1>
            <hr class="primary left" />
            <p class="color-white">
              Dapatkan jawaban untuk beberapa pertanyaan</br>
              yang sering ditanyakan mengenai produk</br>
              Asuransi Rumah & Harta Benda Parolamas
            </p>
          </div>

        </div>
    </div>
  </div>
  <div class="icon-scroll">
    <a href="#"><img src="{{url('/images/icon-scroll.png')}}"></a>
  </div>

</section>
<section class="half-center-transparent--top extra-padding  faq ">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-10 col-sm-offset-1">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          @php $x = 1; @endphp
          @foreach($faqs as $faq)
            <div class="panel panel-parolamas">

              <div class="panel-heading @if($x == 1) active @endif" role="tab">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#{{ $faq->id }}" aria-expanded="@if($x == 1) true @else false @endif" aria-controls="collapseOne">
                    {!! $faq->translations->first()->title !!}
                  </a>
                  <span class="icon-panel"></span>
                </h4>
              </div>
              <div id="{{ $faq->id }}" class="panel-collapse collapse @if($x == 1) in @endif" role="tabpanel">
                <div class="panel-body">
                  <div class="panel-content">
                    {!! $faq->translations->first()->content !!}
                  </div>
                </div>
              </div>

            </div>
            @php $x++; @endphp
          @endforeach

          

          

        </div>
      </div>

    </div>
  </div>
</section>
@endsection
