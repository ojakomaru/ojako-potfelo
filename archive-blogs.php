<?php
/*
Template Name: ブログ一覧ページ
*/
?>
<?php get_header(); ?>

<section class="key_visual" id="key_visual">
  <div class="key_movi">
    <video autoplay loop muted  id="bgvid">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Japan-23525.webm" type="video/webm">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/Japan-23525.webm" type="video/mp4">
    </video>

    <div id="taxonomy-text">日々学び</div>
    <div class="page-title">
      <h1 id="animation-text"><?php echo bloginfo('name');?></h1>
    </div><!-- welcome-text -->

  </div><!-- key_movi -->
</section><!--key_visual-->

<div class="container <?php echo layout_classname('blogs'); ?>"><!-- フッターまでつづく -->
  <?php if ( is_active_sidebar( 'main-content-top-widget-area' ) ) : ?>
    <section class="content-top-widget">
      <?php dynamic_sidebar( 'main-content-top-widget-area' ); ?>
    </section>
  <?php endif; ?>
  <main class="main">
    <div class="active_head">
      <h2 class="text-frame">記事一覧ページ</h2>
    </div>

<!-- 記事の条件絞り込み検索 -->
<?php
$paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
  $args = array(
    'post_type'      => 'blogs',
    'post_status'    => 'publish',
    'posts_per_page' => 10,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC'
  );
  if(!empty($_GET['search_cat'])) {
    foreach ($_GET['search_cat'] as $value) {
      $search_cat[] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    }
    $tax_args[] = array(
      'taxonomy' => 'oja_cat',
      'terms'    => $search_cat,
      'field'    => 'slug',
      'operator' => 'IN'
    );
  } else { $search_cat = [];}
  
  if(!empty($_GET['search_tags'])) {
    foreach ($_GET['search_tags'] as $value) {
      $search_tag[] = htmlspecialchars($value,ENT_QUOTES,'UTF-8');
    }
    $tax_args[] = array(
      'taxonomy' => 'oja_tags',
      'terms'    => $search_tag,
      'field'    => 'slug',
      'operator' => 'AND',
    );
  } else { $search_tag = [];}

  if(!empty($search_cat) || !empty($search_tag)) {
    $args += Array('tax_query' => array($tax_args));
    echo '<span class="sort_notice">';
    echo '※現在記事をソートしています';
    echo '</span>';
  }
  ?>
  <a href="" id="modal_open">条件を絞り込み検索</a>
<!--  ブログコンテンツ  -->
<article id="content">
<!-- 検索フォームの表示と送信 -->
  <section class="refine_search" id="modal">
    <?php
    $host = $_SERVER['HTTP_HOST'];
    $url  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    $directori = '/blogs/';
    ?>
    <form method="get" action="<?php echo esc_url($host.$url.$directori); ?>">
      <h2 class="condition-title">カテゴリーで絞り込む</h2>
      <div class="cat_condition">
      <?php
        $cat_terms =  get_terms('oja_cat',array(
          'hide_empty' => false,
          'orderby' => 'slug',
        ));
        foreach ($cat_terms as $cat ) :
        $checked = '';
        if(in_array($cat->slug, (array)$search_cat, true)) {
          $checked = 'checked';
        }
        ?>
          <label>
            <input type="checkbox" name="search_cat[]" value="<?php echo esc_attr($cat->slug); ?>" <?php echo esc_attr($checked); ?>>
            <span class="dummy_input"></span>
            <span class="check_text">
              <?php echo esc_html($cat->name); ?>
            </span>
          </label>
        <?php endforeach;
        ?>
      </div>

      <h2 class="condition-title">タグで絞り込む</h2>
      <div class="tag_condition">
        <?php
        $tags = get_terms('oja_tags',array(
          'hide_empty' => 0 ,
          'orderby' => 'slug'
        ));
        foreach ($tags as $tag ) :
        $checked = '';
        if(in_array($tag->slug, (array)$search_tag, true)) {
          $checked = 'checked';
        }?>
        <label>
          <input type="checkbox" name="search_tags[]" value="<?php echo esc_attr($tag->slug); ?>" <?php echo esc_attr($checked); ?>>
          <span class="dummy_input"></span>
          <span class="check_text">
            <?php echo esc_html($tag->name); ?>
          </span>
        </label>
        <?php endforeach;
        ?>
      </div>
      <input type="submit" value="チェックされた記事を表示する" class="submit-button">
    </form>
    <a href="" id="modal_close">閉じる</a>
  </section>
  <div class="mask" id="mask"></div>
      <?php
      $the_query = new WP_Query($args);
      if($the_query->have_posts()) :
      while($the_query->have_posts()) :
      $the_query->the_post();
      get_template_part('template-parts/loop','post_cade');
      endwhile; wp_reset_postdata(); //ループ終わり
      else : ?>
      <p>該当する記事は見つかりませんでした。</p>
<?php endif; ?>
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
  if (layout_classname('blogs') !== 'column1_noside'):
  ?>
  <aside class="aside">
    <?php
    get_sidebar();
    get_template_part('template-parts/sidebar/sidebar-blogs');
    get_template_part('template-parts/sidebar/sidebar-form');
    get_template_part('template-parts/sidebar/sidebar-blogs_category');
    get_template_part('template-parts/sidebar/sidebar-blogs_tags');
    ?>
  </aside>
  <?php endif;?>

<?php get_footer() ;?>