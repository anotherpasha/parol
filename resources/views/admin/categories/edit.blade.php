@extends('admin.layouts.default')

@section('page-level-styles')
    <link rel="stylesheet" href="{!! asset('assets/css/lib/flag-icon.css') !!}" />
@endsection

@php $langs = getTransOptions() @endphp
@section('content')

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

    <form class="uk-form uk-form-stacked" action="{!! action('CategoriesController@update', [$postType->id, $category->id]) !!}" method="POST">
        {!! csrf_field() !!}
        <div class="uk-margin">
            <ul class="uk-margin-remove-bottom k-lang-chooser" uk-tab>
                @foreach($langs as $lang => $detail)
                    <li ><a><span class="flag-icon flag-icon-{{ $lang }}"></span></a></li>
                @endforeach
            </ul>

            <ul class="uk-switcher">
                @foreach($langs as $lang => $detail)
                    @php
                    // dd($category->translations);
                    $catTrans = $category->translations->filter(function ($value) use ($lang) {
                        return $value->locale == $lang;
                    });
                    $title = isset($catTrans->pluck('title')[0]) ? $catTrans->pluck('title')[0] : '';
                    @endphp
                    <li>
                        <div class="uk-margin">
                            <label class="uk-form-label" for="">Title</label>
                            <div class="uk-form-controls">
                                <input class="uk-input" type="text" name="title[{{ $lang }}]"
                                       value="{!! $title !!}" autofocus>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="uk-flex uk-flex-middle uk-flex-between">
            <a href="{!! action('CategoriesController@index', $postType->id) !!}" class="uk-button uk-button-default">Back</a>
            <button type="submit" class="uk-button uk-button-primary">Save</button>
        </div>
    </form>

@endsection

@section('page-level-scripts')

@endsection
