<div class="uk-card uk-card-small k-border white">
    <h5 class="uk-card-header uk-margin-remove">Featured Image</h5>
    <div class="uk-card-body">
        <div class="featured-image-viewer">
            <img v-show="image != ''" :src="image" />
            <input type="hidden" name="featured_image_id" :value="imageId">
        </div>
        <input type="hidden" name="featured_image_id" :value="imageId">
        <div class="uk-margin">
            <!-- <a class="uk-button uk-button-default featured-image-add-button" href="#featured-image-modal" uk-toggle>Add Image</a>
            <a class="uk-button uk-button-default featured-image-remove-button" href="javascript:;">Remove Image</a> -->
            <a class="uk-button uk-button-default" v-if="image == ''" href="#featured-image-modal" uk-toggle>Add Image</a>
            <a class="uk-button uk-button-default" v-if="image != ''" href="#featured-image-modal" uk-toggle>Edit Image</a>
            <button type="button" class="uk-button uk-button-default"
                v-if="image != ''" @click="removeImage">Remove Image</button>
        </div>
    </div>
</div>
