<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id' =>'sidebar-setting-form', '@submit.prevent'=>'submitSidebarSettings']); ?>

    <div class="dc-tabscontenttitle la-switch-option">
        <h3><?php echo e(trans('lang.show_or_hide_sidebar')); ?></h3>
        <div class="float-right">
            <switch_button v-model="display_sidebar"><?php echo e(trans('lang.show_or_hide_sidebar')); ?></switch_button>
            <input type="hidden" :value="display_sidebar" name="display_sidebar">
        </div>
    </div>
    <div class="dc-sidebar-ask-query dc-tabsinfo dc-location">
        <div class="dc-tabscontenttitle la-switch-option">
            <h3><?php echo e(trans('lang.ask_query_settings')); ?></h3>
            <div class="float-right">
                <switch_button v-model="display_query_section"><?php echo e(trans('lang.show_or_hide_section')); ?></switch_button>
                <input type="hidden" :value="display_query_section" name="display_query_section">
            </div>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <?php if(!empty($ask_query_img)): ?>
                        <upload-media
                        :img="'<?php echo e($ask_query_img ?? ''); ?>'"
                        :img_id="'ask_query_img'"
                        :img_name="'ask_query_img'"
                        :img_ref="'ask_query_img'"
                        :img_hidden_name="'hidden_ask_query_img'"
                        img_hidden_id="'hidden_ask_query_img'"
                        :existed_img="'<?php echo e($ask_query_img ?? ''); ?>'"
                        :url="'<?php echo e(url("media/upload-temp-image/settings/ask_query_img")); ?>'"
                        :existing_img_url="'<?php echo e(url("uploads/settings/general/$ask_query_img")); ?>'"
                        :size = "'<?php echo e(Helper::getImageDetail( $ask_query_img, 'size', 'uploads/settings/general')); ?>'"
                        :existing_img_name = "'<?php echo e(Helper::getImageDetail( $ask_query_img, 'name', 'uploads/settings/general')); ?>'"
                        >
                        </upload-media>
                    <?php else: ?>
                        <upload-media
                            :img="'ask_query_img'"
                            :img_id="'ask_query_img'"
                            :img_name="'ask_query_img'"
                            :img_ref="'ask_query_img'"
                            :img_hidden_name="'hidden_ask_query_img'"
                            img_hidden_id="'hidden_ask_query_img'"
                            :url="'<?php echo e(url("media/upload-temp-image/settings/ask_query_img")); ?>'"
                            >
                        </upload-media>
                    <?php endif; ?>
                    <div class="form-group">
                        <?php echo Form::text('query_title', e($query_title ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.title'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::text('query_subtitle', e($query_subtitle ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.subtitle'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('query_btn_title', e($query_btn_title ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.btn_title'))); ?>

                    </div>
                    <div class="form-group form-group-half">
                        <?php echo Form::text('query_btn_link', e($query_btn_link ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.btn_link'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::textarea('query_desc', e($query_desc ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.desc'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-sidebar-app-settings dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle la-switch-option">
            <h3><?php echo e(trans('lang.get_app_settings')); ?></h3>
            <div class="float-right">
                <switch_button v-model="display_get_app_sec"><?php echo e(trans('lang.show_or_hide_app_sec')); ?></switch_button>
                <input type="hidden" :value="display_get_app_sec" name="display_get_app_sec">
            </div>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                        <?php if(!empty($download_app_img)): ?>
                        <upload-media
                        :img="'<?php echo e($download_app_img ?? ''); ?>'"
                        :img_id="'download_app_img'"
                        :img_name="'download_app_img'"
                        :img_ref="'download_app_img'"
                        :img_hidden_name="'hidden_download_app_img'"
                        img_hidden_id="'hidden_download_app_img'"
                        :existed_img="'<?php echo e($download_app_img ?? ''); ?>'"
                        :url="'<?php echo e(url("media/upload-temp-image/settings/download_app_img")); ?>'"
                        :existing_img_url="'<?php echo e(url("uploads/settings/general/$download_app_img")); ?>'"
                        :size = "'<?php echo e(Helper::getImageDetail( $download_app_img, 'size', 'uploads/settings/general')); ?>'"
                        :existing_img_name = "'<?php echo e(Helper::getImageDetail( $download_app_img, 'name', 'uploads/settings/general')); ?>'"
                        >
                        </upload-media>
                    <?php else: ?>
                        <upload-media
                            :img="'download_app_img'"
                            :img_id="'download_app_img'"
                            :img_name="'download_app_img'"
                            :img_ref="'download_app_img'"
                            :img_hidden_name="'hidden_download_app_img'"
                            img_hidden_id="'hidden_download_app_img'"
                            :url="'<?php echo e(url("media/upload-temp-image/settings/download_app_img")); ?>'"
                            >
                        </upload-media>
                    <?php endif; ?>
                    <div class="form-group">
                        <?php echo Form::text('download_app_title', e($download_app_title ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.title'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::text('download_app_subtitle', e($download_app_subtitle ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.subtitle'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::textarea('download_app_desc', e($download_app_desc ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.desc'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::text('download_app_link', e($download_app_link ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.link'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-sidebar-ad dc-location dc-tabsinfo">
        <div class="dc-tabscontenttitle la-switch-option">
            <h3><?php echo e(trans('lang.ad_section')); ?></h3>
            <div class="float-right">
                <switch_button v-model="display_get_ad_sec"><?php echo e(trans('lang.show_or_hide_ad_sec')); ?></switch_button>
                <input type="hidden" :value="display_get_ad_sec" name="display_get_ad_sec">
            </div>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::textarea('ad_content', e($ad_content ?? ''), array('class' => 'form-control', 'class' => 'dc-tinymceeditor', 'id' => 'dc-tinymceeditor', 'placeholder'=>trans('lang.content'))); ?>

                    </div>  
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/sidebar-settings.blade.php ENDPATH**/ ?>