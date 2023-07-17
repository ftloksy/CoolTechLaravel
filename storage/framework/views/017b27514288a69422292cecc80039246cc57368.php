<?php $__env->startSection('content'); ?>
<!-- show single full artcle's page -->
<h3><?php echo e($bookmarkmsg); ?></h3>
<?php if (isset($component)) { $__componentOriginal50c453f9993b58005022d43ec19e4eefd78f7b69 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Artcle::class, ['artcle' => $artcle,'type' => 'full']); ?>
<?php $component->withName('artcle'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal50c453f9993b58005022d43ec19e4eefd78f7b69)): ?>
<?php $component = $__componentOriginal50c453f9993b58005022d43ec19e4eefd78f7b69; ?>
<?php unset($__componentOriginal50c453f9993b58005022d43ec19e4eefd78f7b69); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/artcle.blade.php ENDPATH**/ ?>