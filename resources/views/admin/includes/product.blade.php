            <div class="uk-margin-small">
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
                                    <!-- <a uk-close @click="removeKeypair(index, '{{ $lang }}', kIndex)" class="uk-position-top-right uk-margin-small-right uk-margin-small-top"></a>
                                    <h5 class="uk-card-header uk-margin-remove">&nbsp;</h5> -->
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
                                            <wysiwyg
                                                placeholder="{{ trans('placeholders.description', [], $lang) }}"
                                                v-model="section.keypairList[kIndex].value" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- @{{ sectionList }} -->
            </div>
