<!-- display some (five) artcle in a page -->
<?php $__currentLoopData = $artcles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artcle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if (isset($component)) { $__componentOriginal50c453f9993b58005022d43ec19e4eefd78f7b69 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Artcle::class, ['artcle' => $artcle,'type' => 'short']); ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/components/artcles.blade.php ENDPATH**/ ?>