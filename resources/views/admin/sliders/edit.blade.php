@extends('admin.layouts.default')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/lib/bootstrap-fileinput/bootstrap-fileinput.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/css/lib/datepicker.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/css/lib/flag-icon.css') !!}" />
@endsection

@section('content')
    @if (count($errors) > 0)
        <div class="uk-alert-danger" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    @if (session('message'))
        <div class="uk-alert-success" uk-alert>
            <a class="uk-alert-close" uk-close></a>
            <p>{{ session('message') }}</p>
        </div>
    @endif

    <h3>
        @if(isset($pageTitle)) {!! $pageTitle !!}@endif
    </h3>
    @php $langs = getTransOptions() @endphp
    <form class="repeater" action="{{ action('SlidersController@update', $id) }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="uk-grid-small" uk-grid>
            <div class="uk-width-2-3">
                <div class="uk-margin">
                    <input class="uk-input uk-form-medium uk-width-1-1" type="text" name="gallery_name" value="{{ $gallery->title }}" autofocus />
                </div>

                <div data-repeater-list="galleries" class="galleries">
                @if(count($gallery->images) > 0)
                    @foreach($gallery->images as $image)
                    <div data-repeater-item class="uk-card uk-card-body uk-card-small uk-margin k-border white">
                        <div class="uk-flex uk-flex-top uk-grid-small" uk-grid>
                            <div class="uk-width-1-3">
                                <div class="fileinput fileinput-exists uk-position-relative uk-width-1-1" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail uk-width-1-1 uk-height-small uk-card k-border grey lighten-4" data-trigger="fileinput">
                                        <img src="{!! url($image->file_path) !!}" alt="..." name="">
                                    </div>
                                    <div uk-form-custom>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="fileinput-exists uk-position-top-right uk-margin-small-top uk-margin-small-right">
                                        <a class="uk-label white amber-text" data-trigger="fileinput" title="Change"><i class="fa fa-fw fa-picture-o"></i></a><br>
                                        <a href="javascript:;" class="uk-label white red-text" data-dismiss="fileinput" title="Remove"><i class="fa fa-fw fa-trash"></i></a>
                                    </div>
                                    <div class="uk-position-center fileinput-new">
                                        <a class="uk-icon-button" data-trigger="fileinput" title="Choose Image" uk-icon="icon: camera"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-expand">
                                <ul class="k-lang-chooser uk-margin-small-bottom" uk-tab>
                                    @foreach($langs as $lang => $detail)
                                        <li ><a title="{{ $lang }}"><span class="flag-icon flag-icon-{{ $lang }}"></span></a></li>
                                    @endforeach
                                </ul>
                                <ul class="uk-switcher">
                                    @foreach($langs as $lang => $detail)
                                        <?php
                                            $imageDetail = $image->translations()->where('lang', $lang)->first();
                                            $title = isset($imageDetail->title) ? $imageDetail->title : '';
                                            $content = isset($imageDetail->content) ? $imageDetail->content : '';
                                        ?>
                                        <li>
                                            <input class="uk-input uk-margin-small-bottom" type="text" name="image_title-{{  $lang }}" value="{{ $title }}"/>
                                            <textarea name="image_content-{{ $lang }}" class="uk-textarea" style="height:69px;">{{ $content }}</textarea>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="javascript:;" data-repeater-delete class="mt-repeater-delete uk-position-top-right uk-margin-top uk-margin-right remove" title="Remove this image" uk-close></a>
                    </div>
                    @endforeach
                @else
                    <div data-repeater-item class="uk-card uk-card-body uk-card-small uk-margin k-border white">
                        <div class="uk-flex uk-flex-top uk-grid-small" uk-grid>
                            <div class="uk-width-1-3">
                                <div class="fileinput fileinput-new uk-position-relative uk-width-1-1" data-provides="fileinput">
                                    <div class="fileinput-preview thumbnail uk-width-1-1 uk-height-small uk-card k-border grey lighten-4" data-trigger="fileinput"></div>
                                    <div uk-form-custom>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="fileinput-exists uk-position-top-right uk-margin-small-top uk-margin-small-right">
                                        <a class="uk-label white amber-text" data-trigger="fileinput" title="Change"><i class="fa fa-fw fa-picture-o"></i></a><br>
                                        <a href="javascript:;" class="uk-label white red-text" data-dismiss="fileinput" title="Remove"><i class="fa fa-fw fa-trash"></i></a>
                                    </div>
                                    <div class="uk-position-center fileinput-new">
                                        <a class="uk-icon-button" data-trigger="fileinput" title="Choose Image" uk-icon="icon: camera"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-width-expand">
                                <ul class="k-lang-chooser uk-margin-small-bottom" uk-tab>
                                    @foreach($langs as $lang => $detail)
                                        <li ><a title="{{ $lang }}"><span class="flag-icon flag-icon-{{ $lang }}"></span></a></li>
                                    @endforeach
                                </ul>
                                <ul class="uk-switcher">
                                    @foreach($langs as $lang => $detail)
                                        <li>
                                            <input class="uk-input uk-margin-small-bottom" type="text" name="image_title-{{  $lang }}" value="" placeholder="Image Title ({{ $lang }})">
                                            <textarea name="image_content-{{ $lang }}" class="uk-textarea" placeholder="Image Descriptions ({{ $lang }})" style="height:69px;"></textarea>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <a href="javascript:;" data-repeater-delete class="mt-repeater-delete uk-position-top-right uk-margin-top uk-margin-right remove" title="Remove this image" uk-close></a>
                    </div>
                @endif
                </div>
                <hr>
                <button data-repeater-create type="button" class="uk-button uk-button-small uk-button-danger uk-align-right"><span class="fa fa-plus uk-margin-small-right"></span>ADD MORE</button>
            </div>
            <div class="uk-width-1-3">
                <div class="uk-card uk-card-small uk-margin uk-card-body k-border white">
                    <div class="uk-flex uk-flex-middle uk-flex-between">
                        <a href="{!! action('SlidersController@index') !!}" class="uk-button uk-button-default">Back</a>
                        <button type="submit" class="uk-button uk-button-primary" name="status" value="publish">Publish</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('assets/js/lib/uikit.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/uikit-icons.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/jquery.repeater.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/uikit-fileinput.js') !!}"></script>
    <script src="{!! asset('assets/js/gallery.js') !!}"></script>
@endsection
