<div class="uk-card uk-card-small k-border white">
    <h5 class="uk-card-header uk-margin-remove">Featured Image</h5>
    <div class="uk-card-body">
        <div class="featured-image-viewer">
            @if ($post->path != '')
                <a href="#featured-image-modal" uk-toggle><img src="{!! url('image/featured/'.$post->path) !!}" alt="" /></a>
            @endif
        </div>
        <input type="hidden" name="featured_image_id" class="featured-image-id" @if($post->media_id != '') value="{{ $post->media_id }}" @endif/>
        <div class="uk-margin">
            <a class="uk-button uk-button-default featured-image-add-button" href="#featured-image-modal" uk-toggle>Add Image</a>
            <a class="uk-button uk-button-default featured-image-remove-button" href="javascript:;">Remove Image</a>
        </div>
    </div>
</div>