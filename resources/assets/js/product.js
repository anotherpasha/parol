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
        sectionList: {
            en: [],
            id: []
        }
    },

    mounted() {
        if (productSections != '') {
            this.parseExistingSections(productSections);
        }
    },

    methods: {
        addSection(type, lang) {
            const section = {
                type,
                title:'',
                description:'',
                keypairList: []
            };
            console.log(section);
            this.sectionList[lang].push(section);
        },
        removeSection(index, lang) {
            if (this.sectionList[lang].length > 0) {
                console.log(index);
                this.sectionList[lang].splice(index, 1);
            }
        },

        addKeypair(index, lang) {
            const keypair = {
                key: '',
                value: ''
            };
            this.sectionList[lang][index]['keypairList'].push(keypair);
        },
        removeKeypair(index, lang, kIndex) {
            if (this.sectionList[lang][index]['keypairList'].length > 0) {
                this.sectionList[lang][index]['keypairList'].splice(kIndex, 1);
            }
        },

        parseExistingSections(sections) {
            let vm = this;
            sections.forEach(function(sec) {
                if (sec.type == 'plain') {
                    const section = {
                        title: sec.title,
                        type: sec.type,
                        description: sec.content
                    };
                    vm.sectionList[sec.locale].push(section);
                } else {
                    let parsedContent = JSON.parse(sec.content);
                    let keypairList = [];
                    parsedContent.forEach(function(ct) {
                        const keypair = {
                            key: ct.title,
                            value: ct.description
                        };
                        keypairList.push(keypair);
                    });
                    const section = {
                        title: sec.title,
                        type: sec.type,
                        description: '',
                        keypairList
                    }
                    vm.sectionList[sec.locale].push(section);
                }
            });
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
