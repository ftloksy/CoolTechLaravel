<?php $__env->startSection('content'); ?>

<h1>Welcome <?php echo e(Auth::user()->name); ?></h1>
<p>You're logged in!</p>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/dashboard.blade.php ENDPATH**/ ?>