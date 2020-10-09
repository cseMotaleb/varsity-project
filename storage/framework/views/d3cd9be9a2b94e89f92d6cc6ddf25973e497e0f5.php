<?php
    $items = Helper::getDashboardList();
    $output = '';
    $role_type = Helper::getAuthRoleType();
    $profile_link = $role_type == 'doctor' || $role_type == 'hospital' ? route('userProfile', ['slug' => Auth::user()->slug]) : 'javascript:;';
?>
<div id="dc-btnmenutoggle" class="dc-btnmenutoggle">
    <i class="ti-arrow-left"></i>
</div>
<div id="dc-verticalscrollbar" class="dc-verticalscrollbar">
    <div class="dc-companysdetails dc-usersidebar">
        <figure class="dc-companysimg">
            <img src="<?php echo e(asset(Helper::getImage('uploads/users/'.Auth::user()->id, Auth::user()->profile->banner, 'small-', 'user-banner.jpg'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>">
        </figure>
        <div class="dc-companysinfo">
            <figure><img src="<?php echo e(asset(Helper::getImage('uploads/users/'.Auth::user()->id, Auth::user()->profile->avatar, 'small-', 'user.jpg'))); ?>" alt="<?php echo e(trans('lang.img_desc')); ?>"></figure>
            <div class="dc-title">
                <h2><a href="<?php echo e($profile_link); ?>"> <?php echo e(Helper::getUserName(Auth::user()->id)); ?></a></h2>
                <span>@ <?php echo e(Auth::user()->slug); ?> <i class="fa fa-clone"></i></span>
            </div>
        </div>
    </div>
    <nav id="dc-navdashboard" class="dc-navdashboard">
        <ul>
            <?php echo e(Helper::displayDashboardMenu('dashboard')); ?>

            <li>
                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('dashboard-logout-form').submit();">
                    <i class="lnr lnr-exit"></i><?php echo e(trans('lang.logout')); ?>

                </a>
                <form id="dashboard-logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo e(csrf_field()); ?>

                </form>
            </li>
        </ul>
    </nav>
    <div class="dc-navdashboard-footer">
        <span><a href="#"> <?php echo e(Helper::getFooterSettings('footer_copyright')); ?></a></span>
        <span class="version-area"><?php echo e(config('app.version')); ?></span>
    </div>
</div>
<?php /**PATH D:\xamp\htdocs\doctry\resources\views/back-end/includes/dashboard-menu.blade.php ENDPATH**/ ?>