import Vue from 'vue';
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';
import VueSelect from 'vue-select';
// Vue.component('v-select', vSelect.VueSelect);

Vue.component("vselect", VueSelect);

const calculator = new Vue({
    el: '#calculator',

    components: { Slick },

    beforeCreate() {
      console.log(this.$refs)
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
          buildingValue: 0,
          contentValue: 0,
          rsmdcc: 0,
          dlv: 0,
          flood: 0,
          earthquake: 0,
          eqType:1,

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

          options:[]
        };
    },

    watch: {
      fakeZipcode: function() {
        this.next();
        this.zipcode = this.fakeZipcode.value;
        console.log('zipcode watched');
      }
    },

    // All slick methods can be used too, example here
    methods: {
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

        buildingStatusChange(evt) {
          let buildingStatus = evt.target.value;
          if (buildingStatus != 0) {
            this.buildingStatus = buildingStatus;
            this.next();
          }
        },

        changeType(evt){
          let tp = evt.target.value;
          if (tp != 0) {
            this.type = tp;
            this.next();
          }
        },
        woodChanged(evt){
          let woodElement = evt.target.value;
          if (woodElement != 0) {
            this.woodElement = woodElement;
            this.next();
          }
        },
        beenFiredChanged(evt){
          let beenFire = evt.target.value;
          if (beenFire != 0) {
            this.beenFire = beenFire;
            this.next();
          }
        },
        packageChanged(evt){
          let pckg = evt.target.value;
          if (pckg != 0) {
            this.package = pckg;
            this.next();
          }
        },
        package2Changed(evt){
          let pckg = evt.target.value;
          if (pckg != 0) {
            this.package = pckg;
            this.next();
          }
        },
        nextFloor() {
          if (this.floor == '') {
            alert(`Lantai harus diisi.`);
          } else {
            this.next();
          }
        },
        nextValue() {
          if (this.buildingValue + this.contentValue == 0) {
            alert(`Nilai harus diisi.`);
          } else {
            this.next();
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

        hitungSimulasi() {
          console.log('simulasi');
          let vm = this;
          let formData = new FormData();
          formData.append('building_type', this.type);
          formData.append('zipcode', this.zipcode);
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

          axios.post('/calculator', formData)
          .then(({data}) => {
              console.log(data);
              vm.result = data.result;
          })
          .catch((err) => {
            console.log(err);
          });
        }

    },
});
