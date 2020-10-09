<?php $__env->startPush('backend_stylesheets'); ?>
    <link href="<?php echo e(asset('css/chosen.css')); ?>" rel="stylesheet">
<?php $__env->stopPush(); ?>
<?php echo Form::open(['class' =>'dc-formtheme dc-userform', 'id' =>'payment-form', '@submit.prevent'=>'submitPaymentSettings']); ?>

    <div class="dc-currencysettings dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.currency_setting')); ?></h3>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <span class="dc-select">
                        <?php echo e(Form::select('currency', $currency, e($existing_currency), ['class'=>'form-control','placeholder'=>trans('lang.select_currency')])); ?>

                    </span>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-paymentmethod dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.select_payment_method')); ?></h3>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <span class="dc-select">
                            <select name="payment_method[]" class="chosen-select" multiple data-placeholder = "<?php echo e(trans('lang.select_payment_method')); ?>">
                                <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $payment_method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $selected = in_array($payment_method['value'], $payment_gateway) ? 'selected': ''; ?>
                                    <option value="<?php echo e($payment_method['value']); ?>" <?php echo e($selected); ?>><?php echo e(html_entity_decode(clean($payment_method['title']))); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </span>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-min-payout dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.min_payout')); ?></h3>
        </div>
        <div class="dc-sidepadding">
            <div class="dc-description">
                <p><?php echo e(trans('lang.set_min_payout')); ?></p>
            </div>
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::number('min_payout', e($min_payout), ['class' => 'form-control', 'placeholder' => trans('lang.min_payout')]); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder mb-5 mt-0">
            <?php echo Form::submit(trans('lang.btn_save'),['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php $__env->startPush('backend_scripts'); ?>
    <script src="<?php echo e(asset('js/chosen.jquery.js')); ?>"></script>
    <script>
        jQuery('.chosen-select').chosen();
    </script>
<?php $__env->stopPush(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/payment-settings/commision-settings.blade.php ENDPATH**/ ?>