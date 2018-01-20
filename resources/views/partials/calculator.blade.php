<div class="" id="calculator">

    <div class="row" v-if="result <= 0">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
                <label for="">Status kepemilikan</label>
                <div class="select-custom">
                <select class="selectpicker" name="building_status" @change="buildingStatusChange">
                    <option value="0">==Pilih==</option>
                    <option value="1">Pribadi</option>
                    <option value="2">Sewa</option>
                </select>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label for="">Kode Pos</label>
                <!-- <div class="select-custom">
                <select class="postal-code" name="kode_pos"  v-model="zipcode">
                </select> -->
                <div class="select-custom">
                <vselect label="label" :filterable="false" :options="options" @search="onSearch"  v-model="fakeZipcode"></vselect>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="">Jenis Bangunan</label>
              <div class="select-custom">
                <select class="selectpicker" name="building_type" @change="changeType">
                  <option value="0">==Pilih==</option>
                    <option value="1">Apartment</option>
                    <option value="2">Rumah Tinggal</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group" v-show="type == 2">
              <label for="">Penggunaan Bangunan</label>
              <div class="select-custom">
                <select class="selectpicker" name="house_type" v-model="houseType">
                  <option value="6">2976 - Rumah Tinggal, < 4 Lantai, Bukan Ruko</option>
                  <option value="7">29761 - Kos-Kosan</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group" v-show="type == 2">
              <label for="">Jenis Konstruksi bangunan</label>
              <div class="select-custom">
                <select class="selectpicker" name="wood_element" @change="woodChanged">
                  <option value="0">==Pilih==</option>
                  <option value="1">Kayu (> 20% dari total konstruksi)</option>
                  <option value="2">Tembok/Beton</option>
                </select>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="">Dalam 5 Tahun terakhir, apakah pernah terjadi kebakaran atau ledakan pada bangunan anda ?</label>
              <div class="select-custom">
                <select class="selectpicker" name="been_fire" @change="beenFiredChanged">
                    <option value="0">==Pilih==</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 ">
            <div class="form-group">
              <label for="">Pilih perlindungan yang anda inginkan</label>
              <div class="select-custom">
                <div v-if="1==buildingStatus">
                <select  name="package" class="selectpicker" @change="packageChanged">
                  <option value="0">==Pilih==</option>
                  <option value="both">Bangunan + Isi</option>
                  <option value="building">Bangunan Saja</option>
                  <option value="content">Isi Saja</option>
                </select>
                </div>
              </div>

            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="">Berapa Harga Bangunan Anda ?</label>
              <input type="text" name="building_value" value="" class="form-control grey" v-model="buildingValue" />
            </div>
          </div>

          <div class="col-xs-12 col-sm-6">
            <div v-if="package == 'both' || package == 'content'">
              <div class="form-group">
                <label for="">Harga isi bangunan kamu
    (Maks. 50.000.000)</label>
                <input type="text" name="content_value" value="" class="form-control grey" v-model="contentValue" @blur="checkContentValue"/>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="">Paket standar hanya melindungi anda dari kerusakan karena kebakaran, Petir, Ledakan, Akibat dari Pesawat jatuh, dan asap. Pilih paket perluasan yang ingin anda tambahkan.</label>
              <br/><br/>
              <label for="rsmdcc" class="book">
                <input id="rsmdcc" type="checkbox" name="rsmdcc" value="1" v-model="rsmdcc"> Kerusuhan, Pemogokan, Perbuatan jahat dan Huru-hara
              </label>
              <br/>
              <label for="dlv" class="book">
                <input id="dlv" type="checkbox" name="dlv" value="1" v-model="dlv"> Pembersihan puing, Longsor, Properti tertabrak kendaraan
              </label>
              <br/>
              <label for="flood" class="book">
                <input id="flood" type="checkbox" name="flood" value="1" v-model="flood"> Taifun, Badai, dan Kerusakan akibat air
              </label>
              <br/>
              <label for="earthquake" class="book">
                <input id="earthquake" type="checkbox" name="earthquake" value="1" v-model="earthquake">  Gempa Bumi
              </label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input class="form-control grey" type="text" v-model="name" value="">
              <div v-if="errors.errName" class="alert alert-danger" role="alert">@{{errors.errName}}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-7">
            <div class="form-group">
              <label for="">Alamat Email</label>
              <input class="form-control grey" type="email" v-model="email" value="">
              <div v-if="errors.errEmail" class="alert alert-danger" role="alert">@{{errors.errEmail}}</div>
            </div>
          </div>

          <div class="col-sm-5 col-xs-12">
            <div class="form-group">
              <label for="">Nomor Telepon</label>
              <input class="form-control grey" type="number" v-model="phone" value="">
              <div v-if="errors.errPhone" class="alert alert-danger" role="alert">@{{errors.errPhone}}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 col-xs-12">
            <div class="form-group">
              <label for="">Waktu dapat dihubungi</label>
              <div class='input-group date'>
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                   <input type='text' class="form-control grey" id="datepicker" @blur="changeDate" />
               </div>
               <div v-if="errors.errDate" class="alert alert-danger" role="alert">@{{errors.errDate}}</div>

            </div>
          </div>
          <div class="col-sm-6 col-xs-12">
            <div class="form-group">
              <label >&nbsp;</label>
              <div class='input-group date' id="hour-input">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-time"></span>
                  </span>
                   <input type='text' class="form-control grey" @blur="changeTime" id='hourpicker' value="" />
               </div>
               <div v-if="errors.errTime" class="alert alert-danger" role="alert">@{{errors.errTime}}</div>
            </div>
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
        <div class="col-xs-12 text-center">
          <button type="button" name="button" class="btn btn-parolamas btn-medium " @click="hitungSimulasi">Hitung Simulasi</button>
        </div>


      </div>

    </div>


</div>
  <!-- <div class="form-slider-arrow">
    <a href="javascript:;" @click="prev"><img src="{{url('/images/icon-prev.png')}}"/></a>
    <a href="javascript:;" @click="next"><img src="{{url('/images/icon-next.png')}}"/></a>
    <h3 class="color-dark-grey calculator-form-list-indicator flush-t">@{{indicators}}/@{{ form_total }} </h3>
  </div> -->
