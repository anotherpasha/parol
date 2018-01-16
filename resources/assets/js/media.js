require('./bootstrap');

window.Vue = require('vue');
window.top = top;

const app = new Vue({
    el: '#app',

    data: {
        imageList: [],
        nextPageUrl: '',
        prevPageUrl: '',
        image: '',
        imageId: '',
        file: ''
    },

    methods: {
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
                // console.log(data);
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
        }
    },

    mounted() {
        this.loadMedias('');
    }
});
