            <div class="uk-margin">
                <button class="uk-button uk-button-default" type="button"
                    @click="addSection('plain', '{{ $lang }}')">Add Plain Section</button>
                <button class="uk-button uk-button-default" type="button"
                    @click="addSection('keypair', '{{ $lang }}')">Add Keypair Section</button>


                <div class="uk-margin-small" v-for="(section, index) in sectionList['{{ $lang }}']">
                    <div class="uk-card uk-card-small k-border white">
                        <a uk-close @click="removeSection(index, '{{ $lang }}')" class="uk-position-top-right uk-margin-small-right uk-margin-small-top uk-margin-small-bottom"></a>
                        <h5 class="uk-card-header uk-margin-remove">@{{ section.type.toUpperCase() }} SECTION</h5>
                        <div class="uk-card-body">
                            <div class="uk-margin-small">
                                <input class="uk-input uk-width-1-1" type="text"
                                    placeholder="{{ trans('placeholders.title', [], $lang) }}"
                                    :name="`sections[{{ $lang }}][${index}][title]`"
                                    v-model="sectionList['{{ $lang }}'][index].title" />
                                <input type="hidden"
                                    :name="`sections[{{ $lang }}][${index}][description]`"
                                    :value="sectionList['{{ $lang }}'][index].description" />
                                <input type="hidden"
                                    :name="`sections[{{ $lang }}][${index}][type]`"
                                    :value="section.type" />
                            </div>

                            <div class="uk-margin-small" v-if="section.type == 'plain'">
                                <wysiwyg
                                    placeholder="{{ trans('placeholders.description', [], $lang) }}"
                                    v-model="sectionList['{{ $lang }}'][index].description" />
                            </div>

                            <div class="uk-margin-small" v-if="section.type == 'keypair'">
                                <button class="uk-button uk-button-small" type="button" @click="addKeypair(index, '{{ $lang }}')">Add</button>

                                <div class="uk-card uk-card-small" v-for="(keypair, kIndex) in section.keypairList">
                                    <div class="uk-card-body">
                                        <div class="uk-margin-small">
                                            <input class="uk-input uk-width-5-6" type="text"
                                                placeholder="{{ trans('placeholders.key', [], $lang) }}"
                                                :name="`sections[{{ $lang }}][${index}][keypairs][${kIndex}][title]`"
                                                v-model="section.keypairList[kIndex].key" />
                                            <a uk-close @click="removeKeypair(index, '{{ $lang }}', kIndex)"
                                                class="uk-margin-small-top uk-align-right"></a>
                                            <input type="hidden"
                                                :name="`sections[{{ $lang }}][${index}][keypairs][${kIndex}][description]`"
                                                :value="section.keypairList[kIndex].value" />
                                        </div>
                                        <div class="uk-margin-small">
                                            <div uk-form-custom>
                                                <input type="hidden"
                                                :name="`sections[{{ $lang }}][${index}][keypairs][${kIndex}][iconpath]`"
                                                :value="section.keypairList[kIndex].icon" />
                                                <img width="50" height="50"
                                                    v-if="section.keypairList[kIndex].icon != ''"
                                                    :src="section.keypairList[kIndex].icon" />
                                                <input type="file"
                                                     @change="uploadIcon(this.event,'{{ $lang }}',index,kIndex)">
                                                <button class="uk-button uk-button-default" type="button" tabindex="-1">Upload Icon</button>
                                            </div>
                                        </div>
                                        <div class="uk-margin-small">
                                            <wysiwyg
                                                placeholder="{{ trans('placeholders.description', [], $lang) }}"
                                                v-model="section.keypairList[kIndex].value" />
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="uk-card uk-card-small">
                                    <div class="uk-flex uk-flex-top uk-grid-small" uk-grid>
                                        <div class="uk-width-1-3">
                                            <div class="fileinput fileinput-new uk-position-relative uk-width-1-1" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail uk-width-1-1 uk-height-small uk-card k-border grey lighten-4" data-trigger="fileinput"></div>
                                                <div uk-form-custom>
                                                    <input type="file" name="image">
                                                </div>
                                                <div class="fileinput-exists uk-position-top-right uk-margin-small-top uk-margin-small-right">
                                                    <a class="uk-label white amber-text" data-trigger="fileinput" title="Change"><i class="fa fa-fw fa-picture-o"></i></a><br>
                                                    <a href="javascript:;" class="uk-label white red-text" data-dismiss="fileinput" title="Remove"><i class="fa fa-fw fa-trash"></i></a>
                                                </div>
                                                <div class="uk-position-center fileinput-new">
                                                    <a class="uk-icon-button" data-trigger="fileinput" title="Choose Image" uk-icon="icon: camera"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="uk-width-expand">
                                            <ul class="k-lang-chooser uk-margin-small-bottom" uk-tab>
                                                @foreach($langs as $lang => $detail)
                                                    <li ><a title="{{ $lang }}"><span class="flag-icon flag-icon-{{ $lang }}"></span></a></li>
                                                @endforeach
                                            </ul>
                                            <ul class="uk-switcher">
                                                @foreach($langs as $lang => $detail)
                                                    <li>
                                                        <input class="uk-input uk-margin-small-bottom" type="text" name="image_title-{{  $lang }}" value="" placeholder="Image Title ({{ $lang }})">
                                                        <textarea name="image_content-{{ $lang }}" class="uk-textarea" placeholder="Image Descriptions ({{ $lang }})" style="height:69px;"></textarea>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="uk-width-1-1">
                                            <input type="text" name="link" class="uk-input uk-input-text" placeholder="Link.." />
                                        </div>
                                    </div>
                                    <a href="javascript:;" data-repeater-delete class="mt-repeater-delete uk-position-top-right uk-margin-top uk-margin-right remove" title="Remove this image" uk-close></a>
                                </div> -->

                            </div>
                        </div>
                    </div>

                </div>
                <!-- @{{ sectionList }} -->
            </div>
