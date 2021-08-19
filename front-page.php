<?php get_header() ;?><!-- headerを読み込むコード -->

<section class="key_visual" id="key_visual">
  <div class="key_movi">
    <video autoplay loop muted  id="bgvid">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/doukutu.webm" type="video/webm">
    </video>

    <div id="welcome-text">ようこそ!</div>
    <div class="welcome-text">
      <h1 id="animation-text">おジャコのPortfolio<br>サイトへ</h1>
    </div><!-- welcome-text -->
  </div><!-- key_movi -->
</section><!-- key_visual -->

<div class="inner <?php echo layout_classname('home'); ?>"><!-- フッターまでつづく -->
  <main class="main">
    <div class="banner_slidecontents">
      <?php //バナー画像コンテンツ
      foreach ( range( 1, 3 ) as $index ):
        $id = 'banner_' . $index; ?>
        <div  id="<?php echo esc_attr( $id ); ?>">
          <?php banner_render( $id ); ?>
        </div>
        <?php endforeach; ?>
    </div>

  <?php if ( is_active_sidebar( 'main-content-top-widget-area' ) ) : ?>
    <?php dynamic_sidebar( 'main-content-top-widget-area' ); ?>
  <?php endif; ?>

    <div class="active_head">
      <h2 class="text-frame">はじめのご挨拶</h2>
    </div>

    <h3 class="active_greeting" id="greeting">
      <strong id="greeting_text_customizer" class="greeting_text">
        <?php
        $greeting_text = get_theme_mod('greeting_text');
        if (!empty($greeting_text)) {
          echo esc_html($greeting_text);
        }
        ?>
      </strong>
    </h3>
    <div class="greeting_img">
      <div class="scroll_text">
        <p id="greeting_textarea_customizer" class="greeting_textarea">
          <?php
          $greeting_textarea = get_theme_mod("greeting_textarea");
          if (!empty($greeting_text)) {
            echo nl2br(esc_html($greeting_textarea));
          }
          ?>
        </p>
      </div>
    </div>

    <div class="active_head">
      <h2 class="text-frame">制作へのこころがけ</h2>
    </div>

    <div class="acco_tav">
      <h4 id="belief_title_1_customizer">
        <?php
        $belief_title_1 = get_theme_mod('belief_title_1');
        if (!empty($belief_title_1)) {
          echo esc_html($belief_title_1);
        }
        ?>
      </h4>
      <div class="inside_text">
        <p id="belief_text_1_customizer">
          <?php
          $belief_text_1 = get_theme_mod('belief_text_1');
          if (!empty($belief_text_1)) {
            echo nl2br(esc_html($belief_text_1));
          }
          ?>
        </p>
      </div>
    </div><!-- acco_tav -->

    <div class="acco_tav">
      <h4 id="belief_title_2_customizer">
        <?php
        $belief_title_2 = get_theme_mod('belief_title_2');
        if (!empty($belief_title_2)) {
          echo esc_html($belief_title_2);
        }
        ?>
      </h4>
      <div class="inside_text">
        <p id="belief_text_2_customizer">
          <?php
          $belief_text_2 = get_theme_mod('belief_text_2');
          if (!empty($belief_text_2)) {
            echo nl2br(esc_html($belief_text_2));
          }
          ?>
        </p>
      </div><!-- /inside_text -->
    </div><!-- /acco_tav -->

    <!-- WORKS記事のループここから -->
    <div class="active_head" id="production">
      <h2 class="text-frame">制作実績のご紹介</h2>
    </div>

    <section class="production">
      <?php
      $args = array(
        'post_type'=>'works',//投稿スラッグ
        'posts_per_page'=> 4,//4記事分を表示
        'orderby'=>'rand'//ランダム
      );
      $the_query = new WP_Query($args);
      if($the_query->have_posts()):
      while($the_query->have_posts()):$the_query->the_post();
      get_template_part('template-parts/loop','home_production');
      endwhile;
      wp_reset_postdata();
      else:
      endif;
      ?>
    </section><!-- production -->
    <!-- WORKS記事のループここまで -->
    <div class="btn"><a href="<?php echo get_post_type_archive_link('works'); ?>">実績の一覧は<br>こちらから</a></div>
  </main><!--main-->

  <?php
  if (layout_classname('home') !== 'column1_noside'):
  ?>
    <aside class="aside">
    <?php
    get_sidebar();
    get_template_part('template-parts/sidebar/sidebar-news');
    get_template_part('template-parts/sidebar/sidebar-form');
    get_template_part('template-parts/sidebar/sidebar-blogs');
    get_template_part('template-parts/sidebar/sidebar-blogs_category');
    get_template_part('template-parts/sidebar/sidebar-blogs_tags');
    ?>
    </aside>
  <?php endif;?>

<?php get_footer() ;?>