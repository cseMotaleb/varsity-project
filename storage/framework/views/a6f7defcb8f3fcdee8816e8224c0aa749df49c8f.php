<div class="dc-shareprofile">
    <ul class="dc-simplesocialicons dc-socialiconsborder">
        <li class="dc-sharecontent"><span><?php echo e(trans('lang.share_profile')); ?></span></li>
        <li class="dc-facebook">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(Request::fullUrl())); ?>" class="social-share">
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>
        <li class="dc-twitter">
            <a href="https://twitter.com/intent/tweet?url=<?php echo e(urlencode(Request::fullUrl())); ?>" class="social-share">
                <i class="fab fa-twitter"></i>
            </a>
        </li>
        <li class="dc-linkedin">
            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(urlencode(Request::fullUrl())); ?>" class="social-share">
                <i class="fab fa-linkedin-in"></i></a>
        </li>
        <li class="dc-googleplus">
            <a href="https://plus.google.com/share?url=<?php echo e(urlencode(Request::fullUrl())); ?>" class="social-share"><i class="fab fa-google-plus-g"></i></a>
        </li>
    </ul>
</div>
<?php $__env->startPush('scripts'); ?>
    <script>
        var popupMeta = {
        width: 400,
        height: 400
    }
    jQuery(document).on('click', '.social-share', function(event){
        event.preventDefault();

        var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
            hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

        var url = $(this).attr('href');
        var popup = window.open(url, 'Social Share',
            'width='+popupMeta.width+',height='+popupMeta.height+
            ',left='+vPosition+',top='+hPosition+
            ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

        if (popup) {
            popup.focus();
            return false;
        }
    });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\xamp\htdocs\doctry\resources\views/front-end/doctors/profile-details/share-profile/index.blade.php ENDPATH**/ ?>