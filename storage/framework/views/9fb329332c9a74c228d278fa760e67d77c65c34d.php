<?php $__env->startSection('content'); ?>
<!-- url('/') page -->
<h1>Recent Posts</h1>
<p>Here are some of our recent posts:</p>

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

<!-- home page some content is about this website -->
<!-- the content is use markdown format -->
<div id="homecontent"></div>

<script>
 let homepageheader = `

# Cool Tech Blog

Get the latest tech news, reviews, and opinion pieces 
at Cool Tech Blog. We cover everything from software 
and hardware reviews to the latest tech trends

## Categories

Our blog has four main categories:

- ***Tech News:*** Stay up to date with the latest happenings in the tech industry.
- ***Software Reviews:*** In-depth reviews of the latest software releases.
- ***Hardware Reviews:*** Detailed analysis of the latest devices on the market.
- ***Opinion Pieces:*** Thought-provoking articles on the biggest issues in the tech industry.
`
  let html = marked.parse(homepageheader);
  document.getElementById("homecontent").innerHTML = html;
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/home.blade.php ENDPATH**/ ?>