<?php $__env->startSection('content'); ?>
<!-- search page -->
<h1>Search</h1>

<h3 style="color:red;"><?php echo e($error); ?></h3>
<!-- search form -->
<form action="/gotopage" method="POST">
  <?php echo e(csrf_field()); ?>

  <label>Post ID:</label>
  <input type="number" name="postid" />
  <button type="submit" name="submitid" value="1" >Search by Id</button><br/>
  <label>Title (like) :</label>
  <input type="text" name="posttitle"/>
  <button type="submit" name="submittitle" value="1" >Search by Title</button><br/>
  <label>Tag (like) :</label>
  <input type="text" name="posttag"/>
  <button type="submit" name="submittag" value="1" >Search by Tag</button><br/>
</form>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/search.blade.php ENDPATH**/ ?>