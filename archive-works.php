<?php
/*
Template Name: 制作実績一覧ページ
*/
?>
<?php get_header(); ?>
<section class="key_visual" id="key_visual">
  <div class="key_movi">
    <video autoplay loop muted  id="bgvid">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Japan-23525.webm" type="video/webm">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Japan-23525.webm" type="video/mp4">
    </video>

    <div id="taxonomy-text">成果物編</div>
    <div class="welcome-text">
      <h1 id="animation-text">納品事例</h1>
    </div><!-- welcome-text -->

  </div><!-- key_movi -->
</section><!--key_visual-->

<div class="inner <?php echo layout_classname('works'); ?>"><!-- フッターまでつづく -->
  <main class="main">
    <div class="active_head">
        <h3 class="text-frame">制作実績の一覧</h3>
    </div>
    <div class="product_search">
      <h2 class="product_text">おジャコが創りました</h2>
      <?php
      $productions = get_terms('production',array(
        'hide_empty' => false,
        'orderby'    => 'slug'
      ));
      echo '<ul class="production_kind">';
      echo '<li class="sequential"><span>すべて</span></li>';
      foreach ($productions as $production) {
        echo '<li class="sequential"><span>'.$production->name.'</span></li>';
      }
      echo '</ul>';
      ?>
    </div>
    <!--  ループ開始  -->
    <article id="content">
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <div class="item_detail check">
        <a href="<?php the_permalink(); ?>" class="item_page">
        <?php get_template_part('template-parts/loop','production'); ?>
        </a><!-- item_page -->
      </div><!-- item_detail -->
        <?php endwhile; endif; ?><!--  /ループ終わり -->
    </article><!--#content-->
    <div class="page_naite">
      <?php
        if ( function_exists( 'pagination' ) ) :
        $args = array(
          'prev_next' => false,
        );
          pagination( $args );
        endif;
        ?>
    </div>
  </main><!--main-->

  <?php
  if (layout_classname('works') !== 'column1_noside'):
  ?>
  <aside class="aside">
    <?php
    get_sidebar();
    get_template_part('template-parts/sidebar/sidebar-news');
    get_template_part('template-parts/sidebar/sidebar-form');
    ?>
  </aside>
  <?php endif; ?>

<?php get_footer() ;?>