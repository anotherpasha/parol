<div class="" id="calculator">
  <slick ref="slick" :options="slickOptions" @swipe="slickSwipe">
      <div class="card form">
          <hr class="primary rounded"/>
          <div class="form-group">
              <label for="">@lang('form-title.ownerStatus')</label>
              <div class="select-custom">
              <select class="selectpicker" name="building_status" @change="buildingStatusChange">
                  <option value="0">@lang('form-value.choose')</option>
                  <option value="1">@lang('form-value.property')</option>
                  <option value="2">@lang('form-value.rental')</option>
              </select>
            </div>
          </div>
      </div>

    <div class="card form zipcode">
        <hr class="primary rounded"/>
        <div class="form-group">
            <label for="">@lang('form-title.zipcode')</label>
            <!-- <div class="select-custom">
            <select class="postal-code" name="kode_pos"  v-model="zipcode">
            </select> -->
            <div class="select-custom">
            <vselect label="label" :filterable="false" :options="options" @search="onSearch"  v-model="fakeZipcode"></vselect>
          </div>
        </div>
    </div>

    <!-- <div class="card form zipcode">
        <hr class="primary rounded"/>
        <div class="form-group">
            <label for="">Kode Pos</label>
            <div class="select-custom">
            <select class="selectPostal" name="kode_pos" v-model="zipcode">
              @foreach($zipcodes as $zipcode)
              <option value="{!! $zipcode->id !!}">{!! $zipcode->zipcode !!}</option>
              @endforeach
            </select>
          </div>
        </div>
    </div> -->

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">@lang('form-title.building_type')</label>
          <div class="select-custom">
            <select class="selectpicker" name="building_type" @change="changeType">
              <option value="0">==Pilih==</option>
                <option value="1">@lang('form-value.apartment')</option>
                <option value="2">@lang('form-value.house')</option>
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group" v-show="type == 2">
          <label for="">@lang('form-title.houseType')</label>
          <div class="select-custom">
            <select class="selectpicker" name="house_type" v-model="houseType">
              <option value="6">@lang('form-value.house2976')</option>
              <option value="7">@lang('form-value.house29761')</option>
            </select>
          </div>
        </div>

        <div class="form-group" v-show="type == 2">
          <label for="">@lang('form-title.woodElement')</label>
          <div class="select-custom">
            <select class="selectpicker" name="wood_element" @change="woodChanged">
              <option value="0">==Pilih==</option>
              <option value="1">@lang('form-value.wood')</option>
              <option value="2">@lang('form-value.concrete')</option>
            </select>
          </div>
        </div>

        <div class="form-group" v-show="type == 1">
          <label for="">@lang('form-title.floor')</label>
          <input type="text" name="floor" value="" v-model="floor" class="form-control grey"/>
          <br>
          <button class="btn btn-medium" @click="nextFloor">Next</button>
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
          <label for="">@lang('form-title.beenFire')</label>
          <div class="select-custom">
            <select class="selectpicker" name="been_fire" @change="beenFiredChanged">
                <option value="0">@lang('form-value.choose')</option>
                <option value="1">@lang('form-value.yes')</option>
                <option value="2">@lang('form-value.no')</option>
            </select>
          </div>
        </div>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">@lang('form-title.choosePackage')</label>
          <div class="select-custom">
            <div v-if="1==buildingStatus">
            <select  name="package" class="selectpicker" @change="packageChanged">
              <option value="0">@lang('form-value.choose')</option>
              <option value="both">@lang('form-value.both')</option>
              <option value="building">@lang('form-value.onlyBuilding')</option>
              <option value="content">@lang('form-value.onlyContent')</option>
            </select>
            </div>
          </div>
          <div class="select-custom">
            <div v-if="2==buildingStatus">
              <select  name="package" class="selectpicker" @change="package2Changed">
                <option value="0">@lang('form-value.choose')</option>
                <option value="content">@lang('form-value.onlyContent')</option>
              </select>
            </div>
          </div>
        </div>
    </div>

    <div class="card form">
      <hr class="primary rounded"/>
      <div class="form-group">
        <label for="">@lang('form-title.buildingValue')</label>
        <input type="text" name="building_value" value="" class="form-control grey" v-model="buildingValue" />
      </div>
      <div v-if="package == 'both' || package == 'content'">
        <div class="form-group">
          <label for="">@lang('form-title.contentValue')</label>
          <input type="text" name="content_value" value="" class="form-control grey" v-model="contentValue" @blur="checkContentValue"/>
        </div>
      </div>
      <button class="btn btn-medium" @click="nextValue">Next</button>
    </div>

    <div class="card form text-left product-package">
        <hr class="primary rounded"/>
        <div class="form-group">
          <label for="">@lang('form-title.extraPackage')</label>
          <br/><br/>
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
        <button class="btn btn-medium" @click="next">Next</button>
    </div>

    <div class="card form">
        <hr class="primary rounded"/>
        <div v-if="result == 0">
          <div class="form-group">
            <div v-if="1==earthquake">
              <label for="">Construction Type</label>
              <div class="select-custom">
                <select class="selectpicker" name="eq_type" v-model="eqType">
                  @foreach($types as $type)
                  <option value="{!! $type->id !!}">{!! $type->name_en !!}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <button type="button" name="button" class="btn btn-parolamas btn-medium" @click="hitungSimulasi">@lang('form-title.simulate')</button>
        </div>
        <div v-if="result != 0">
          <label for="">Estimasi premi Anda adalah </label>
          <h2 class="color-primary">Rp. @{{ result }}</h2>
          </br>
          </br>
        </div>
    </div>

  </slick>
  <div class="form-slider-arrow">
    <a href="javascript:;" @click="prev"><img src="{{url('/images/icon-prev.png')}}"/></a>
    <a href="javascript:;" @click="next"><img src="{{url('/images/icon-next.png')}}"/></a>
    <h3 class="color-dark-grey calculator-form-list-indicator flush-t">@{{indicators}}/@{{ form_total }} </h3>
  </div>
</div>
