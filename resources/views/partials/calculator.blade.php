<div class="" id="calculator">
  <slick ref="slick" :options="slickOptions">
      <div class="card form">
          <hr class="primary rounded"/>
          <div class="form-group">
              <label for="">Status kepemilikan</label>
              <div class="select-custom">
              <select class="selectpicker" name="building_status" :value="buildingStatus" @change="buildingStatusChange">
                  <option value="1">Pribadi</option>
                  <option value="2">Sewa</option>
              </select>
            </div>
          </div>
      </div>

    <div class="card form zipcode">
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
          <label for="">Jenis Bangunan</label>
          <div class="select-custom">
            <select class="selectpicker" name="building_type" @change="changeType">
                <option value="1">Apartment</option>
                <option value="2">Rumah Tinggal</option>
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group" v-show="type == 2">
          <label for="">Penggunaan Bangunan</label>
          <div class="select-custom">
            <select class="selectpicker" name="house_type">
              <option value="6">2976 - Rumah Tinggal, < 4 Lantai, Bukan Ruko</option>
              <option value="7">29761 - Kos-Kosan</option>
            </select>
          </div>
        </div>

        <div class="form-group" v-show="type == 2">
          <label for="">Jenis Konstruksi bangunan</label>
          <div class="select-custom">
            <select class="selectpicker" name="wood_element">
              <option value="1">Kayu (> 20% dari total konstruksi)</option>
              <option value="0">Tembok/Beton</option>
            </select>
          </div>
        </div>

        <div class="form-group" v-show="type == 1">
          <label for="">Lantai</label>
          <input type="text" name="floor" value="" class="form-control grey"/>
        </div>
    </div>

    <!-- <div class="card form">
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
    </div> -->

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Dalam 5 Tahun terakhir, apakah pernah terjadi kebakaran atau ledakan pada bangunan anda ?</label>
          <div class="select-custom">
            <select class="selectpicker" name="been_fire">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Pilih perlindungan yang anda inginkan</label>
          <div class="select-custom">
            <div v-if="1==buildingStatus">
            <select  name="package" class="selectpicker">
              <option value="both">Bangunan + Isi</option>
              <option value="building">Bangunan Saja</option>
              <option value="content">Isi Saja</option>
            </select>
            </div>
          </div>
          <div class="select-custom">
            <div v-if="2==buildingStatus">
              <select  name="package" class="selectpicker">
                <option value="content">Isi Saja</option>
              </select>
            </div>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Berapa Harga Bangunan Anda ?</label>
          <input type="text" name="building_value" value="" class="form-control grey"/>
        </div>
        <div class="form-group">
          <label for="">Berapa Harga Isi Bangunan Anda (maksimal 10% dari harga bangunan) ?</label>
          <input type="text" name="content_value" value="" class="form-control grey"/>
        </div>
    </div>

    <div class="card form text-left product-package">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">Paket standar hanya melindungi anda dari kerusakan karena kebakaran, Petir, Ledakan, Akibat dari Pesawat jatuh, dan asap. Pilih paket perluasan yang ingin anda tambahkan.</label>
          <br/><br/>
          <label for="rsmdcc" class="book">
            <input id="rsmdcc" type="checkbox" name="rsmdcc" value="1"> Kerusuhan, Pemogokan, Perbuatan jahat dan Huru-hara
          </label>
          <br/>
          <label for="dlv" class="book">
            <input id="dlv" type="checkbox" name="dlv" value="1"> Pembersihan puing, Longsor, Properti tertabrak kendaraan
          </label>
          <br/>
          <label for="flood" class="book">
            <input id="flood" type="checkbox" name="flood" value="1"> Taifun, Badai, dan Kerusakan akibat air
          </label>
          <br/>
          <label for="earthquake" class="book">
            <input id="earthquake" type="checkbox" name="earthquake" value="1">  Gempa Bumi
          </label>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <div v-if="1==earthquake">
            <label for="">Construction Type</label>
            <div class="select-custom">
              <select class="selectpicker" name="building_status">
                @foreach($types as $type)
                <option value="{!! $type->id !!}">{!! $type->name_en !!}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <button type="button" name="button" class="btn btn-parolamas btn-medium">Hitung Simulasi</button>
    </div>

  </slick>
  <div class="form-slider-arrow">
    <a href="javascript:;" @click="prev"><img src="{{url('/images/icon-prev.png')}}"/></a>
    <a href="javascript:;" @click="next"><img src="{{url('/images/icon-next.png')}}"/></a>
    <h3 class="color-dark-grey calculator-form-list-indicator flush-t">@{{indicators}}/@{{ form_total }} </h3>
  </div>
</div>
