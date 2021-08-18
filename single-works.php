<?php get_header(); ?>
<section class="key_visual" id="key_visual">
    <div class="key_movi">
    <video autoplay loop muted  id="bgvid">
        <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/vllo-2.webm" type="video/webm">
        <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/vllo-2.webm" type="video/mp4">
    </video>
    <?php if (have_posts()): while(have_posts()): the_post();?>
    <div id="taxonomy-text">実務編</div>
    <div class="welcome-text">
      <h1 id="animation-text">完成事例</h1>
    </div><!-- welcome-text -->
  </div><!-- key_movi -->
</section><!--key_visual-->

<div class="inner"><!-- フッターまでつづく -->
  <main class="main">
    <div class="active_head">
        <h3 class="text-frame"><?php the_title(); ?></h3>
    </div>

    <!--  ループ開始  -->
    <article id="content">
        <div class="item_detail">
            <?php get_template_part('template-parts/loop','production'); ?>
        </div><!-- item_detail -->
        <?php endwhile; endif; ?><!--  /ループ終わり -->
    </article><!--#content-->
  </main><!--main-->

<?php get_footer() ;?>