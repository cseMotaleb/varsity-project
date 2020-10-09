<div class="dc-userlogedin">
    <figure class="dc-userimg">
        <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.Auth::user()->id, Auth::user()->profile->avatar, 'extra-small-', 'user-login.png'))); ?>" 
            alt="<?php echo e(trans('lang.img_desc')); ?>">
    </figure>
    <div class="dc-username">
        <h4><?php echo e(Helper::getUserName(Auth::user()->id)); ?></h4>
        <span><?php echo e(Helper::getRoleTypeByUserID(Auth::user()->id)); ?></span>
    </div>
    <nav class="dc-usernav">
        <ul>
           <?php echo e(Helper::displayDashboardMenu('profile')); ?>

           <li>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('profile-logout-form').submit();">
                    <i class="lnr lnr-exit"></i><?php echo e(trans('lang.logout')); ?>

                </a>
                <form id="profile-logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
        </ul>

    </nav>
</div>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/includes/profile-menu.blade.php ENDPATH**/ ?>