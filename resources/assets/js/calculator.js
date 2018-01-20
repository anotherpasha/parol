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
      console.log(decimalMasked);
      Inputmask("numeric", { rightAlign: false, autoGroup: true, groupSeparator: ',' }).mask(decimalMasked);
    },

    updated() {
      $('.selectpicker').selectpicker('refresh');
    },

    data() {
        return {
          buildingStatus: 1,
          fakeZipcode: '',
          zipcode: '',
          type: 1,
          houseType: 6,
          woodElement: 1,
          floor: '',
          beenFire: 0,
          package: 'both',
          buildingValue: '',
          contentValue: '',
          rsmdcc: 0,
          dlv: 0,
          flood: 0,
          earthquake: 0,
          eqType:1,
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
    },

    methods: {
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

        tryAgain() {
          this.clearCalculator();
        },

        sendEmail() {
          console.log('send email');
        },        

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

    },
});
