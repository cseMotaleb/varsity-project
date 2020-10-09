
    <?php if(!empty($experiences)): ?>
        <load-more-experience :title="'<?php echo e(trans('lang.experience')); ?>'" :no_of_post="3" :modal_ref="'experienceModal'" :modal_title="'<?php echo e(trans('lang.edu_details')); ?>'" :url="'/get-doctor-experience'" :doctor_id="'<?php echo e($user->id); ?>'"></load-more-experience>
    <?php endif; ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/user-details/experience.blade.php ENDPATH**/ ?>