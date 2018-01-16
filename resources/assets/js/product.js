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
        },
        imageList: [],
        nextPageUrl: '',
        prevPageUrl: '',
        image: '',
        imageId: '',
        file: ''
    },

    mounted() {
        console.log(productSections);
        if (productSections != '') {
            this.parseExistingSections(productSections);
        }

        if (media != '') {
            this.parseExistingMedia(media);
        }

        this.loadMedias('');
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
                value: '',
                icon: ''
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
                            value: ct.description,
                            icon: ct.iconpath
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
        },

        parseExistingMedia(media) {
            this.image = media.fullpath;
            this.imageId = media.id;
        },

        uploadFile(e) {
            let vm = this;
            let fileList = e.target.files || e.dataTransfer.files;
            console.log(fileList);
            if (fileList.length > 0) {
                const formData = new FormData();
                formData.append('file', fileList[0]);
                console.log(formData);
                axios.post('/tinymce/image-upload', formData)
                .then(function({data}) {
                    console.log(data);
                    UIkit.tab('.image-tab').show(1);
                    vm.imageList.push(data);
                    vm.image = data.fullpath;
                    vm.imageId = data.id;
                })
                .catch(function(err) {
                    console.log(err);
                });
            }
        },

        nextMedia() {
            this.loadMedias(this.nextPageUrl)
        },

        prevMedia() {
            this.loadMedias(this.prevPageUrl)
        },

        loadMedias(url) {
            let vm = this;
            const mediaUrl = (url != '' ? url : '/tinymce/get-medias');
            axios.get(mediaUrl)
            .then(({data}) => {
                console.log(data);
                const images = data.data;
                vm.imageList = images;
                vm.prevPageUrl = data.prev_page_url;
                vm.nextPageUrl = data.next_page_url;
                // console.log(data.prev_page_url == null);
            })
            .catch(function (err) {
                console.log(err);
            })
        },

        selectImage(image) {
            this.image = image.fullpath;
            this.imageId = image.id;
        },

        submitImage(type) {
            let content = `<img style="margin: 0px 10px; float: left;" src="${this.image}" alt="" />`;
            if (type == 'tinymce') {
                top.tinymce.activeEditor.insertContent(content);
                top.tinymce.activeEditor.windowManager.close();
            }
            if (type == 'featured') {

                UIkit.modal('#featured-image-modal').hide();
            }
        },

        removeImage() {
            this.image = '';
            this.imageId = '';
        },

        uploadIcon(e, lang, index, kIndex) {
            // console.log(e);
            let vm = this;
            let fileList = e.target.files || e.dataTransfer.files;
            // var reader = new FileReader();

            if (fileList.length > 0) {
                const formData = new FormData();
                formData.append('type', 'product-icons');
                formData.append('file', fileList[0]);
                // console.log(formData);
                axios.post('/tinymce/image-upload', formData)
                .then(function({data}) {
                    console.log(data);
                    vm.sectionList[lang][index]['keypairList'][kIndex]['icon'] = data.fullpath;
                })
                .catch(function(err) {
                    console.log(err);
                });
            }

            // reader.onload = function (e) {
            //     // $('#image_upload_preview').attr('src', e.target.result);
            //     vm.sectionList[lang][index]['keypairList'][kIndex]['icon'] = e.target.result;
            //     // vm.sectionList[lang][.push(section);
            // }
            // reader.readAsDataURL(fileList[0]);
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
