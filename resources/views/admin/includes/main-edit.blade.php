@php $langs = getTransOptions() @endphp
<div class="uk-margin">
    <ul class="uk-margin-remove-bottom k-lang-chooser" uk-tab>
        @foreach($langs as $lang => $detail)
            <li ><a><span class="flag-icon flag-icon-{{ $lang }}"></span></a></li>
        @endforeach
    </ul>
    <ul class="uk-switcher">
        @foreach($langs as $lang => $detail)
            @php
                $postTrans = $post->translations->filter(function ($value) use ($lang) {
                    return $value->locale == $lang;
                });
                $title = isset($postTrans->pluck('title')[0]) ? $postTrans->pluck('title')[0] : '';
                $content = isset($postTrans->pluck('content')[0]) ? $postTrans->pluck('content')[0] : '';
                $excerpt = isset($postTrans->pluck('excerpt')[0]) ? $postTrans->pluck('excerpt')[0] : '';
                $pageTitle = isset($postTrans->pluck('page_title')[0]) ? $postTrans->pluck('page_title')[0] : '';
                $metaDesc = isset($postTrans->pluck('meta_description')[0]) ? $postTrans->pluck('meta_description')[0] : '';
            @endphp
        <li>
            <div class="uk-margin">
                <input class="uk-input uk-form-medium uk-width-1-1" type="text" name="title[{{ $lang }}]" placeholder="Enter title here"
                       @if(old('title')[$lang] != '') value="{!! old('title')[$lang] !!}"
                       @else value="{{ $title }}" @endif autofocus />
            </div>
            <div class="uk-card k-border">
                <textarea class="uk-input textarea uk-width-1-1" name="content[{{ $lang }}]">
                    @if(old('content')[$lang] != ''){!! old('content')[$lang] !!} @else {{ $content }} @endif
                </textarea>

            </div>

            @if(isset($isProduct) && $isProduct)
                @include('admin.includes.product')
            @endif

            <ul uk-accordion="multiple: true">
                <li class="">
                    <h5 class="uk-accordion-title">Excerpt</h5>
                    <div class="uk-accordion-content uk-margin-small-top">
                        <textarea class="uk-textarea uk-width-1-1" name="excerpt[{{ $lang }}]" rows="5" placeholder="Enter Content Summary here">@if(old('excerpt')[$lang] != ''){!! old('excerpt')[$lang] !!}@else{!! $excerpt !!}@endif</textarea>
                    </div>
                </li>
                <li class="">
                    <h5 class="uk-accordion-title">Page Title</h5>
                    <div class="uk-accordion-content uk-margin-small-top">
                        <input class="uk-input uk-width-1-1" type="text" name="page_title[{{ $lang }}]" placeholder="Enter page title here"
                               @if(old('page_title')[$lang] != '') value="{!! old('page_title')[$lang] !!}" @else value="{!! $pageTitle !!}" @endif />
                    </div>
                </li>
                <li class="">
                    <h5 class="uk-accordion-title">Meta Description</h5>
                    <div class="uk-accordion-content uk-margin-small-top">
                        <textarea class="uk-textarea uk-width-1-1" name="meta_description[{{ $lang }}]" placeholder="Enter meta description here">@if(old('meta_description')[$lang] != ''){!! old('meta_description')[$lang] !!}@else{!! $metaDesc !!}@endif</textarea>
                    </div>
                </li>
            </ul>
        </li>
        @endforeach
    </ul>
</div>
