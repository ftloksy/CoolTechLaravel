<?php
use App\Http\Controllers\UserController;
?>

<!-- 
dispaly single artcle 
In here, has two type:
    1> full : show full complete artcle.
        and categroy and tags about the artcle.
    2> short : show short artcle, just first paragraphs.
        and don't show artcle's categroy and tags.
-->
<div class="artcle">
    
    <?php if (isset($component)) { $__componentOriginal500d7d0223d1c33659ea2ad19eb4d0882d54a8be = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ArtcleHeader::class, ['artcle' => $artcle,'type' => $type]); ?>
<?php $component->withName('artcle-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal500d7d0223d1c33659ea2ad19eb4d0882d54a8be)): ?>
<?php $component = $__componentOriginal500d7d0223d1c33659ea2ad19eb4d0882d54a8be; ?>
<?php unset($__componentOriginal500d7d0223d1c33659ea2ad19eb4d0882d54a8be); ?>
<?php endif; ?>
    
    <div id="a<?php echo e($artcle->id); ?>" class="artcle_content"></div>
    <span><a class="menua" href="<?php echo e(url('/bookmark/'. $artcle->id )); ?>" >Bookmark this post.</a></span><br/>
    
    <?php switch($type):
        case ("full"): ?>
            <informationlink>
                <span>Category: </span>
                <!-- display the link, when user click the link then goto category page. -->
                <span><a class="menua" href="<?php echo e(url('/category/' . urlencode( $artcle->categories ) )); ?>"><?php echo e($artcle->categories); ?></a></span><br/>
                <span>Tag: </span>
                
                <!-- 
                show this page's all tags
                and display the link, when user click the link then goto tag page. 
                -->
                <?php $__currentLoopData = UserController::get_post_own_tag( $artcle->id ); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="tags" href="<?php echo e(url('/tag/' . $tag->tag_title )); ?>"><?php echo e($tag->tag_title); ?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </informationlink>
            <!-- 
                from database search the artcle's content. 
                the artcle's content is use markdown format.
            -->
            <script>
                <!-- complete display full artcle -->
                let content = <?php echo json_encode($artcle->content); ?>;
                let html = marked.parse(content);
                document.getElementById("a<?php echo e($artcle->id); ?>").innerHTML = html;
            </script>
            <?php break; ?>
        <?php case ("short"): ?>
            <script>
                <!-- Just display first paragraphs -->
               content = <?php echo json_encode($artcle->content); ?>;
               html = marked.parse(content);
               firstParagraph = html.split("</p>")[0];
               document.getElementById("a<?php echo e($artcle->id); ?>").innerHTML = firstParagraph + "</p>";
            </script>
    <?php endswitch; ?>
      
</div>
<?php /**PATH /var/www/html/php/L4T10/CapstoneProjectI/resources/views/components/artcle.blade.php ENDPATH**/ ?>