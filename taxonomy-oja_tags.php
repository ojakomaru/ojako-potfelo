
<?php get_header(); ?>
<?php
  $slug         = get_queried_object()->taxonomy;
  $oja_slug     = get_query_var($slug);
  $oja_tag      = get_term_by('slug',$oja_slug,$slug);
  $taxonomy_var = get_taxonomy($slug);
?>
<div class="key_visual" id="key_visual">
  <div id="taxonomy-text"><?php echo $taxonomy_var->label; ?></div>
  <div class="welcome-text">
    <h1 id="animation-text">おジャコの目指せ出世魚！</h1>
  </div>
</div><!-- key_visual -->

<div class="inner <?php echo layout_classname($slug); ?>"><!-- フッターまでつづく -->
  <div class="main">
    <div class="active_head">
      <h3 class="text-frame">「<?php echo $oja_tag->name; ?>」の記事</span></h3>
    </div>

    <!--  ループ開始  -->
    <section class="oja_cat">
    <?php if (have_posts()) : while (have_posts()) : the_post();
      get_template_part('template-parts/loop','post_cade');
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

  </div><!--main-->

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
  <?php endif; ?>

<?php get_footer() ;?>