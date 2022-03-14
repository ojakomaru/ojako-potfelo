<div class="post_cade">
  <a href="<?php the_permalink();?>">
    <div class="thumbnail">
      <?php if (has_post_thumbnail()): the_post_thumbnail('medium');
      else : ?>
      <img src="<?php echo get_stylesheet_directory_uri();?>/img/no-image.png" alt="画像はありません。">
      <?php endif; ?>
    </div><!-- thumbnail -->
    <div class="post_date">
      <h1><?php the_title(); ?></h1>
      <time><?php the_time("n月j日"); ?></time>
    </div><!--post_date-->
  </a>
</div><!--post_cade-->
