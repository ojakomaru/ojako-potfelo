<div class="item_detail">
  <a href="<?php the_permalink(); ?>" class="item_page">
    <div class="main_item_img">
      <?php if (has_post_thumbnail()):
        the_post_thumbnail('medium');
        else: ?>
      <img src="<?php echo get_stylesheet_directory_uri();?>/img/no-image.png" alt="アイキャッチ画像がない時の代替画像です">
      <?php endif; ?>
    </div><!-- main_item_img -->
    <div class="main_item_text">
      <h1><?php the_title(); ?></h1>
      <h3 class="subtitle"><?php the_excerpt();?></h3>
    </div>
  </a><!-- item_page -->
</div><!-- item_detail -->

