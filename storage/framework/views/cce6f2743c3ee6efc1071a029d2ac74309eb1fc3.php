<?php
  use App\Http\Controllers\UserController;
?>
<?php $__currentLoopData = $artcles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $artcle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <h2><a class="menua" href="<?php echo e(url('/artcle/'. $artcle->id )); ?>"><?php echo e($artcle->title); ?></a></h2>
  <span class="artclecreater"><?php echo e($artcle->creater); ?></span>
  <span class="artclecreated"><?php echo e($artcle->created); ?></span>
  <div id="a<?php echo e($artcle->id); ?>"></div>
  <span><a class="menua" href="<?php echo e(url('/bookmark/'. $artcle->id )); ?>" >Bookmark and visit this post.</a></span><br/>
  <script>
   content = <?php echo json_encode($artcle->content); ?>;
   html = marked.parse(content);
   firstParagraph = html.split("</p>")[0];
   console.log(firstParagraph + "</p>");
   document.getElementById("a<?php echo e($artcle->id); ?>").innerHTML = firstParagraph;
  </script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/layouts/webpage/artcles.blade.php ENDPATH**/ ?>