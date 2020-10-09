<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme', 'id' =>'awards-downloads-form', '@submit.prevent'=>'submitAwardsDownloads']); ?>

<div class="dc-addawardsholder dc-tabsinfo">
    <div class="dc-tabscontenttitle">
        <h3><?php echo e(trans('lang.awards_recogn')); ?></h3>
    </div>
    <div class="dc-skillscontent-holder dc-doc-awards">
        <awards></awards>
    </div>
</div>
<div class="dc-bannerphoto dc-tabsinfo">
    <div class="dc-settingscontent dc-doc-downloads">
        <?php if(!empty($downloads)): ?>
            <upload-media
            :title="'<?php echo e(trans('lang.downloads')); ?>'"
            :img="'downloads'"
            :img_id="'downloads'"
            :img_name="'downloads'"
            :img_ref="'downloads'"
            :img_hidden_name="'hidden_downloads'"
            :img_hidden_id="'hidden_downloads'"
            :url="'<?php echo e(url("media/upload-temp-image/users/downloads/multiple_types")); ?>'"
            :file_type="'multiple_types'"
            :no_of_files=10>
            </upload-media>
            <div class="dc-downloads-files">
                <ul>
                    <?php $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $download): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php 
                            if (file_exists(public_path('uploads/users/'.Auth::user()->id.'/'.$download))) {
                                    $document_size =  File::size(Helper::publicPath().'/uploads/users/'.Auth::user()->id.'/'.$download);
                            } else {
                                    $document_size = 0;
                            }
                        ?>
                        <li id="attachment-item-<?php echo e($key); ?>">
                            <div class="dc-files-content">
                                <img src="<?php echo e(url('/images/file-icon.png')); ?>">
                                <div class="dc-filecontent">
                                    <span><?php echo e(Helper::formateFileName($download)); ?></span>
                                    <a href="javascript:void(0);" v-on:click.prevent="deleteAttachment('attachment-item-<?php echo e($key); ?>')" class="dc-closediv">
                                        <i class="lnr lnr-cross"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="hidden" value="<?php echo e($download); ?>" class="" name="attachments[<?php echo e($key); ?>]">
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php else: ?>
            <upload-media
                :title="'<?php echo e(trans('lang.downloads')); ?>'"
                :img="'downloads'"
                :img_id="'downloads'"
                :img_name="'downloads'"
                :img_ref="'downloads'"
                :img_hidden_name="'hidden_downloads'"
                :img_hidden_id="'hidden_downloads'"
                :url="'<?php echo e(url("media/upload-temp-image/users/downloads/multiple_types")); ?>'"
                :file_type="'multiple_types'"
                :no_of_files=10
                >
            </upload-media>
        <?php endif; ?>
    </div>
</div>
<div class="dc-experienceaccordion">
    <div class="dc-updatall la-updateall-holder">
        <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

    </div>
</div>
<?php echo Form::close();; ?>

<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/awards-downloads/index.blade.php ENDPATH**/ ?>