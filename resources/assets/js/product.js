require('./bootstrap');

window.Vue = require('vue');

import wysiwyg from "vue-wysiwyg";
import keypairsection from './components/KeypairSection';
Vue.use(wysiwyg, {hideModules: { "image": true }});

const app = new Vue({
    el: '#product',

    components: {
        keypairsection
        //FormListMode3
    },

    data: {
        sectionList: []
    },

    mounted() {
    },

    methods: {
        addSection(type, lang) {
            const section = {
                type,
                lang,
                title:'',
                description:''
            };
            console.log(section);
            this.sectionList.push(section);
        },
        removeSection(index) {
            // console.log(this.sectionList.length);
            if (this.sectionList.length > 0) {
                console.log(index);
                this.sectionList.splice(index, 1);
            }
        }
    },

    updated: function () {
        // tinymce.init({
        //     selector :'.textarea',
        //     plugins : [ 'advlist lists link searchreplace wordcount code kleurimage' ],
        //     baseUrl : $baseUrl,
        //     toolbar1 : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent link | kleurimage code',
        //     image_advtab : true,
        //     menubar : false,
        //     relative_urls: false,
        //     convert_urls: false,
        //     force_p_newlines : false,
        //     forced_root_block : '',
        //     height : "200"
        // });
    }
});
