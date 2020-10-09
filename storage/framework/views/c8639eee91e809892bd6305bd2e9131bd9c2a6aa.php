<?php if(!empty($downloads)): ?>
    <div class="dc-downloads-holder dc-aboutinfo">
        <div class="dc-infotitle">
            <h3><?php echo e(trans('lang.downloads')); ?></h3>
        </div>
        <ul class="dc-downloads-listing">
            <?php $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $download): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li id="attachment-item-<?php echo e($key); ?>">
                    <div class="dc-files-content">
                        <div class="dc-filecontent">
                            <a href="<?php echo e(route('getfile', ['type'=>'users', 'id'=>$user->id, 'attachment'=>$download])); ?>">
                                <h3>
                                    <?php echo e(Helper::formateFileName($download)); ?> 
                                    <?php if(file_exists(public_path('uploads/users/'.$user->id.'/'.$download))): ?>
                                        <span> 
                                            <?php echo e(trans('lang.file_size')); ?> 
                                            <?php echo e(Helper::bytesToHuman(File::size(public_path('uploads/users/'.$user->id.'/'.$download)))); ?> 
                                        </span>
                                    <?php endif; ?>
                                </h3>
                            </a>
                        </div>
                    </div>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/user-details/downloads.blade.php ENDPATH**/ ?>