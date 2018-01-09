require('./bootstrap');

window.Vue = require('vue');
window.top = top;

const app = new Vue({
    el: '#app',

    data: {
        imageList: [],
        nextPageUrl: '',
        prevPageUrl: '',
        image: ''
    },

    methods: {
        nextMedia() {
            this.loadMedias(this.nextPageUrl)
        },

        prevMedia() {
            this.loadMedias(this.prevPageUrl)
        },

        loadMedias(url) {
            let vm = this;
            const mediaUrl = (url != '' ? url : '/get-medias');
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
            this.image = image.path;
        },

        submitImage() {
            let content = `<img style="margin: 0px 10px; float: left;" src="/${this.image}" alt="" />`;
            top.tinymce.activeEditor.insertContent(content);
            top.tinymce.activeEditor.windowManager.close();
        }
    },

    mounted() {
        this.loadMedias('');
    }
});
