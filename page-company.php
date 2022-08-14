<?php
/*
Template Name: 製作者紹介ページ
*/
?>
<?php get_header() ;?>
<?php $page = get_post(); ?>

<section class="key_visual" id="key_visual">
  <div class="key_movi">
    <video autoplay loop muted  id="bgvid">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/production-ID_4146415.webm" type="video/webm">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/production-ID_4146415.webm" type="video/mp4">
    </video>

    <div class="page-title">
      <h1 id="animation-text"><?php echo $page->post_title;?></h1>
    </div>
    <div id="taxonomy-text">製作者の紹介</div>

  </div><!-- key_movi -->
</section><!--key_visual-->

<div class="container <?php echo layout_classname($page->post_name); ?>"><!-- フッターまでつづく -->
  <?php if ( is_active_sidebar( 'main-content-top-widget-area' ) ) : ?>
    <section class="content-top-widget">
      <?php dynamic_sidebar( 'main-content-top-widget-area' ); ?>
    </section>
  <?php endif; ?>
  <main class="main">
    <div class="active_head" id="profile">
      <h2 class="text-frame">製作者の自己紹介</h2>
    </div>

    <?php
    $creator_name    = get_theme_mod('creator_name');
    $oja_birth_place = get_theme_mod('oja_birth_place');
    $creator_email   = get_theme_mod("creator_email");
    $about_summary   = get_theme_mod("about_summary");
    $ojako_business  = get_theme_mod("ojako_business");
    if (!empty($creator_name)) :
    ?>
    <section class="introduction">
      <div class="profile">
        <h1 id="creator_name_customizer" class="sequential">
          <?php echo esc_html($creator_name); ?>
        </h1>
        <dl>
          <dt class="sequential">生年月日</dt>
          <dd class="sequential">10月12日</dd>
          <dt class="sequential">血液型</dt>
          <dd class="sequential">A型</dd>
          <dt class="sequential">出身地</dt>
          <dd id="oja_birth_place_customizer" class="sequential">
            <?php echo esc_html($oja_birth_place); ?>
          </dd>
          <dt class="sequential">メールアドレス</dt>
          <dd id="creator_email_customizer" class="sequential">
            <?php echo esc_html($creator_email); ?>
          </dd>
        </dl>
      </div><!--profile-->
      <p id="about_summary_customizer" >
        <strong id="ojako_business_customizer" >
          <?php echo nl2br(esc_html($ojako_business)); ?>
        </strong>
        <br>
        <?php echo nl2br(esc_html($about_summary)); ?>
      </p>
    </section><!-- introduction -->
    <?php endif; //if(!empty($creator_name))?>

    <section class="skill_graph" id="skill_graph">
      <div class="kakko_wrap">
        <h1 id="skill_map_title_customizer" class="kakko_text">
          <?php
          $skill_map_title = get_theme_mod('skill_map_title');
          if(!empty($skill_map_title))
          { echo esc_html($skill_map_title); } ?>
        </h1>
      </div>
      <div class="bar html_bar">HTML</div>
      <div class="bar css_bar">CSS</div>
      <div class="bar js_bar">javascript</div>
      <div class="bar wordpress_bar">WordPress</div>
      <div class="bar php_bar">PHP</div>
      <div class="bar scss_bar">SCSS/SASS</div>
    </section>
    <?php
    $html_record        = get_theme_mod("html_record");
    $css_record         = get_theme_mod("css_record");
    $javascript_record  = get_theme_mod("javascript_record");
    $wordpress_record   = get_theme_mod("wordpress_record");
    $php_record         = get_theme_mod("php_record");
    $frame_work_record  = get_theme_mod("frame_work_record");
    ?>
    <div class="active_head" id="history">
      <h2 class="text-frame c_head">WEB制作における<br>学習遍歴</h2>
    </div>
    <div class="acco_tav html">
      <h4 class="bd-head"><span>HTML</span></h4>
      <div class="inside_text">
        <p id="html_record_customizer">
         <?php echo nl2br(esc_html($html_record)); ?>
        </p>
      </div><!-- inside_text -->
    </div><!-- acco_tav -->
    <div class="acco_tav css">
      <h4 class="bd-head"><span>CSS</span></h4>
      <div class="inside_text">
        <p id="css_record_customizer" >
          <?php echo nl2br(esc_html($css_record)); ?>
        </p>
      </div><!-- inside_text -->
    </div><!-- acco_tav -->
    <div class="acco_tav js">
      <h4 class="bd-head"><span>Javascirpt</span></h4>
      <div class="inside_text">
        <p id="javascript_record_customizer" >
          <?php echo nl2br(esc_html($javascript_record)); ?>
        </p>
      </div><!-- inside_text -->
    </div><!-- acco_tav -->
    <div class="acco_tav wordpress">
      <h4 class="bd-head"><span>WordPress</span></h4>
      <div class="inside_text">
        <p id="wordpress_record_customizer" >
          <?php echo nl2br(esc_html($wordpress_record)); ?>
        </p>
      </div><!-- inside_text -->
    </div><!-- acco_tav -->
    <div class="acco_tav php">
      <h4 class="bd-head"><span>PHP</span></h4>
      <div class="inside_text">
        <p id="php_record_customizer" >
          <?php echo nl2br(esc_html($php_record)); ?>
        </p>
      </div><!-- inside_text -->
    </div><!-- acco_tav -->

    <div class="acco_tav scss">
      <h4 class="bd-head"><span>Bootstrap & SCSSなどのフレームワークについて</span></h4>
      <div class="inside_text">
        <p id="frame_work_record_customizer" >
          <?php echo nl2br(esc_html($frame_work_record)); ?>
        </p>
      </div><!-- inside_text -->
    </div><!-- acco_tav -->

    <div class="active_head" id="wp_recommend">
      <h2 class="text-frame c_head">WordPress<br>カスタマイズ承ります</h2>
    </div>
    <h3 class="active_greeting diceheading">
      そもそもWordPress（ワードプレス）とは？
    </h3>
    <p>
      WordPress（ワードプレス）とは、オープンソース（誰でも利用可能）のCMS（コンテンツ管理システム）で、<br>主にブログ投稿管理、及びサイト運営に優れた無料のソフトウェアです。
    </p>
    <p>
      Web関連技術が無い人でもサイト管理や記事投稿ができるため、世界中のサイトのおよそ4分の1はWordPressで構築されていると言われています。
    </p>

    <h3 class="active_greeting diceheading">
      WordPressで出来ること、メリット
    </h3>
    <section class="wp_exp">
      <ul class="wp_tabs">
        <li><a href="" class="active">メリット1</a></li>
        <li><a href="">メリット2</a></li>
        <li><a href="">メリット3</a></li>
        <li><a href="">メリット4</a></li>
      </ul>
      <ul class="wp_contents">
        <li class="merit active">
          <h5>更新が簡単</h5>
          <p>HTMLやCSS（プログラミング）の知識が無くてもホームページの内容の更新や記事の投稿の管理ができるように、管理画面のブラウザから利用できます。<br>前述のマークアップ言語やプログラミング言語の知識がなくても、EXCELやWordやPowerPointなど使用したことがあるユーザーであればたやすく使用できてしまいます。</p>
        </li>

        <li class="merit">
          <h5>画像、投稿の管理削除も容易</h5>
          <p>記事内やメインページの画像を挿入する場合も管理画面で全て完結することができます。<br>
          サーバーに直接ログインして画像をアップロードする必要はなく、管理画面上で画像をドラッグアンドドロップするだけでアップロードすることができます。<br>アップロードした画像も一覧で管理することができます。
          また、画像を記事に挿入する時も画像を選んで選択するだけで、記事上に画像の挿入が可能です。</p>
        </li>

        <li class="merit">
          <h5>複数人での編集が可能</h5>
          <p>
          ユーザー管理機能が充実しており・投稿者・寄稿者・編集者・管理者そして・閲覧者の5つのユーザー権限が用意されており、それぞれの役割に応じて権限の広さを設定できます。<br>
          これは大きな企業様での管理のしやすさで抜きん出ていると言えます。
          </p>
        </li>

        <li class="merit">
          <h5>アクセス数の確認</h5>
          <p>WordPressでは管理画面上で「閲覧数」の数値が表示されており、アクセス解析ツールを使わずにその記事のアクセス数の確認が簡単にできます。<br>
            これらはマーケティングにおいての貴重なデータとなります。</p>
        </li>
      </ul><!-- wp-merit -->
    </section>
</main><!--main-->
<?php
  if (layout_classname($page->post_name) !== 'column1_noside'):
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
