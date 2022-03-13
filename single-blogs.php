<?php get_header(); ?>
<div class="key_visual" id="key_visual">
  <div class="key_movi">
    <video autoplay loop muted  id="bgvid">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Japan-23525.webm" type="video/webm">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Japan-23525.webm" type="video/mp4">
    </video>

    <div id="taxonomy-text">ブログ</div>
    <div class="page-title">
      <h1 id="animation-text"><?php echo bloginfo('name');?></h1>
    </div>
  </div><!-- key_movi -->
</div><!-- key_visual -->
<div class="container"><!-- フッターまでつづく -->
  <?php if ( is_active_sidebar( 'main-content-top-widget-area' ) ) : ?>
    <section class="content-top-widget">
      <?php dynamic_sidebar( 'main-content-top-widget-area' ); ?>
    </section>
  <?php endif; ?>
  <main class="main">
    <?php
    if (have_posts()): while(have_posts()): the_post();
    get_template_part('/template-parts/loop', 'single_blogs');
    endwhile; endif;
    ?>
    <section class="related_key_word">
      <h1>関連ワードのお品書き</h1>
      <?php
      $taxonomy = 'oja_tags';
      $terms = wp_get_object_terms($post->ID,$taxonomy);
      if (!empty($terms) && !is_wp_error($terms)) :
      echo '<ul class="related_list">';
      foreach ($terms as $term ) {
      echo '<li><a href="'.get_term_link($term).'">'.$term->name.'</a></li>';
      }
      echo '</ul>';
      endif;
      ?>
    </section>

    <?php
    comments_template('/template-parts/comments.php');
    ?>
  </main>
<?php //endwhile; endif; ?>
  <aside class="aside">
    <?php
    get_sidebar();
    get_template_part('template-parts/sidebar/sidebar-blogs');
    get_template_part('template-parts/sidebar/sidebar-news');
    get_template_part('template-parts/sidebar/sidebar-form');
    get_template_part('template-parts/sidebar/sidebar-related');
    get_template_part('template-parts/sidebar/sidebar-blogs_category');
    get_template_part('template-parts/sidebar/sidebar-blogs_tags');
    ?>
  </aside>
<?php get_footer(); ?>
