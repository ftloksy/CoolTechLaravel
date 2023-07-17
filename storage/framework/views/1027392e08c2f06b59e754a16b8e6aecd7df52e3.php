<?php $__env->startSection('content'); ?>

<h2> <?php echo e(__('Dashboard')); ?> </h2>

<p>Admin Admin</p>
<p>Welcome <?php echo e($user); ?></p>
<p>You're logged in!</p>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/admin.blade.php ENDPATH**/ ?>