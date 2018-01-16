<section class="extra-padding home-contact extra-padding" id="contact">
  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h1 class="color-primary ">Hubungi Kami</h1>
            <hr class="primary "/>
            <p class="color-dark-grey">Untuk mendapatkan perlindungan, silahkan tinggalkan informasi diri Anda<br>
            dan tentukan kapan Anda bersedia dihubungi oleh petugas layanan nasabah kami.</p>
            <br><br><br>

        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
          <form class="" action="index.html" method="post">
            <div class="col-md-12">
              <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input class="form-control grey" type="text" v-model="contactForm.name" value="">
              </div>
            </div>

            <div class="col-md-7 col-xs-12">
              <div class="form-group">
                <label for="">Alamat Email</label>
                <input class="form-control grey" type="email" v-model="contactForm.email" value="">
              </div>
            </div>

            <div class="col-md-5 col-xs-12">
              <div class="form-group">
                <label for="">Nomor Telepon</label>
                <input class="form-control grey" type="text" v-model="contactForm.phone" value="">
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label for="">Waktu dapat dihubungi</label>
                <div class='input-group date'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>

                     <input type='text' class="form-control grey" id="datepicker" @blur="changeDate" />
                 </div>
              </div>
            </div>

            <div class="col-md-6 col-xs-12">
              <div class="form-group">
                <label >&nbsp;</label>
                <div class='input-group date'>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>

                     <input type='text' class="form-control grey" @blur="changeTime" id='hourpicker' value="" />
                 </div>
              </div>
            </div>

            <div class=" col-xs-12">
              <div class="form-group">
                <label >Jenis Asuransi</label>
                <div class="select-custom ">
                  <select class="selectpicker" v-model="contactForm.type">
                    <option value="Asuransi Rumah">Asuransi Rumah</option>
                    <option value="Asuransi Harta & Benda">Asuransi Harta & Benda</option>
                    <option value="Asuransi Rumah & Harta Benda">Asuransi Rumah & Harta Benda</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-xs-12 text-center">
                <br><br>
                <button type="button" name="button" class="btn btn-parolamas btn-md min-width" @click="submitContact">Kirim</button>
            </div>

          </form>
        </div>
    </div>
  </div>
</section>
