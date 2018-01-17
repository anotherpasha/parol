import Vue from 'vue';
import Slick from 'vue-slick';
import 'slick-carousel/slick/slick.css';



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
          zipcode: 1,
          type: 1,
          houseType: 1,
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
            adaptiveHeight: true
          },
          result: 0
        };
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

        changeType(evt) {
            this.type = evt.target.value;
            // console.log(evt.target.value)
        },

        buildingStatusChange(evt) {
          this.buildingStatus = evt.target.value;
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
          let vm = this;
          let formData = new FormData();
          formData.append('building_type', this.buildingStatus);
          formData.append('zipcode', this.zipcode);
          formData.append('house_type', this.type);
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
