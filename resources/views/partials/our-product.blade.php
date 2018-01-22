
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <h1 class="color-primary text-center">Pilih Tipe Perlindungan</h1>
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
                      Perlindungan terhadap bangunan atau tempat tinggal kamu
                    </p>
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
                      Perlindungan terhadap harta benda di dalam rumah, kost, & apartemen kamu
                    </p>
                  </dt>
                </dl>
            </div>

            <div class="col-xs-12 col-sm-4">
                <dl class="card product">
                  <dt><span class="product-icon goods-home"></span></dt>
                  <dt>
                    <h4 class="color-dark-grey medium">Asuransi</br>Rumah & Harta Benda</h4>
                    <hr class="primary small"/>
                  </dt>
                  <dt class="description">
                    <p class="color-dark-grey book">
                      Perlindungan gabungan untuk tempat tinggal dan harta benda di dalamnya
                    </p>
                  </dt>
                </dl>
            </div>
            @if($productButton)
            <div class="col-xs-12 text-center">
              <a href="{{ url('product') }}" class="btn btn-md btn-parolamas half-block">Lihat Lebih lanjut</a>
            </div>
            @endif
        </div>
    </div>
    <!--scroll icon -->
    @if($productButton)
    <div class="half-center-scroll-icon bottom-on-border">
      <a class="scroll" href="javascript:;"><img src="{{url('/images/icon-scroll-blue.png')}}"/></a>
    </div>
    @endif
