<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id' =>'forum-setting-form', '@submit.prevent'=>'submitForumSettings']); ?>

    <div class="dc-sidebar-ask-query dc-tabsinfo dc-location">
        <div class="dc-tabscontenttitle la-switch-option">
            <h3><?php echo e(trans('lang.forum_settings')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <?php if(!empty($forum_banner_image)): ?>
                        <upload-media
                        :img="'<?php echo e($forum_banner_image ?? ''); ?>'"
                        :img_id="'forum_banner_image'"
                        :img_name="'forum_banner_image'"
                        :img_ref="'forum_banner_image'"
                        :img_hidden_name="'hidden_forum_banner_image'"
                        img_hidden_id="'hidden_forum_banner_image'"
                        :existed_img="'<?php echo e($forum_banner_image ?? ''); ?>'"
                        :url="'<?php echo e(url("media/upload-temp-image/settings/forum_banner_image")); ?>'"
                        :existing_img_url="'<?php echo e(url("uploads/settings/general/$forum_banner_image")); ?>'"
                        :size = "'<?php echo e(Helper::getImageDetail( $forum_banner_image, 'size', 'uploads/settings/general')); ?>'"
                        :existing_img_name = "'<?php echo e(Helper::getImageDetail( $forum_banner_image, 'name', 'uploads/settings/general')); ?>'"
                        >
                        </upload-media>
                    <?php else: ?>
                        <upload-media
                            :img="'forum_banner_image'"
                            :img_id="'forum_banner_image'"
                            :img_name="'forum_banner_image'"
                            :img_ref="'forum_banner_image'"
                            :img_hidden_name="'hidden_forum_banner_image'"
                            img_hidden_id="'hidden_forum_banner_image'"
                            :url="'<?php echo e(url("media/upload-temp-image/settings/forum_banner_image")); ?>'"
                            >
                        </upload-media>
                    <?php endif; ?>
                    <div class="form-group">
                        <?php echo Form::text('forum_banner_title', e($forum_banner_title ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.title'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::text('forum_banner_subtitle', e($forum_banner_subtitle ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.subtitle'))); ?>

                    </div>
                    <div class="form-group">
                        <?php echo Form::textarea('forum_banner_desc', e($forum_banner_desc ?? ''), array('class' => 'form-control', 'placeholder'=>trans('lang.desc'))); ?>

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

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/forum-settings.blade.php ENDPATH**/ ?>