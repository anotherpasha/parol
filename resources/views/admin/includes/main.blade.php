@php $langs = getTransOptions() @endphp
<div class="uk-margin">
    <ul class="uk-margin-remove-bottom k-lang-chooser" uk-tab>
        @foreach($langs as $lang => $detail)
            <li ><a><span class="flag-icon flag-icon-{{ $lang }}"></span></a></li>
        @endforeach
    </ul>
    <ul class="uk-switcher">
        @foreach($langs as $lang => $detail)
        <li>
            <div class="uk-margin">
                <input class="uk-input uk-form-medium uk-width-1-1" type="text" name="title[{{ $lang }}]"
                    placeholder="{{ trans('placeholders.title', [], $lang) }}"
                    @if(old('title')[$lang] != '') value="{!! old('title')[$lang] !!}" @endif autofocus />
            </div>

            <div class="uk-card k-border uk-margin">
                <textarea class="uk-input textarea uk-width-1-1" name="content[{{ $lang }}]">@if(old('content')[$lang] != ''){!! old('content')[$lang] !!}@endif</textarea>
            </div>

            <ul uk-accordion="multiple: true">
                @if (isset($isProduct) && $isProduct)
                    <li class="">
                        <h5 class="uk-accordion-title">Highlight Title</h5>
                        <div class="uk-accordion-content uk-margin-small-top">
                        <textarea class="uk-textarea uk-width-1-1" name="highlight_title[{{ $lang }}]" rows="5"
                                  placeholder="{{ trans('placeholders.excerpt', [], $lang) }}">@if(old('gallery_title')[$lang] != ''){!! old('')[$lang] !!}@endif</textarea>
                        </div>
                    </li>
                    <li class="">
                        <h5 class="uk-accordion-title">Gallery Title</h5>
                        <div class="uk-accordion-content uk-margin-small-top">
                        <textarea class="uk-textarea uk-width-1-1" name="gallery_title[{{ $lang }}]" rows="5"
                                  placeholder="{{ trans('placeholders.excerpt', [], $lang) }}">@if(old('gallery_title')[$lang] != ''){!! old('gallery_title')[$lang] !!}@endif</textarea>
                        </div>
                    </li>
                @endif
                <li class="">
                    <h5 class="uk-accordion-title">Excerpt</h5>
                    <div class="uk-accordion-content uk-margin-small-top">
                        <textarea class="uk-textarea uk-width-1-1" name="excerpt[{{ $lang }}]" rows="5"
                          placeholder="{{ trans('placeholders.excerpt', [], $lang) }}">@if(old('excerpt')[$lang] != ''){!! old('excerpt')[$lang] !!}@endif</textarea>
                    </div>
                </li>
                <li class="">
                    <h5 class="uk-accordion-title">Page Title</h5>
                    <div class="uk-accordion-content uk-margin-small-top">
                        <input class="uk-input uk-width-1-1" type="text" name="page_title[{{ $lang }}]"
                            placeholder="{{ trans('placeholders.page-title', [], $lang) }}"
                            @if(old('page_title')[$lang] != '') value="{!! old('page_title')[$lang] !!}" @endif />
                    </div>
                </li>
                <li class="uk-margin">
                    <h5 class="uk-accordion-title">Meta Description</h5>
                    <div class="uk-accordion-content uk-margin-small-top">
                        <textarea class="uk-textarea uk-width-1-1" name="meta_description[{{ $lang }}]"
                            placeholder="{{ trans('placeholders.meta-desc', [], $lang) }}">@if(old('meta_description')[$lang] != ''){!! old('meta_description')[$lang] !!}@endif</textarea>
                    </div>
                </li>
            </ul>
        </li>
        @endforeach
    </ul>
</div>
