<div class="" id="calculator">
  <slick ref="slick" :options="slickOptions">
      <div class="card form">
          <hr class="primary rounded"/>
          <div class="form-group">
            <label for="">Pilih tipe rumah</label>
            <input v-model="buildingStatus" @input="changeType" type="text" name="" value="" class="form-control"/>
          </div>
      </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Pilih tipe rumah</label>
          <input type="text" name="" value="" class="form-control"/>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Pilih tipe rumah</label>
          <input type="text" name="" value="" class="form-control"/>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Pilih tipe rumah</label>
          <input type="text" name="" value="" class="form-control"/>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Pilih tipe rumah</label>
          <input type="text" name="" value="" class="form-control"/>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Pilih tipe rumah</label>
          <input type="text" name="" value="" class="form-control"/>
        </div>
    </div>


  </slick>
  <div class="form-slider-arrow">
    <a href="javascript:;" @click="prev"><img src="{{url('/images/icon-prev.png')}}"/></a>
    <a href="javascript:;" @click="next"><img src="{{url('/images/icon-next.png')}}"/></a>
    <h3 class="color-dark-grey calculator-form-list-indicator flush-t">@{{indicators}}/6 </h3>
  </div>
</div>
