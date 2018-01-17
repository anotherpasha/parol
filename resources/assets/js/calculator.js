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
          type: 1,
          package: 'both',
          earthquake: 0,
          building_value: 0,
          content_value: 0,
          form_total: 9,
          indicators: 1,
            slickOptions: {
              arrows: false,
              slidesToShow: 1,
              centerMode: true,
              infinite: false,
              adaptiveHeight: true
            },
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
        }

    },
});
