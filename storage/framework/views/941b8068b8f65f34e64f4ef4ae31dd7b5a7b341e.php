<?php echo Form::open(['class' =>'dc-formtheme dc-userform', 'id' =>'submit-chat-form', '@submit.prevent'=>'submitChatSettings']); ?>

    <div class="dc-hostinfo dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.host')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-description">
                <ol>
                    <li><?php echo e(trans('lang.host_note_1')); ?></li>
                    <li><?php echo e(trans('lang.host_note_2')); ?></li>
                </ol>
            </div>
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::text('host', e($host), array('class' => 'form-control', 'placeholder'=> trans('lang.host'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-portinfo dc-tabsinfo">
        <div class="dc-tabscontenttitle">
            <h3><?php echo e(trans('lang.port')); ?></h3>
        </div>
        <div class="dc-settingscontent">
            <div class="dc-description">
                <?php echo e(trans('lang.port_note_1')); ?>

                <ol>
                    <li><?php echo e(trans('lang.port_note_2')); ?></li>
                    <li><?php echo e(trans('lang.port_note_3')); ?></li>
                    <li>
                        <?php echo e(trans('lang.port_note_4')); ?>

                        <?php echo e(trans('lang.port_note_5')); ?>

                        <?php echo e(trans('lang.port_note_6')); ?>

                    </li>
                </ol>
            </div>
            <div class="dc-formtheme dc-userform">
                <fieldset>
                    <div class="form-group">
                        <?php echo Form::number('port', e($port), array('class' => 'form-control', 'placeholder'=>trans('lang.port'))); ?>

                    </div>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="dc-experienceaccordion">
        <div class="dc-updatall la-updateall-holder">
            <?php echo Form::submit(trans('lang.btn_save'),['class' => 'dc-btn']); ?>

        </div>
    </div>
<?php echo Form::close(); ?>

<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/admin/settings/general/chat-settings.blade.php ENDPATH**/ ?>