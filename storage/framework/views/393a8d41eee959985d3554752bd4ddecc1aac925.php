<?php $__env->startSection('content'); ?>
  <?php if(isset( $request_error )): ?>
  <h2 style="color:red;"><?php echo e($request_error); ?></h2>
  <?php endif; ?>
  <!-- show artcles page, every page show five posts -->
  <h1><?php echo e($pagetitle); ?></h1> 
  <?php if (isset($component)) { $__componentOriginal67f284f44f5c0a4fa6237d0f5b69d23fa97d4734 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Artcles::class, ['artcles' => $artcles]); ?>
<?php $component->withName('artcles'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal67f284f44f5c0a4fa6237d0f5b69d23fa97d4734)): ?>
<?php $component = $__componentOriginal67f284f44f5c0a4fa6237d0f5b69d23fa97d4734; ?>
<?php unset($__componentOriginal67f284f44f5c0a4fa6237d0f5b69d23fa97d4734); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/artcles.blade.php ENDPATH**/ ?>