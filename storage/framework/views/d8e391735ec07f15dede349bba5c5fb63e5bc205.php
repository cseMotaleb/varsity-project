<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id' =>'general-setting-form', '@submit.prevent'=>'submitGeneralSettings']); ?>

    <div class="dc-settingscontent dc-tabsinfo">
        <?php if(!empty($site_logo)): ?>
            <upload-media
            :title="'<?php echo e(trans('lang.site_logo')); ?>'"
            :img="'<?php echo e($site_logo); ?>'"
            :img_id="'site_logo'"
            :img_name="'site_logo'"
            :img_ref="'site_logo'"
            :img_hidden_name="'site_logo'"
            img_hidden_id="'hidden_site_logo'"
            :existed_img="'<?php echo e($site_logo); ?>'"
            :url="'<?php echo e(url("media/upload-temp-image/settings/site_logo")); ?>'"
            :existing_img_url="'<?php echo e(url("uploads/settings/general/$site_logo")); ?>'"
            :size = "'<?php echo e(Helper::getImageDetail( $site_logo, 'size', 'uploads/settings/general')); ?>'"
            :existing_img_name = "'<?php echo e(Helper::getImageDetail( $site_logo, 'name', 'uploads/settings/general')); ?>'"
            >
            </upload-media>
        <?php else: ?>
            <upload-media
                :title="'<?php echo e(trans('lang.site_logo')); ?>'"
                :img="'site_logo'"
                :img_id="'site_logo'"
                :img_name="'site_logo'"
                :img_ref="'site_logo'"
                :img_hidden_name="'site_logo'"
                img_hidden_id="'hidden_site_logo'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/site_logo")); ?>'"
                >
            </upload-media>
        <?php endif; ?>
    </div>
    <div class="dc-settingscontent dc-tabsinfo">
        <?php if(!empty($site_favicon)): ?>
            <upload-media
            :title="'<?php echo e(trans('lang.site_favicon')); ?>'"
            :img="'<?php echo e($site_favicon); ?>'"
            :img_id="'favicon'"
            :img_name="'site_favicon'"
            :img_ref="'site_favicon'"
            :img_hidden_name="'site_favicon'"
            img_hidden_id="'hidden_site_favicon'"
            :existed_img="'<?php echo e($site_favicon); ?>'"
            :url="'<?php echo e(url("media/upload-temp-image/settings/site_favicon")); ?>'"
            :existing_img_url="'<?php echo e(url("uploads/settings/general/$site_favicon")); ?>'"
            :size = "'<?php echo e(Helper::getImageDetail( $site_favicon, 'size', 'uploads/settings/general')); ?>'"
            :existing_img_name = "'<?php echo e(Helper::getImageDetail( $site_favicon, 'name', 'uploads/settings/general')); ?>'"
            >
            </upload-media>
        <?php else: ?>
            <upload-media
                :title="'<?php echo e(trans('lang.site_favicon')); ?>'"
                :img="'favicon'"
                :img_id="'favicon'"
                :img_name="'site_favicon'"
                :img_ref="'site_favicon'"
                :img_hidden_name="'site_favicon'"
                img_hidden_id="'hidden_favicon'"
                :url="'<?php echo e(url("media/upload-temp-image/settings/site_favicon")); ?>'"
                >
            </upload-media>
        <?php endif; ?>
    </div>
    <div class="dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.google_map_api_key')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('gmap_api_key', e($gmap_api_key), array('class' => 'form-control', 'placeholder'=>trans('lang.api_key'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.language_setting')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <span class="dc-select">
                            <select class="form-control" name="language">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $selected = $key == $selected_language ? 'selected' : ''; ?>
                                    <option value="<?php echo e($key); ?>" <?php echo e($selected); ?>> <?php echo e(clean($language['title'])); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="hidden" :value="'lang-'+language" name="body-lang-class" id="lang_hidden">
                        </span>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-chatsetting dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.registration')); ?></h3>
        </div>
        <div class="dc-settingscontent dc-sidepadding">
            <div class="dc-description">
                <p><?php echo e(trans('lang.registration_note')); ?></p>
            </div>
            <ul class="dc-accountinfo">
                <li>
                <switch_button v-model="display_registration"><?php echo e(trans('lang.display_registration')); ?></switch_button>
                    <input type="hidden" :value="display_registration" name="display_registration">
                </li>
            </ul>
        </div>
    </div>
    <div class="dc-chatsetting dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.chat_setting')); ?></h3>
        </div>
        <div class="dc-settingscontent dc-sidepadding">
            <div class="dc-description">
                <p><?php echo e(trans('lang.chat_setting_note')); ?></p>
            </div>
            <ul class="dc-accountinfo">
                <li>
                <switch_button v-model="display_chat"><?php echo e(trans('lang.display_chat')); ?></switch_button>
                    <input type="hidden" :value="display_chat" name="display_chat">
                </li>
            </ul>
        </div>
    </div>
    <div class="dc-tabsinfo la-site-colors">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.color_setting')); ?></h3>
        </div>
        <div class="dc-settingscontent dc-sidepadding">
            <div class="dc-description">
                <p><?php echo e(trans('lang.color_setting_note')); ?></p>
            </div>
            
            <div class="dc-wrap-colors">
                <ul class="dc-accountinfo">
                    <li>
                        <switch_button v-model="enable_primary_color">
                            <span v-if="enable_primary_color"><?php echo e(trans('lang.primary_color')); ?></span>
                            <span v-else><?php echo e(trans('lang.enable_prim_custom_color')); ?></span>
                        </switch_button>
                        <input type="hidden" :value="enable_primary_color" name="enable_primary_color">
                    </li>
                </ul>
                <div class="form-group la-color-picker" v-if="enable_primary_color">
                    <verte display="widget" v-model="primary_color" menuPosition="left" model="hex"></verte>
                    <input type="hidden" name="primary_color" :value="primary_color">
                </div>
            </div>
            
            <div class="dc-wrap-colors">
                <ul class="dc-accountinfo">
                    <li>
                        <switch_button v-model="enable_secondary_color">
                            <span v-if="enable_secondary_color"><?php echo e(trans('lang.secondary_color')); ?></span>
                            <span v-else><?php echo e(trans('lang.enable_sec_custom_color')); ?></span>
                        </switch_button>
                        <input type="hidden" :value="enable_secondary_color" name="enable_secondary_color">
                    </li>
                </ul>
                <div class="form-group la-color-picker" v-if="enable_secondary_color">
                    <verte display="widget" v-model="secondary_color" menuPosition="left" model="hex"></verte>
                    <input type="hidden" name="secondary_color" :value="secondary_color">
                </div>
            </div>
            
            <div class="dc-wrap-colors">
                <ul class="dc-accountinfo">
                    <li>
                        <switch_button v-model="enable_tertiary_color">
                            <span v-if="enable_tertiary_color"><?php echo e(trans('lang.tertiary_color')); ?></span>
                            <span v-else><?php echo e(trans('lang.enable_ter_custom_color')); ?></span>
                        </switch_button>
                        <input type="hidden" :value="enable_tertiary_color" name="enable_tertiary_color">
                    </li>
                </ul>
                <div class="form-group la-color-picker" v-if="enable_tertiary_color">
                    <verte display="widget" v-model="tertiary_color" menuPosition="left" model="hex"></verte>
                    <input type="hidden" name="tertiary_color" :value="tertiary_color">
                </div>
            </div>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/general-settings.blade.php ENDPATH**/ ?>