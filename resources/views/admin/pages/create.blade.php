@extends('admin.layouts.default')

@section('page-level-styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{!! asset('assets/css/lib/datepicker.min.css') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/css/lib/flag-icon.css') !!}" />
@endsection

@section('content')
    <div id="app">
        @if (count($errors) > 0)
            <div class="uk-alert-danger" uk-alert>
                <a class="uk-alert-close" uk-close></a>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <h3>
            @if(isset($pageTitle)) {!! $pageTitle !!}@endif
        </h3>
        <form class="uk-form" action="{!! action('PagesController@store') !!}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" value="{!! $postTypeId !!}" name="post_type_id">
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-2-3">
                    @include('admin.includes.main')
                </div>
                <div class="uk-width-1-3">
                    <div class="uk-card uk-card-small uk-card-body uk-margin uk-margin-top k-border white">
                        <div class="uk-margin">
                            <label class="uk-form-label" for="">Publish Date</label>
                            <input type="text" class="uk-input uk-form-medium" name="publish_date"
                                   data-uk-datepicker="{format:'DD/MM/YYYY',maxDate:0}"
                                   @if(old('publish_date') != '') value="{!! old('publish_date') !!}"
                                   @else value="{!! date('d/m/Y') !!}"
                                   @endif />
                        </div>
                        <div class="uk-flex uk-flex-middle uk-flex-between">
                            <a href="{!! action('PagesController@index') !!}" class="uk-button uk-button-default">Back</a>
                            <button type="submit" class="uk-button uk-button-primary" name="status" value="publish">Publish</button>
                        </div>
                    </div>

                    @include('admin.includes.featured-sidebar')

                </div>
            </div>
        </form>

        @include('admin.includes.featured-modal')
    </div>
@endsection

@section('page-level-scripts')
    <script src="{!! asset('assets/js/lib/tinymce/tinymce.min.js') !!}"></script>
    <!-- <script src="{!! asset('assets/js/lib/plupload/plupload.full.min.js') !!}"></script> -->
    <script src="{!! asset('assets/js/editor.js') !!}"></script>
    <!-- <script src="{!! asset('assets/js/featured-image.js') !!}"></script> -->
    <script src="{!! asset('assets/js/lib/uikit.2.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/datepicker.min.js') !!}"></script>
    <script src="{{ mix('js/media.js') }}"></script>
@endsection
