<div id="featured-image-modal" class="uk-modal-container" uk-modal="center: true">
    <div class="uk-modal-dialog k-modal-w">
        <form class="uk-form" action="#">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <h6 class="uk-text-bold uk-width-1-1 uk-padding-small uk-margin-remove k-card-title">Featured Image</h6>
            <div class="uk-modal-body uk-padding-small featured-image-body uk-margin-remove">
                <ul class="image-tab uk-margin-remove-top" uk-tab="animation: uk-animation-fade">
                    <li><a href="#">Upload</a></li>
                    <li class="uk-active"><a href="#">Select Images</a></li>
                </ul>

                <ul class="uk-switcher uk-margin">
                    <li>
                        <div class="k-modal-h2"><button type="button" id="browse">Upload</button></div>
                    </li>
                    <li>
                        <div class="uk-grid-small uk-grid-match" uk-grid>
                            <div class="uk-width-2-3 k-modal-h2">
                                <div class="uk-child-width-1-4 uk-grid-small uk-text-center image-list-container" uk-grid></div>
                            </div>
                            <div class="uk-width-1-3 k-modal-h2">
                                <div class="image-view-container uk-margin"></div>
                                <div class="image-modifier-container">
                                    <div class="uk-form-row">
                                        <label class="uk-form-label" for="">Alternative Text</label>
                                        <input class="uk-input image_alt" name="alt" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-default uk-modal-close" type="button">Cancel</button>
                <button class="uk-button uk-button-primary featured-submit" type="button">Submit</button>
            </div>
        </form>
    </div>
</div>
