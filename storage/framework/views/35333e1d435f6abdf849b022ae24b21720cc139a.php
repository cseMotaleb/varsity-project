<div class="dc-settingscontent dc-tabsinfo la-profilephoto">
    <?php if(!empty($galleries)): ?>
        <upload-media
        :title="'<?php echo e(trans('lang.images')); ?>'"
        :img="'gallery'"
        :img_id="'gallery'"
        :img_name="'gallery'"
        :img_ref="'gallery'"
        :img_hidden_name="'user_gallery'"
        :img_hidden_id="'hidden_gallery'"
        :url="'<?php echo e(url("media/upload-temp-image/users/gallery/profile_gallery")); ?>'"
        :no_of_files="10"
        :file_type="'gallery'">
        </upload-media>
        <div class="form-group form-group-label gallery gallery-image-area">
            <div class="la-gallery-image-holder">
                <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php 
                        if (file_exists(public_path('uploads/users/'.Auth::user()->id.'/gallery/images/'.$gallery))) {
                                $document_size = File::size(Helper::publicPath().'/uploads/users/'.Auth::user()->id.'/gallery/images/'.$gallery);
                        } else {
                                $document_size = 0;
                        }
                    ?>
                    <div class="la-gallery-image">
                        <div class="dc-uploadingbox dz-image-preview dz-processing dz-success dz-complete" id="attachment-item-<?php echo e($key); ?>">
                            <figure><img src="<?php echo e(asset('/uploads/users/'.Auth::user()->id.'/gallery/images/'.$gallery)); ?>" alt=""></figure>
                            <div class="dc-uploadingbar">
                                <div class="dz-filename"><?php echo e(Helper::formateFileName($gallery)); ?></div>
                                <span><?php echo e(trans('lang.file_size')); ?> <?php echo e($document_size); ?></span>
                                <a class="lnr lnr-cross" href="javascript:;" v-on:click.prevent="deleteAttachment('attachment-item-<?php echo e($key); ?>')"></a>
                            </div> 
                            <input type="hidden" value="<?php echo e($gallery); ?>" id="gallery-<?php echo e($key); ?>" class="hidden-file" name="images[<?php echo e($key); ?>]">
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php else: ?>
        <div class = "dc-formtheme dc-userform">
            <upload-media
                :title="'<?php echo e(trans('lang.images')); ?>'"
                :img="'gallery'"
                :img_id="'gallery'"
                :img_name="'gallery'"
                :img_ref="'gallery'"
                :img_hidden_name="'user_gallery'"
                :img_hidden_id="'hidden_gallery'"
                :url="'<?php echo e(url("media/upload-temp-image/users/gallery/profile_gallery")); ?>'"
                :no_of_files="10"
                :file_type="'gallery'"
                >
            </upload-media>
            <div class="form-group form-group-label gallery gallery-image-area"></div>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/gallery/images.blade.php ENDPATH**/ ?>