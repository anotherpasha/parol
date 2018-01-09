<div class="uk-margin">
    <ul class="uk-margin-remove-bottom k-lang-chooser" uk-tab>
        <li class="uk-active"><a><span class="flag-icon flag-icon-id"></span></a></li>
        <li><a><span class="flag-icon flag-icon-gb"></span></a></li>
    </ul>
    <ul class="uk-switcher">
        <li>
            <input class="uk-input uk-form-medium uk-width-1-1" type="text" name="title" placeholder="Judul artikel"
            @if(old('title') != '')
                value="{!! old('title') !!}"
            @endif autofocus />
        </li>
        <li>
            <input class="uk-input uk-form-medium uk-width-1-1" type="text" name="title" placeholder="Enter title here"
            @if(old('title') != '')
                value="{!! old('title') !!}"
            @endif autofocus />
        </li>
    </ul>
</div>
<div class="uk-margin">
    <ul class="uk-margin-remove-bottom k-lang-chooser" uk-tab>
        <li class="uk-active"><a><span class="flag-icon flag-icon-id"></span></a></li>
        <li><a><span class="flag-icon flag-icon-gb"></span></a></li>
    </ul>
    <ul class="uk-switcher">
        <li>
            <div class="uk-card k-border">
                <textarea class="uk-input textarea uk-width-1-1" name="content">@if(old('content') != ''){!! old('content') !!}@endif</textarea>
            </div>
        </li>
        <li>
            <div class="uk-card k-border">
                <textarea class="uk-input textarea uk-width-1-1" name="content">@if(old('content') != ''){!! old('content') !!}@endif</textarea>
            </div>
        </li>
    </ul>
</div>

<ul uk-accordion="multiple: true">
    <li class="uk-open">
        <h5 class="uk-accordion-title">Excerpt</h5>
        <div class="uk-accordion-content uk-margin-remove-top">
            <ul class="uk-margin-remove-bottom k-lang-chooser" uk-tab>
                <li class="uk-active"><a><span class="flag-icon flag-icon-id"></span></a></li>
                <li><a><span class="flag-icon flag-icon-gb"></span></a></li>
            </ul>
            <ul class="uk-switcher">
                <li>
                    <textarea class="uk-textarea uk-width-1-1" name="excerpt" rows="5" placeholder="Rangkuman artikel">@if(old('excerpt') != ''){!! old('excerpt') !!}@endif</textarea>
                </li>
                <li>
                    <textarea class="uk-textarea uk-width-1-1" name="excerpt" rows="5" placeholder="Enter Content Summary here">@if(old('excerpt') != ''){!! old('excerpt') !!}@endif</textarea>
                </li>
            </ul>
        </div>
    </li>
    <li class="uk-open">
        <h5 class="uk-accordion-title">Page Title</h5>
        <div class="uk-accordion-content uk-margin-remove-top">
            <ul class="uk-margin-remove-bottom k-lang-chooser" uk-tab>
                <li class="uk-active"><a><span class="flag-icon flag-icon-id"></span></a></li>
                <li><a><span class="flag-icon flag-icon-gb"></span></a></li>
            </ul>
            <ul class="uk-switcher">
                <li>
                    <input class="uk-input uk-width-1-1" type="text" name="page_title" placeholder="Judul halaman"
                    @if(old('page_title') != '')
                        value="{!! old('page_title') !!}"
                    @endif />
                </li>
                <li>
                    <input class="uk-input uk-width-1-1" type="text" name="page_title" placeholder="Enter page title here"
                    @if(old('page_title') != '')
                        value="{!! old('page_title') !!}"
                    @endif />
                </li>
            </ul>
        </div>
    </li>
    <li class="uk-open uk-margin">
        <h5 class="uk-accordion-title">Meta Description</h5>
        <div class="uk-accordion-content uk-margin-remove-top">
            <ul class="uk-margin-remove-bottom k-lang-chooser" uk-tab>
                <li class="uk-active"><a><span class="flag-icon flag-icon-id"></span></a></li>
                <li><a><span class="flag-icon flag-icon-gb"></span></a></li>
            </ul>
            <ul class="uk-switcher">
                <li>
                    <textarea class="uk-textarea uk-width-1-1" name="meta_description" placeholder="Meta deskripsi halaman">@if(old('meta_description') != ''){!! old('meta_description') !!}@endif</textarea>
                </li>
                <li>
                    <textarea class="uk-textarea uk-width-1-1" name="meta_description" placeholder="Enter meta description here">@if(old('meta_description') != ''){!! old('meta_description') !!}@endif</textarea>
                </li>
            </ul>
        </div>
    </li>
</ul>
