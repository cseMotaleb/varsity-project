<?php echo Form::open(['url' => '', 'class' => 'dc-formtheme dc-addexperience dc-tabsinfo', 'id' => 'experience-form', '@submit.prevent' => 'submitExperiences']); ?>

    <?php echo $__env->make('back-end.doctors.profile-settings.experience-education.experience', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-btn-setting">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php echo Form::open(['class' => 'dc-formtheme dc-addeducation', 'id' => 'education-form', '@submit.prevent' => 'submitEducations']); ?>

    <?php echo $__env->make('back-end.doctors.profile-settings.experience-education.education', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-btn-setting">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH E:\xamp\htdocs\doctry\resources\views/back-end/doctors/profile-settings/experience-education/index.blade.php ENDPATH**/ ?>