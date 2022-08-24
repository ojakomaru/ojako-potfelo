<?php
/*
Template Name: 制作実績カテゴリーページ
*/
?>
<?php get_header(); ?>
<?php
$slug            = get_queried_object()->taxonomy;
$product_slug    = get_query_var($slug);
$production      = get_term_by('slug',$product_slug,$slug);
$taxonomy_var    = get_taxonomy($slug);
?>

<section class="key_visual" id="key_visual">
  <div class="key_movi">
    <video autoplay loop muted  id="bgvid">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Japan-23525.webm" type="video/webm">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Japan-23525.webm" type="video/mp4">
    </video>
    <div id="taxonomy-text"><?php echo $taxonomy_var->label; ?></div>
    <div class="page-title">
      <h1 id="animation-text">WEB TYPE</h1>
    </div><!-- welcome-text -->

  </div><!-- key_movi -->
</section><!--key_visual-->

<div class="container <?php echo layout_classname($slug); ?>"><!-- フッターまでつづく -->
  <main class="main">
    <div class="active_head">
      <h2 class="text-frame">「<?php echo $production->name; ?>」の一覧</h2>
    </div>

    <article id="content">
    <!--  ループ開始  -->
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
      <div class="item_detail">
        <a href="<?php the_permalink(); ?>" class="item_page">
        <?php get_template_part('template-parts/loop','production'); ?>
        </a>
      </div><!-- item_detail -->
      <?php wp_link_pages(); endwhile; endif; ?>
    <!--  /ループ終わり -->
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
  if (layout_classname($slug) !== 'column1_noside'):
  ?>
    <aside class="aside">
      <?php
      get_sidebar();
      get_template_part('template-parts/sidebar/sidebar-news');
      get_template_part('template-parts/sidebar/sidebar-form');
      ?>
    </aside>
  <?php endif;?>

<?php get_footer() ;?>