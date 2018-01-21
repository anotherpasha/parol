<div class="" id="calculator">

    <div class="row" v-if="result <= 0">
      <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
                <label for="">@lang('form-title.ownerStatus')</label>
                <div class="select-custom">
                  <select class="selectpicker" name="building_status" v-model="buildingStatus">
                      <!-- <option value="0">@lang('form-value.choose')</option> -->
                      <option value="1">@lang('form-value.property')</option>
                      <option value="2">@lang('form-value.rental')</option>
                  </select>
                </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <label for="">@lang('form-title.zipcode')</label>
                <div class="select-custom">
                  <vselect label="label" :filterable="false" :options="options" @search="onSearch"  v-model="zipcode"></vselect>
                </div>
                <div v-if="errors.errZipcode" class="alert alert-danger" role="alert">@{{errors.errZipcode}}</div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="">@lang('form-title.building_type')</label>
                <div class="select-custom">
                  <select class="selectpicker" name="building_type" v-model="type">
                    <!-- <option value="0">==Pilih==</option> -->
                      <option value="1">@lang('form-value.apartment')</option>
                      <option value="2">@lang('form-value.house')</option>
                  </select>
                </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group" v-show="type == 1">
              <label for="">@lang('form-title.floor')</label>
              <input type="number" name="floor" value="" v-model="floor" class="form-control grey"/>
              <div v-if="errors.errFloor" class="alert alert-danger" role="alert">@{{errors.errFloor}}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group" v-show="type == 2">
              <label for="">@lang('form-title.houseType')</label>
              <div class="select-custom">
                <select class="selectpicker" name="house_type" v-model="houseType">
                  <option value="6">@lang('form-value.house2976')</option>
                  <option value="7">@lang('form-value.house29761')</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6">
            <div class="form-group" v-show="type == 2">
              <label for="">@lang('form-title.woodElement')</label>
              <div class="select-custom">
                <select class="selectpicker" name="wood_element" v-model="woodElement">
                  <!-- <option value="0">==Pilih==</option> -->
                  <option value="1">@lang('form-value.wood')</option>
                  <option value="2">@lang('form-value.concrete')</option>
                </select>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="">@lang('form-title.beenFire')</label>
              <div class="select-custom">
                <select class="selectpicker" name="been_fire" v-model="beenFire">
                    <option value="0">@lang('form-value.choose')</option>
                    <option value="1">@lang('form-value.yes')</option>
                    <option value="2">@lang('form-value.no')</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 ">
            <div class="form-group">
              <label for="">@lang('form-title.choosePackage')</label>
              <div class="select-custom" v-if="1==buildingStatus">
                <select  name="package" class="selectpicker" v-model="package">
                  <!-- <option value="0">@lang('form-value.choose')</option> -->
                  <option value="both">@lang('form-value.both')</option>
                  <option value="building">@lang('form-value.onlyBuilding')</option>
                  <option value="content">@lang('form-value.onlyContent')</option>
                </select>
              </div>
              <div class="select-custom" v-if="2==buildingStatus">
                <select  name="package" class="selectpicker" v-model="package">
                  <!-- <option value="0">@lang('form-value.choose')</option> -->
                  <option value="content">@lang('form-value.onlyContent')</option>
                </select>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-6">
            <div class="form-group">
              <label for="">@lang('form-title.buildingValue')</label>
              <input type="text" name="building_value" value="" class="form-control grey decimal-masked" v-model="buildingValue" />
              <div v-if="errors.errBuildingValue" class="alert alert-danger" role="alert">@{{errors.errBuildingValue}}</div>
            </div>
          </div>

          <div class="col-xs-12 col-sm-6">
            <div v-if="package == 'both' || package == 'content'">
              <div class="form-group">
                <label for="">@lang('form-title.contentValue')</label>
                <input type="text" name="content_value" value="" class="form-control grey decimal-masked" v-model="contentValue" />
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="">@lang('form-title.extraPackage')</label>
              <br/>
              <label for="rsmdcc" class="book">
                <input id="rsmdcc" type="checkbox" name="rsmdcc" value="1" v-model="rsmdcc"> @lang('form-value.rsmdcc')
              </label>
              <br/>
              <label for="dlv" class="book">
                <input id="dlv" type="checkbox" name="dlv" value="1" v-model="dlv"> @lang('form-value.dlv')
              </label>
              <br/>
              <label for="flood" class="book">
                <input id="flood" type="checkbox" name="flood" value="1" v-model="flood"> @lang('form-value.flood')
              </label>
              <br/>
              <label for="earthquake" class="book">
                <input id="earthquake" type="checkbox" name="earthquake" value="1" v-model="earthquake">  @lang('form-value.earthquake')
              </label>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input class="form-control grey" type="text" v-model="contactForm.name" value="">
              <div v-if="errors.errName" class="alert alert-danger" role="alert">@{{errors.errName}}</div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-7">
            <div class="form-group">
              <label for="">Alamat Email</label>
              <input class="form-control grey" type="email" v-model="contactForm.email" value="">
              <div v-if="errors.errEmail" class="alert alert-danger" role="alert">@{{errors.errEmail}}</div>
            </div>
          </div>

          <div class="col-sm-5 col-xs-12">
            <div class="form-group">
              <label for="">Nomor Telepon</label>
              <input class="form-control grey" type="number" v-model="contactForm.phone" value="">
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

    <div class="row" v-if="result != 0">
      <div class="col-xs-12">
        <div class="results-wrapper">
          <h4 class="color-dark-grey">Simulasi premi kamu </h3>
          <h1 class="color-primary">Rp. @{{ result }}</h1>
          <h3 class="color-primary">/tahun</h3>
          <a href="{{ url('/?r='.$r.'#calculator') }}" class="btn btn-parolamas">COBA SIMULASI LAGI</a>
          &nbsp;

        </div>
      </div>
      <!-- <button type="button" class="btn btn-parolamas" @click="sendEmail">KIRIM KE EMAIL KAMU</button> -->
    </div>


</div>
  <!-- <div class="form-slider-arrow">
    <a href="javascript:;" @click="prev"><img src="{{url('/images/icon-prev.png')}}"/></a>
    <a href="javascript:;" @click="next"><img src="{{url('/images/icon-next.png')}}"/></a>
    <h3 class="color-dark-grey calculator-form-list-indicator flush-t">@{{indicators}}/@{{ form_total }} </h3>
  </div> -->
