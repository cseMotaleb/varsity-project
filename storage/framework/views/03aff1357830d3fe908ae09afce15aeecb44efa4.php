<div class="dc-doc-video dc-tabsinfo dc-formtheme dc-socials-form la-video-content">
    <fieldset class="video-content">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.videos')); ?></h3>
        </div>
        <?php if(!empty($gallery_videos)): ?>
            <?php $counter = 0 ?>
            <?php $__currentLoopData = $gallery_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video_key => $mem_value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="wrap-video dc-haslayout">
                    <div class="form-group">
                        <div class="form-group-holder">
                            <?php echo Form::text('video['.$counter.'][url]', e($mem_value['url']),
                            ['class' => 'form-control']); ?>

                        </div>
                        <div class="form-group dc-rightarea">
                            <?php if($video_key == 0 ): ?>
                                <span class="dc-addinfobtn" @click="addVideo"><i class="fa fa-plus"></i></span> 
                            <?php else: ?>
                                <span class="dc-addinfobtn dc-deleteinfo delete-video" data-check="<?php echo e($counter); ?>">
                                    <i class="fa fa-trash"></i>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="wrap-video dc-haslayout">
                <div class="form-group">
                    <div class="form-group-holder">
                        <?php echo Form::text('video[0][url]', null, ['class' => 'form-control',
                            'placeholder' => trans('lang.video_url')]); ?>

                    </div>
                    <div class="form-group dc-rightarea">
                        <span class="dc-addinfo dc-addinfobtn" @click="addVideo"><i class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div v-for="(video, index) in videos" v-cloak>
            <div class="wrap-video dc-haslayout">
                <div class="form-group">
                    <div class="form-group-holder">
                        <input v-bind:name="'video['+[video.count]+'][url]'" type="text" class="form-control"
                            v-model="video.url" placeholder="<?php echo e(trans('lang.video_url')); ?>">
                    </div>
                    <div class="form-group dc-rightarea">
                        <span class="dc-addinfo dc-deleteinfo dc-addinfobtn" @click="removeVideo(index)"><i class="fa fa-trash"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/gallery/videos.blade.php ENDPATH**/ ?>