@foreach($items as $spec)
    @if (isset($spec->children))
        <tr>
            <td><strong>{{ $spec->name }}</strong></td>
            @foreach($models as $model)
                <td>&nbsp;</td>
            @endforeach
        </tr>
        @include('admin.includes.product-spec-item', [
            'items' => $spec->children,
            'models' => $models,
            'productSpecs' => $productSpecs
        ])
    @else
    <tr>
        <td>{{ $spec->name }}</td>
        @foreach($models as $model)
            <td><input class="uk-input uk-form-small" type="text" name="{{ $spec->id }}[{{ $model->id }}][value]"
                @if(isset($productSpecs[$spec->id][$model->id])) value="{{ $productSpecs[$spec->id][$model->id] }}" @endif/></td>
            <input class="uk-input uk-form-small" type="hidden" name="{{ $spec->id }}[{{ $model->id }}][spec_name]" value="{{ $spec->name }}"/>
            <input class="uk-input uk-form-small" type="hidden" name="{{ $spec->id }}[{{ $model->id }}][model_name]" value="{{ $model->name }}"/>
        @endforeach
    </tr>
    @endif
@endforeach
