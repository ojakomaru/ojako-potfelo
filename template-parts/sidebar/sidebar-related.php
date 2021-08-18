
<section class="blogmenu">
  <h2 id="new_blog">関連記事</h2>
  <?php
  $post_type = $post->post_type;
  $taxonomies = get_object_taxonomies( $post_type, 'objects' );
  foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
    $kinds = wp_get_object_terms($post->ID, $taxonomy->name);
    $kind_slug = array();
    foreach( $kinds as $kind ){
      array_push( $kind_slug, $kind->slug );
    }
    $args = array(
      'post_type'      => 'blogs',
      'posts_per_page' => 5,
      'post__not_in'   => array($post->ID),
      'order'          => 'DESC',
      'orderby'        => 'modified name',
      'tax_query'      => array(
        'relation' => 'AND',
        array(
          'taxonomy' => 'oja_cat',
          'field'    => 'slug',
          'terms'    => $kind_slug,
          'operator' => 'IN'
        ),
        array(
          'taxonomy' => 'oja_tags',
          'field'    => 'slug',
          'terms'    => $kind_slug,
          'operator' => 'IN'
        )
      )
    );
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
      if ($kinds = get_the_terms($post->ID,'oja_cat')) {
        echo ('<span>');
        echo esc_html($kinds[0]->name);
        echo ('</span>');
    }?>
    </div><!--thumbnail-->
    <div class="post_title">
      <?php the_title();
      ?>
    </div>
  </div><!--post_box-->
  </a>
  <?php endwhile;
  wp_reset_postdata(); else: ?>
  <p class="not_found_text">関連性のある記事はありませんでした。</p>
  <?php endif; ?>
</section>
