<?php $post_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
<div class="p-item">
    <a href="<?php the_permalink();?>" class="p-item__img" style="background:url('<?php echo $post_img_url;?>') no-repeat center;">
    <img src="<?php echo $post_img_url;?>" alt="<?php the_title();?>" class="d-none";>
    </a>													
    <div class="p-item__content">
        <p class="p-item__name">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
        </p>
        <div class="desc">
            <?php echo excerpt(20); ?>
        </div>															
    </div>
</div> 