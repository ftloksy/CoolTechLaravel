<!doctype html>
<!-- pages's main theme -->
<html lang="en" class="">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
        <script src="/js/app.js"></script>
        <link ref="stylesheet" href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        <?php if (isset($component)) { $__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Header::class, []); ?>
<?php $component->withName('header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3)): ?>
<?php $component = $__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3; ?>
<?php unset($__componentOriginal99db13291ff287454d08b974e14dad64f9e2c6f3); ?>
<?php endif; ?>
        <div id="page">
            <div id="sidebar">
                <!-- sidebar menu -->
                <?php if (isset($component)) { $__componentOriginald0b4154eafa6ddf1d90e70a636ac005452fbb4c9 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Menu::class, []); ?>
<?php $component->withName('menu'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0b4154eafa6ddf1d90e70a636ac005452fbb4c9)): ?>
<?php $component = $__componentOriginald0b4154eafa6ddf1d90e70a636ac005452fbb4c9; ?>
<?php unset($__componentOriginald0b4154eafa6ddf1d90e70a636ac005452fbb4c9); ?>
<?php endif; ?>
            </div>
            <div id="content">
                <!-- page's content -->
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Footer::class, []); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf)): ?>
<?php $component = $__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf; ?>
<?php unset($__componentOriginal88b1957f21f7f49b400717e8d0a27189798132bf); ?>
<?php endif; ?>
    </body>
</html>
<?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/app.blade.php ENDPATH**/ ?>