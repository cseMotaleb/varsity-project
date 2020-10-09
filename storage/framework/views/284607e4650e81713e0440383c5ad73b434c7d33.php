
<?php if(!empty($memberships)): ?>
    <div class="dc-specializations dc-aboutinfo dc-memberships">
        <div class="dc-infotitle">
            <h3><?php echo e(trans('lang.memberships')); ?>

                <?php if(count($memberships) > 3): ?>
                    <a href="javascript:void(0)" v-on:click="showModal('memberModal')"><?php echo e(trans('lang.more')); ?></a>
                <?php endif; ?>
            </h3>
        </div>
            <ul class="dc-specializationslist">
                <?php $__currentLoopData = Helper::customPaginator(request(), $memberships, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><span><?php echo e(html_entity_decode(clean($membership['title']))); ?></span></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        <b-modal ref="memberModal" hide-footer title="<?php echo e(trans('lang.memberships')); ?>">
            <div class="d-block text-left">
                <ul class="dc-expandedu">
                    <?php $__currentLoopData = $memberships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $membership): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><span><?php echo e(html_entity_decode(clean($membership['title']))); ?></span></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </b-modal>
    </div>
<?php endif; ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/user-details/memberships.blade.php ENDPATH**/ ?>