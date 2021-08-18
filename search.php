<?php get_header(); ?>

<div class="key_visual" id="key_visual">
<div id="taxonomy-text">サイト内検索ページ</div>
  <div class="welcome-text">
    <h1 id="animation-text">おジャコの目指せ出世魚！</h1>
  </div><!-- welcome-text -->

</div><!-- key_visual -->
<div class="inner"><!-- フッターまでつづく -->
<main class="main">
  <div class="active_head">
    <?php if (isset($_GET['s']) && empty($_GET['s'])) ://検索フォームgetの値が入力されているか確認?>
      <h3 class="text-frame"><?php echo esc_html('検索キーワードを入力してください');//キーワード未入力時のテキスト?></h3>
      <?php else: ?>
      <h3 class="text-frame">「<?php echo $_GET['s'].'」の<br>検索結果:'.$wp_query->found_posts.'件';?></h3>
      <?php endif; ?>
  </div>
    <!--  ループ開始  -->
    <section class="oja_cat">
    <?php if (have_posts()) :
      while (have_posts()) : the_post();
      get_template_part('template-parts/loop','post_cade');
      endwhile;
      else: ?>
      <p>検索されたキーワードに該当する記事はありませんでした。</p>
      <?php endif; ?>
      <!--  /ループ終わり -->
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
  <aside class="aside">
    <?php
    get_template_part('template-parts/sidebar/sidebar-blogs');
    get_template_part('template-parts/sidebar/sidebar-form');
    get_template_part('template-parts/sidebar/sidebar-blogs_category');
    get_template_part('template-parts/sidebar/sidebar-blogs_tags');
    ?>
  </aside>
<?php get_footer(); ?>
