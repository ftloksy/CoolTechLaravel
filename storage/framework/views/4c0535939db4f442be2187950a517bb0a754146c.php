<div id="menu">
	<?php if(  Auth::check() ): ?>
		<div class="menutitle"><?php echo e(Auth::user()->name); ?></div>
		<div class="menucontent">
			<div>
				<span><a class="menua" href=<?php echo e(url('/logout')); ?>>Logout</a></span>
			</div>
		</div>
	<?php else: ?>
		<div class="menutitle">User Account</div>
			<div class="menucontent">
				<div>
					<span><a class="menua" href=<?php echo e(url('/register')); ?>>Register</a></span>
				</div>
			<div>
				<span><a class="menua" href=<?php echo e(url('/login')); ?>>Login</a></span>
			</div>
		</div>
	<?php endif; ?>

	<div class="menutitle">Category</div>
	<div class="menucontent">
		<div>
			<span><a class="menua" href=<?php echo e(url('/category/all-artcle')); ?>>All artcle</a></span>
		</div>
		<div>
			<span><a class="menua" href=<?php echo e(url('/category/tech-news')); ?>>Tech new</a></span>
		</div>
		<div>
			<span><a class="menua" href=<?php echo e(url('/category/software-reviews')); ?>>Software reviews</a></span>
		</div>
		<div>
			<span><a class="menua" href=<?php echo e(url('/category/hardware-reviews')); ?>>Hardware reviews</a></span>
		</div>
		<div>
			<span><a class="menua" href=<?php echo e(url('/category/opinion-pieces')); ?>>Opinion pieces</a></span>
		</div>
	</div>


	<div class="menutitle">Tag</div>
	<div class="menucontent">
		<?php
			$alltags = DB::table('blog_tags')
        ->join('post_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
				->selectRaw('count(tag_title) as countArtcle, tag_title')
				->groupBy('tag_title')
        ->get();
		?> 
		<?php $__currentLoopData = $alltags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<script>
				console.log( <?php echo json_encode($tag); ?> );
			</script>
			<div>
				<span>
					<a class="menua" href="<?php echo e(url('/tag/' . $tag->tag_title )); ?>">
						<?php echo e($tag->tag_title); ?>

					</a>
				</span><span> ( <?php echo e($tag->countArtcle); ?> )</span>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

</div>



<?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/menu.blade.php ENDPATH**/ ?>