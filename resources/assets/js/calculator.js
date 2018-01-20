import Vue from 'vue';
// import Slick from 'vue-slick';
// import 'slick-carousel/slick/slick.css';
import VueSelect from 'vue-select';
import Validator from 'validator';
import isEmpty from 'lodash/isEmpty';
import Inputmask from "inputmask";

Vue.component("vselect", VueSelect);

const calculator = new Vue({
    el: '#calculator',

    components: {  },

    beforeCreate() {
      console.log(this.$refs)
    },

    mounted() {
      let decimalMasked = document.getElementsByClassName("decimal-masked");
      Inputmask("numeric", { rightAlign: false, autoGroup: true, groupSeparator: '.' }).mask(decimalMasked);
    },

    updated() {
      $('.selectpicker').selectpicker('refresh');
    },

    data() {
        return {
          name:'',
          email: '',
          phone: '',
          time: '',
          date: '',
          buildingStatus: 1,
          fakeZipcode: '',
          zipcode: '',
          type: 1,
          houseType: 6,
          woodElement: 1,
          floor: '',
          beenFire: 0,
          package: 'both',
          buildingValue: 0,
          contentValue: 0,
          rsmdcc: 0,
          dlv: 0,
          flood: 0,
          earthquake: 0,
          eqType:1,
<<<<<<< HEAD
          form_total: 9,
          indicators: 1,
          slickOptions: {
            arrows: false,
            slidesToShow: 1,
            centerMode: true,
            infinite: false,
            adaptiveHeight: true,
            swipe: false,
            swipeToSlide: false,
            touchMove: false,
            draggable: false,
            accessibility: false,
            responsive: [
              {
                breakpoint: 480,
                settings: {
                  centerMode: false,
                }
              }
            ]
          },
          result: 0,
          options:[],
          errors: {}
        };
    },

    watch: {
      fakeZipcode: function() {
        this.zipcode = this.fakeZipcode.value;
        console.log('zipcode watched');
      }
=======
          result: 0,

          options:[],

          loader: false,
          notif: false,
          contactForm: {
            name: '',
            email: '',
            phone: '',
            date: '',
            time: ''
          },
          errors: {
            errEmail:'',
            errName:'',
            errPhone:'',
            errDate:'',
            errTime: '',
            errFloor: '',
            errZipcode: '',
            errBuildingValue: ''
          },
          isValid: false,
        };
>>>>>>> e783cd95f0f7d6ec1a92ade58678d6e52371ceab
    },

    methods: {
<<<<<<< HEAD
        changeTime(evt) {
          this.time = evt.target.value;
        },
        changeDate(evt) {
          this.date = evt.target.value;
        },
        next() {
            this.indicators === this.form_total ? this.indicators = this.form_total : this.indicators += 1;
            this.$refs.slick.next();
            this.reInit;
        },

        prev() {
            this.indicators === 1 ? this.indicators = 1 : this.indicators -= 1;
            this.$refs.slick.prev();
            this.reInit;
        },

        slickSwipe(evt, slick, direction) {
          if (direction == 'left') {
            this.next();
          } else {
            this.prev();
          }
          // console.log(evt);
          // console.log(slick);
          // console.log(direction);
        },

        reInit() {
            // Helpful if you have to deal with v-for to update dynamic lists
            this.$nextTick(() => {
                this.$refs.slick.reSlick();
            });
        },

=======
>>>>>>> e783cd95f0f7d6ec1a92ade58678d6e52371ceab
        onSearch(search, loading) {
          loading(true);
          this.search(loading, search, this);
        },

        search: _.debounce((loading, search, vm) => {
          console.log(search);
          axios.get(`/get-zipcode?search=${search}`)
          .then(function(res) {
            vm.options = res.data;
            loading(false);
          })
        }, 350),

<<<<<<< HEAD
        buildingStatusChange(evt) {
          let buildingStatus = evt.target.value;
          if (buildingStatus != 0) {
            this.buildingStatus = buildingStatus;
          }
        },

        changeType(evt){
          let tp = evt.target.value;
          if (tp != 0) {
            this.type = tp;
          }
        },
        woodChanged(evt){
          let woodElement = evt.target.value;
          if (woodElement != 0) {
            this.woodElement = woodElement;
          }
        },
        beenFiredChanged(evt){
          let beenFire = evt.target.value;
          if (beenFire != 0) {
            this.beenFire = beenFire;
          }
        },
        packageChanged(evt){
          let pckg = evt.target.value;
          if (pckg != 0) {
            this.package = pckg;
          }
        },
        package2Changed(evt){
          let pckg = evt.target.value;
          if (pckg != 0) {
            this.package = pckg;
          }
        },
        nextFloor() {
          if (this.floor == '') {
            alert(`Lantai harus diisi.`);
          } else {
          }
        },
        nextValue() {
          if (this.buildingValue + this.contentValue == 0) {
            alert(`Nilai harus diisi.`);
          } else {
          }
        },
        checkContentValue(evt) {
          let maxContent = this.buildingValue / 10;
          if (this.contentValue > maxContent) {
            alert(`Harga isi bangunan Anda maksimal ${maxContent}`);
            this.contentValue = maxContent;
            evt.target.focus();
          }
        },
=======
        tryAgain() {
          this.clearCalculator();
        },

        sendEmail() {
          console.log('send email');
        },        
>>>>>>> e783cd95f0f7d6ec1a92ade58678d6e52371ceab

        hitungSimulasi() {
          let vm = this;
          const {name, email, phone, date, time} = this.contactForm;
          // console.log('simulasi');
          if(!vm.validate().isValid) {
            // console.log('invalid');
            vm.errors = vm.validate().errors;
            return;
          }
          vm.loader = true;
          let formData = new FormData();
          formData.append('building_type', this.type);
          formData.append('zipcode', this.zipcode.value);
          formData.append('house_type', this.houseType);
          formData.append('floor', this.floor);
          formData.append('been_fire', this.beenFire);
          formData.append('package', this.package);
          formData.append('wood_element', this.woodElement);
          formData.append('building_value', this.buildingValue);
          formData.append('content_value', this.contentValue);
          if (this.rsmdcc != 0) formData.append('rsmdcc', this.rsmdcc);
          if (this.dlv != 0) formData.append('dlv', this.dlv);
          if (this.flood != 0) formData.append('flood', this.flood);
          if (this.earthquake != 0) formData.append('earthquake', this.earthquake);
          if (this.earthquake != 0) formData.append('eq_type', this.eqType);

          formData.append('name', name);
          formData.append('email', email);
          formData.append('phone', phone);
          formData.append('date', date);
          formData.append('time', time);

          axios.post('/calculator', formData)
          .then(({data}) => {
              console.log(data);
              vm.result = data.result;
              vm.loader = false;
          })
          .catch((err) => {
            console.log(err);
            vm.loader = false;
          });
        },
<<<<<<< HEAD
        resetResult() {
          this.result = 0
        }
=======

        changeTime(evt) {
          this.contactForm.time = evt.target.value;
        },

        changeDate(evt) {
          this.contactForm.date = evt.target.value;
        },

        clearCalculator() {
          this.buildingStatus= 1;
          this.fakeZipcode= '';
          this.zipcode= '';
          this.type= 1;
          this.houseType= 6;
          this.woodElement= 1;
          this.floor= '';
          this.beenFire= 0;
          this.package= 'both';
          this.buildingValue= 0;
          this.contentValue= 0;
          this.rsmdcc= 0;
          this.dlv= 0;
          this.flood= 0;
          this.earthquake= 0;
          this.eqType=1;
          this.result=0;
          this.errEmail='';
          this.errName='';
          this.errPhone='';
          this.errDate='';
          this.errTime='';
          this.errFloor='';
          this.errZipcode='';
          this.errBuildingValue='';
        },

        validate() {
          const {contactForm, zipcode, type, floor, buildingValue}  = this;
          let errors = {};
          // console.log(`zipcode ${zipcode}`);
          // console.log(`floor ${floor}`);
          // console.log(`building value ${buildingValue}`);
          // console.log(`email ${contactForm.email}`);

          if (!Validator.isEmail(contactForm.email)) {
              errors.errEmail = 'This field must be a valid email address.';
          }
          if (Validator.isEmpty(contactForm.email)) {
              errors.errEmail = 'This field is required.';
          }
          if (Validator.isEmpty(contactForm.name)) {
              errors.errName = 'This field is required.';
          }
          if (Validator.isEmpty(contactForm.phone)) {
              errors.errPhone = 'This field is required.';
          }
          if (!Validator.isNumeric(contactForm.phone)) {
              errors.errPhone = 'This field must be a number.';
          }
          if (Validator.isEmpty(contactForm.date)) {
              errors.errDate = 'This field is required.';
          }
          if (Validator.isEmpty(contactForm.time)) {
            errors.errTime = 'This field is required.';
          }
          if (zipcode == '') {
            errors.errZipcode = 'This field is required.';
          }
          if (!Validator.isNumeric(floor)) {
              errors.errFloor = 'This field must be a number.';
          }
          if (type == 1 && Validator.isEmpty(floor)) {
            errors.errFloor = 'This field is required.';
          }
          if (buildingValue == 0) {
            errors.errBuildingValue = 'This field is required.';
          }
          //console.log(errors);
          return {
            errors,
            isValid: isEmpty(errors)
          };
        },
>>>>>>> e783cd95f0f7d6ec1a92ade58678d6e52371ceab

    },
});
