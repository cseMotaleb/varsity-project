<ul class="navbar-nav">
    <li class="nav-item">
        <a href="<?php echo e(route('forumQuestions')); ?>"><?php echo e(trans('lang.health_forum')); ?></a>
    </li>
    <li class="menu-item-has-children page_item_has_children">
        <a href="javascript:void(0);"><?php echo e(trans('lang.search_results')); ?></a>
        <ul class="sub-menu menu-item-moved">
            <li>
                <a href="<?php echo e(url('search-results?type=doctor')); ?>"><?php echo e(trans('lang.search_doctors')); ?></a>
            </li>
            <li>
                <a href="<?php echo e(url('search-results?type=hospital')); ?>"><?php echo e(trans('lang.search_hospitals')); ?></a>
            </li>
        </ul>
    </li>
    
</ul><?php /**PATH D:\xamp\htdocs\doctry\resources\views/includes/navigation.blade.php ENDPATH**/ ?>