	<?php if(!empty($educations)): ?>
        <load-more-education :title="'<?php echo e(trans('lang.education')); ?>'" :no_of_post="3" :modal_ref="'educationModal'" :modal_title="'<?php echo e(trans('lang.edu_details')); ?>'" :url="'/get-doctor-education'" :doctor_id="'<?php echo e($user->id); ?>'"></load-more-education>
    <?php endif; ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/user-details/education.blade.php ENDPATH**/ ?>