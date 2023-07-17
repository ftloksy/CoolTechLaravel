<?php
use App\Http\Controllers\UserController;
?>

<!-- left hand sidebar, It is a dropdown menu -->
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

		<?php $__currentLoopData = UserController::get_tab_table(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<script>
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
	
	<?php if (isset($component)) { $__componentOriginal9de24b362187c5d6e90e68ee40e29f8928c0646e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BookMark::class, []); ?>
<?php $component->withName('book-mark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9de24b362187c5d6e90e68ee40e29f8928c0646e)): ?>
<?php $component = $__componentOriginal9de24b362187c5d6e90e68ee40e29f8928c0646e; ?>
<?php unset($__componentOriginal9de24b362187c5d6e90e68ee40e29f8928c0646e); ?>
<?php endif; ?>

</div>
<?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/components/menu.blade.php ENDPATH**/ ?>