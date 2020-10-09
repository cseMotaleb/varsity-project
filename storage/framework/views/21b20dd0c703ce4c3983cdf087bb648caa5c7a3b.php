<?php echo Form::open(['url' => '', 'class' =>'dc-formtheme dc-userform', 'id' =>'booking-setting-form', '@submit.prevent'=>'submitBookingSettings']); ?>

    <div class="dc-socialiconsetting dc-tabsinfo dc-haslayout">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.online_bookings')); ?></h3>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-settingscontent">
                <div class="dc-description">
                    <p><?php echo e(trans('lang.enable_disable_online_booking')); ?></p>
                </div>
                <ul class="dc-accountinfo">
                    <li>
                        <switch_button v-model="enable_booking">
                            <span><?php echo e(trans('lang.enable_online_booking')); ?></span>
                        </switch_button>
                        <input type="hidden" :value="enable_booking" name="enable_booking">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'), ['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/booking-settings.blade.php ENDPATH**/ ?>