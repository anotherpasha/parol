<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{!! asset('assets/css/lib/uikit.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/css/admin.css') !!}" />

</head>
<body class="white">
    <div id="app">
        <form class="uk-form" action="#">
            <div class="uk-card-body uk-card-small">
                <ul class="image-tab" uk-tab="animation: uk-animation-fade">
                    <li><a href="#">Upload</a></li>
                    <li class="uk-active"><a href="#">Select Images</a></li>
                </ul>

                <ul class="uk-switcher uk-margin">
                    <li>
                        <div class="k-modal-h">
                            <div uk-form-custom>
                                <input type="file" @change="uploadFile">
                                <button class="uk-button uk-button-default" type="button" tabindex="-1">Upload</button>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-grid-small uk-grid-match" uk-grid>
                            <div class="uk-width-2-3">
                                <div class="k-modal-h">
                                    <div class="uk-child-width-1-4 uk-grid-small uk-text-center image-list-container" uk-grid>
                                        <div v-for="image in imageList">
                                            <img :src="image.path" @click="selectImage(image)" class="uk-padding-small" />
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <ul class="uk-pagination uk-margin-small-top">
                                        <li v-show="prevPageUrl !== null"><a href="javascript:;" @click="prevMedia"><span class="uk-margin-small-right" uk-pagination-previous></span> Previous</a></li>
                                        <li v-show="nextPageUrl !== null" class="uk-margin-auto-left"><a href="javascript:;" @click="nextMedia">Next <span class="uk-margin-small-left" uk-pagination-next></span></a></li>
                                    </ul>
                                    <!-- <ul class="uk-pagination uk-flex-center">
                                        <li v-show="prevPageUrl !== null"><a href="javascript:;" @click="prevMedia"><span uk-pagination-previous></span> Previous</a></li>
                                        <li v-show="nextPageUrl !== null"><a href="javascript:;" @click="nextMedia">Next <span uk-pagination-next></span></a></li>
                                    </ul> -->
                                </div>
                            </div>
                            <div class="uk-width-1-3 k-modal-h">
                                <div class="image-view-container uk-margin">
                                    <img v-show="image != ''" :src="image" />
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-primary" @click="submitImage('tinymce')" type="button" id="submitButton">Submit</button>
            </div>
        </form>
    </div>
    <script src="{!! asset('assets/js/lib/jquery/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/plupload/plupload.full.min.js') !!}"></script>
    <script src="{{ mix('js/media.js') }}"></script>
    <script src="{!! asset('assets/js/lib/uikit.min.js') !!}"></script>
</body>
</html>
