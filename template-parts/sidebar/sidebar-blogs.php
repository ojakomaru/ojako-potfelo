
<section class="blogmenu">
    <h2 id="new_blog">新着BLOG</h2>
    <?php
    $args = [
      'post_type'      => 'blogs',
      'posts_per_page' => 5,
      'order'          => 'DESC',
      'orderby'        => 'modified name',
    ];
    if( is_singular('blogs')) {
      $args = [
        'post_type'      => 'blogs',
        'posts_per_page' => 3,
        'order'          => 'DESC',
        'orderby'        => 'modified name',
      ];
    }
    $the_query = new WP_Query($args);
    if($the_query->have_posts()):
      while($the_query->have_posts()):
      $the_query->the_post();
      ?>
    <a href="<?php the_permalink();?>" class="post_link">
    <div class="post_box">
      <div class="thumbnail">
        <?php if(has_post_thumbnail())://サムネイルの有無の分岐
        the_post_thumbnail();
        else: //サムネイルがない時?>
        <img src="<?php echo get_stylesheet_directory_uri();?>/img/no-image.png" alt="アイキャッチ画像がない時の代替画像です">
        <?php endif;
        if ($terms = get_the_terms($post->ID,'oja_cat')) {
          echo ('<span>');
          echo esc_html($terms[0]->name);
          echo ('</span>');
      }?>
      </div><!--thumbnail-->
      <div class="post_title">
        <?php the_title(); ?>
      </div>
    </div><!--post_box-->
    </a>
    <?php endwhile;
    wp_reset_postdata(); else: ?>
    <p class="not_found_text">おジャコがサボっているため投稿がまだありません。</p>
    <?php endif; ?>
  </section>
