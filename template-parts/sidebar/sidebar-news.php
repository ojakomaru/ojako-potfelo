
<section class="submenu">
  <h2>お知らせ</h2>
  <?php if(is_active_sidebar('news-side-widget-area')): ?>
		<?php dynamic_sidebar('news-side-widget-area'); ?>
  <?php endif; ?>
  <!-- ニュース投稿ループここから -->
    <?php
    $args = [
      'post_type'      => 'post',
      'posts_per_page' => '3',
      'order'          => 'DESC',
    ];
    $the_query = new WP_Query($args);
    if($the_query->have_posts()):
    while($the_query->have_posts()):
    $the_query->the_post();
    ?>
    <div class="news">
      <dl>
        <dt><time><?php echo get_the_date('Y.m.d') ;?></time></dt>
        <dd><?php the_title() ;?></dd>
      </dl>
    </div><!-- news -->
  <?php endwhile; endif;
  wp_reset_postdata(); ?>
  <!-- ニュース投稿ループここまで -->
</section><!-- submenu -->
