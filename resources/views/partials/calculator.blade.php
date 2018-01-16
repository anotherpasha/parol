<div class="" id="calculator">
  <slick ref="slick" :options="slickOptions">
      <div class="card form">
          <hr class="primary rounded"/>
          <div class="form-group">
              <label for="">Status Bangunan</label>
              <div class="select-custom">
              <select class="selectpicker" name="building_status" >
                  <option value="1">Own</option>
                  <option value="2">Rental</option>
              </select>
            </div>
          </div>
      </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
            <label for="">Kode Pos</label>
            <div class="select-custom">
            <select class="selectPostal" name="kode_pos" >
              @foreach($zipcodes as $zipcode)
              <option value="{!! $zipcode->id !!}">{!! $zipcode->zipcode !!}</option>
              @endforeach
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Pilih tipe rumah</label>
          <div class="select-custom">
            <select class="selectpicker" name="building_status">
                <option value="1">Own</option>
                <option value="2">Rental</option>
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Detail Rumah</label>
          <div class="select-custom">
            <select class="selectpicker" name="building_status">
              <option value="6">2976 - Less than 4 stores, non- shophouse</option>
              <option value="7">29761 - Kos-Kosan</option>
              <option value="8">2977 - House floating on sea/ river shore</option>
              <option value="9">2978 - Independent analytical laboratories</option>
              <option value="4">2974 - Convention halls Or other multi purpose building</option>
            </select>
          </div>

        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Floor Number</label>
          <input type="text" name="" value="" class="form-control grey"/>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Do you have any surrounding buildings except residential purpose within 3m?</label>
          <div class="select-custom">
            <select class="selectpicker" name="building_status">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Is there were ever been a fire or explosion on your property within the last 5 years?</label>
          <div class="select-custom">
            <select class="selectpicker" name="building_status">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Choose Package</label>
          <div class="select-custom">
            <select class="selectpicker" name="building_status">
              <option value="both">Both (Building + Contents)</option>
              <option value="building">Building</option>
              <option value="content">Contents</option>
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">How much is your building value?</label>
          <input type="text" name="" value="" class="form-control grey"/>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">The standard coverage covers the damage from Fire, Lightning, Explosion, Impact of Falling Aircraft, Smoke. Please select below options to add extended coverage.</label>
          <input type="checkbox" name="rsmdcc" value="1"> Riot, Strike, Malicious Damage & Civil Commotion<br/><br/>
          <input type="checkbox" name="dlv" value="1" v-model="earthquake"> Removal of Debris, Landslide/Landslip, Vehicle Impact<br/><br/>
          <input type="checkbox" name="flood" value="1"> Typhoon, storm, flood and water damage<br/><br/>
          <input type="checkbox" name="earthquake" value="1" v-model="earthquake"> Earthquake<br/><br/>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Construction Type</label>
          <div class="select-custom">
            <select class="selectpicker" name="building_status">
              @foreach($types as $type)
              <option value="{!! $type->id !!}">{!! $type->name_en !!}</option>
              @endforeach
            </select>
          </div>
        </div>
        <button type="button" name="button" class="btn btn-parolamas btn-medium">Hitung Simulasi</button>
    </div>

  </slick>
  <div class="form-slider-arrow">
    <a href="javascript:;" @click="prev"><img src="{{url('/images/icon-prev.png')}}"/></a>
    <a href="javascript:;" @click="next"><img src="{{url('/images/icon-next.png')}}"/></a>
    <h3 class="color-dark-grey calculator-form-list-indicator flush-t">@{{indicators}}/6 </h3>
  </div>
</div>
