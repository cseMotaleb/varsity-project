<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform dc-dbsectionspace', 'id'=>'home-hwtabs-section-form', '@submit.prevent'=>'submitHwTabSectionSettings']); ?>

<div class="dc-securitysettings dc-hwtabsinfo">
    <div class="dc-tabscontenttitle la-switch-option">
        <h3><?php echo e(trans('lang.hw_section_tabs')); ?></h3>
        <div class="float-right">
            <switch_button v-model="show_hwtabs"><?php echo e(trans('lang.show_or_hide_section')); ?></switch_button>
            <input type="hidden" :value="show_hwtabs" name="show_hwtabs">
        </div>
    </div>
    <div class="dc-sidepadding dc-tabsinfo">
        <div class="dc-formtheme dc-userform">
            <fieldset class="how-it-tab-area">
                <?php if(!empty($home_how_works_tabs)): ?>
                    <?php $counter = 0; ?>
                    <?php $__currentLoopData = $home_how_works_tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="wrap-hwtabs-icons dc-haslayout">
                            <div class="form-group-holder">
                                <div class="form-group">
                                    <?php echo Form::text('tabs['.$counter.'][title]', e($value['title']),
                                    ['class' => 'form-control', 'placeholder' => trans('lang.ph.title')]); ?>

                                </div>
                                <div class="form-group">
                                    <?php echo Form::text('tabs['.$counter.'][subtitle]', e($value['subtitle']),
                                    ['class' => 'form-control', 'placeholder' => trans('lang.ph.subtitle')]); ?>

                                </div>
                                <div class="dc-settingscontent dc-dbsectionspace upload-imgresizehold">
                                    <div class = "dc-formtheme dc-userform">
                                         <?php if(!empty($value['tab_img'])): ?>
                                            <upload-media
                                            :img="'<?php echo e($value['tab_img']); ?>'"
                                            :img_id="'tab_img-<?php echo e($counter); ?>'"
                                            :img_name="'tabs[<?php echo e($counter); ?>][tab_img]'"
                                            :img_ref="'tab_img-<?php echo e($counter); ?>'"
                                            :img_hidden_name="'tabs[<?php echo e($counter); ?>][tab_img]'"
                                            :img_hidden_id="'hidden_tab_img-<?php echo e($counter); ?>'"
                                            :existed_img="'<?php echo e($value['tab_img']); ?>'"
                                            :url="'<?php echo e(url("media/upload-temp-image/settings/tabs.$counter.tab_img")); ?>'"
                                            :existing_img_url="'<?php echo e(url("uploads/settings/home/".$value['tab_img'])); ?>'"
                                            :size = "'<?php echo e(Helper::getImageDetail( $value['tab_img'], 'size', 'uploads/settings/home')); ?>'"
                                            :existing_img_name = "'<?php echo e(Helper::getImageDetail( $value['tab_img'], 'name', 'uploads/settings/home')); ?>'"
                                            >
                                            </upload-media>
                                        <?php else: ?>
                                            <upload-media
                                            :img="'tabs[<?php echo e($counter); ?>][tab_img]'"
                                            :img_id="'tab_img-<?php echo e($counter); ?>'"
                                            :img_name="'tabs[<?php echo e($counter); ?>][tab_img]'"
                                            :img_ref="'tab_img-<?php echo e($counter); ?>'"
                                            :img_hidden_name="'tabs[<?php echo e($counter); ?>][tab_img]'"
                                            :img_hidden_id="'hidden_tab_img-<?php echo e($counter); ?>'"
                                            :url="'<?php echo e(url("media/upload-temp-image/settings/tabs.$counter.tab_img]")); ?>'"
                                            >
                                            </upload-media>
                                         <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group dc-rightarea">
                                    <?php if($key == 0 ): ?>
                                        <span class="dc-addinfobtn" @click="addHwTab"><i class="fa fa-plus"></i><?php echo e(trans('lang.add_more')); ?></span>
                                    <?php else: ?>
                                        <span class="dc-addinfobtn dc-deleteinfo delete-hwtab" data-check="<?php echo e($counter); ?>">
                                            <i class="fa fa-trash"></i>
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php $counter++; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="wrap-hwtabs-icons dc-haslayout">
                        <div class="form-group-holder">
                            <div class="form-group">
                                <?php echo Form::text('tabs[0][title]', null, ['class' => 'form-control',
                                'placeholder' => trans('lang.ph.title')]); ?>

                            </div>
                            <div class="form-group">
                                <?php echo Form::text('tabs[0][subtitle]', null, ['class' => 'form-control',
                                'placeholder' => trans('lang.ph.subtitle')]); ?>

                            </div>
                            <div class="dc-settingscontent dc-dbsectionspace upload-imgresizehold">
                                <div class = "dc-formtheme dc-userform">
                                     <?php if(!empty($hw_tab_img)): ?>
                                        <upload-media
                                        :img="'<?php echo e($hw_tab_img); ?>'"
                                        :img_id="'tab_img-0'"
                                        :img_name="'tabs[0][tab_img]'"
                                        :img_ref="'tab_img-0'"
                                        :img_hidden_name="'tabs[0][tab_img]'"
                                        :img_hidden_id="'hidden_tab_img-0'"
                                        :existed_img="'<?php echo e($hw_tab_img); ?>'"
                                        :url="'<?php echo e(url("media/upload-temp-image/settings/tabs.0.tab_img")); ?>'"
                                        :existing_img_url="'<?php echo e(url("uploads/settings/home/$hw_tab_img")); ?>'"
                                        >
                                        </upload-media>
                                    <?php else: ?>
                                        <upload-media
                                        :img="'tabs[0][tab_img]'"
                                        :img_id="'tab_img-0'"
                                        :img_name="'tabs[0][tab_img]'"
                                        :img_ref="'tab_img-0'"
                                        :img_hidden_name="'tabs[0][tab_img]'"
                                        :img_hidden_id="'hidden_tab_img-0'"
                                        :url="'<?php echo e(url("media/upload-temp-image/settings/tabs.0.tab_img")); ?>'"
                                        >
                                        </upload-media>
                                     <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group dc-rightarea">
                            <span class="dc-addinfobtn" @click="addHwTab"><i class="fa fa-plus"></i><?php echo e(trans('lang.add_more')); ?></span>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="wrap-hwtabs-icons dc-haslayout" v-for="(hwtab, index) in hwtabs" ref="howlistelement" v-cloak>
                    <div class="form-group-holder">
                        <div class="form-group">
                            <input placeholder="<?php echo e(trans('lang.ph.title')); ?>" v-bind:name="'tabs['+[hwtab.count]+'][title]'" type="text" class="form-control"
                                v-model="hwtab.tab_title">
                        </div>
                        <div class="form-group">
                            <input placeholder="<?php echo e(trans('lang.ph.subtitle')); ?>" v-bind:name="'tabs['+[hwtab.count]+'][subtitle]'" type="text" class="form-control"
                                v-model="hwtab.tab_subtitle">
                        </div>
                        <div class="dc-settingscontent dc-dbsectionspace upload-imgresizehold">
                            <div class = "dc-formtheme dc-userform">
                                <upload-media
                                    :img="'tab_img'"
                                    :img_id="'tab_img-'+hwtab.count"
                                    :img_name="'tabs['+[hwtab.count]+'][tab_img]'"
                                    :img_ref="'tab_img-'+hwtab.count"
                                    :img_hidden_name="'tabs['+[hwtab.count]+'][tab_img]'"
                                    :img_hidden_id="'hidden_tab_img-'+hwtab.count"
                                    :url="'<?php echo e(url("media/upload-temp-image/settings/tabs.'+[hwtab.count]+'.tab_img")); ?>'"
                                    >
                                </upload-media>
                            </div>
                        </div>
                        <div class="form-group dc-rightarea">
                            <span class="dc-addinfo dc-deleteinfo dc-addinfobtn" @click="removeHwTab(index)"><i class="fa fa-trash"></i></span>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-btn-setting">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/home-page-settings/how-it-works-tabs.blade.php ENDPATH**/ ?>