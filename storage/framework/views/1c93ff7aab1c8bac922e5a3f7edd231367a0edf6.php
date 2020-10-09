<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme', 'id' =>'gallery-upload', '@submit.prevent'=>'uploadGallery("'.$user_role.'")']); ?>

    <?php echo $__env->make('back-end.doctors.profile-settings.gallery.images', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('back-end.doctors.profile-settings.gallery.videos', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close();; ?><?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/gallery/index.blade.php ENDPATH**/ ?>