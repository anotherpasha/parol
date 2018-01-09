@foreach($items as $item)
@if($item->hasChildren())
<li @if($item->isActive) class="uk-parent uk-open" @else class="uk-parent" @endif>
    <a href="javascript:;">
        <span class="uk-margin-small-right" uk-icon="{!! $item->icon_class !!}"></span> {!! $item->title !!}
    </a>
    <ul class="uk-nav-sub" >
        @include('admin.includes.menu', array('items' => $item->children()))
    </ul>
</li>
@else
<li @if($item->isActive) class="uk-active" @endif>
    <a href="@if($item->menu_link != '' && $item->menu_link != 'javascript:;') {!! url($item->menu_link) !!} @else javascript:; @endif">
        @if($item->icon_class != '')<span class="uk-margin-small-right" uk-icon="{!! $item->icon_class !!}"></span>@endif {!! $item->title !!}
    </a>
</li>
@endif
@endforeach