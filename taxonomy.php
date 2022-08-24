<?php get_header(); ?>
<?php
$slug         = get_queried_object()->taxonomy;
$taxonomy_var = get_taxonomy($slug);
$oja_slug     = get_query_var($slug);
$oja_tax      = get_term_by('slug',$oja_slug,$slug);
?>
<div class="key_visual" id="key_visual">
  <div id="taxonomy-text"><?php echo $taxonomy_var->label; ?></div>
  <div class="page-title">
    <h1 id="animation-text"><?php echo bloginfo('name');?></h1>
  </div>
</div><!-- key_visual -->

<div class="container <?php echo layout_classname($slug); ?>"><!-- フッターまでつづく -->
  <main class="main">
    <div class="active_head">
      <h2 class="text-frame">「<?php echo $oja_tax->name; ?>」の記事</h2>
    </div>

    <!--  ループ開始  -->
    <section class="oja_cat">
    <?php if (have_posts()) : while (have_posts()) : the_post();
      get_template_part('template-parts/loop','post_cade');
      wp_link_pages();
      endwhile; endif; ?><!--  /ループ終わり -->
    </section>
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
    get_template_part('template-parts/sidebar/sidebar-blogs');
    get_template_part('template-parts/sidebar/sidebar-form');
    get_template_part('template-parts/sidebar/sidebar-blogs_category');
    get_template_part('template-parts/sidebar/sidebar-blogs_tags');
    ?>
  </aside>
  <?php endif;?>

<?php get_footer() ;?>