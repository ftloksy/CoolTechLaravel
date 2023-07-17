<!-- 
Every artcle's header.
dispaly header 
In here, has two type:
    1> full : when show full complete artcle.
      the title isn't a link.
    2> short : when show short artcle, 
      the title is a link when user click the link,
      will goto the single artcle page. url('/artcle' .$id )
-->
<div class="artcleheader">
  <?php switch($type):
    case ("full"): ?>
      <h1><?php echo e($artcle->title); ?></h1>
      <?php break; ?>
    <?php case ("short"): ?>
      <h3><a class="menua" href="<?php echo e(url('/artcle/'. $artcle->id )); ?>"><?php echo e($artcle->title); ?></a></h2>
  <?php endswitch; ?>
  <span class="artclecreater"><?php echo e($artcle->creater); ?></span>
  <span class="artclecreated"><?php echo e($artcle->created); ?></span>
</div>
<?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/components/artcle-header.blade.php ENDPATH**/ ?>