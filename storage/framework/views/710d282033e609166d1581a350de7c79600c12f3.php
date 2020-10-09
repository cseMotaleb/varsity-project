<?php if(!empty($registration_details['registration_number'])): ?>
    <div class="dc-specializations dc-aboutinfo dc-memberships">
        <div class="dc-infotitle">
            <h3><?php echo e(trans('lang.registrations')); ?></h3>
        </div>
        <ul class="dc-specializationslist">
            <li><span><?php echo e(html_entity_decode(clean($registration_details['registration_number']))); ?></span></li>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/user-details/registrations.blade.php ENDPATH**/ ?>