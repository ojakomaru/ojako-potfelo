<section <?php post_class("blog_article"); ?>>
  <div class="post_date">
    <time datetime="<?php the_time('Y/m/d');?>">
      <i class="fa fa-calendar"></i>
      公開日:<?php the_time('Y/m/d');?><br>
    </time>
    <?php if(get_the_time('Y/m/d') < get_the_modified_date('Y/m/d')):?>
    <time datetime="<?php the_modified_date('Y/m/d'); ?>">
      <i class="fa fa-redo"></i>
      最終更新日:<?php the_modified_date('Y/m/d') ?>
    </time>
    <?php endif;?>
  </div>
  <h1 class="text-frame"><?php the_title(); ?></h1>
  <div class="blog_content">
    <?php the_content(); ?>
  </div>
</section>