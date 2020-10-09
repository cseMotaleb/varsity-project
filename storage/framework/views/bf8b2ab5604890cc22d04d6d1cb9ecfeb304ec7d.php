<?php if(!empty($awards)): ?>
    <div class="dc-awards-holder dc-aboutinfo">
        <div class="dc-infotitle">
            <h3><?php echo e(trans('lang.awards_recogn')); ?>

                <?php if(count($awards) > 3): ?>
                    <a href="javascript:void(0)" v-on:click="showModal('awardsModal')"><?php echo e(trans('lang.more')); ?></a>
                <?php endif; ?>
            </h3>
        </div>
        <ul class="dc-expandedu">
            <?php $__currentLoopData = Helper::customPaginator(request(), $awards, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><span><?php echo e(html_entity_decode(clean($award['title']))); ?> <em>( <?php echo e(clean($award['year'])); ?> )</em></span></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <b-modal ref="awardsModal" hide-footer title="<?php echo e(trans('lang.awards')); ?>">
            <div class="d-block text-left">
                <ul class="dc-expandedu">
                    <?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><span><?php echo e(html_entity_decode(clean($award['title']))); ?> <em>( <?php echo e(clean($award['year'])); ?> )</em></span></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </b-modal>
    </div>
<?php endif; ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/user-details/awards.blade.php ENDPATH**/ ?>