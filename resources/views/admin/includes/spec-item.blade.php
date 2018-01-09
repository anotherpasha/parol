@foreach($items as $item)
    @if(isset($item->children))
        <li class="dd-item" data-id="{!! $item->id !!}" data-name="{!! $item->name !!}">
            <div class="dd-handle">{!! $item->name !!}</div><a href="javascript:;" onclick="removeListItem('{!! $item->id !!}')" class="uk-position-top-right uk-margin-small-top uk-margin-small-right" uk-close></a>
            <ol class="dd-list">
                @include('admin.includes.spec-item', array('items' => $item->children))
            </ol>
        </li>
    @else
        <li class="dd-item" data-id="{!! $item->id !!}" data-name="{!! $item->name !!}">
            <div class="dd-handle">{!! $item->name !!}</div><a href="javascript:;" onclick="removeListItem('{!! $item->id !!}')" class="uk-position-top-right uk-margin-small-top uk-margin-small-right" uk-close></a>
        </li>
    @endif
@endforeach
