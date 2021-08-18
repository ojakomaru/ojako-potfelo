<?php
/**
* テーマカスタマイズ画面のカスタマイズ
*/

//ヘッダーナビの色を変更可能にする
function built_in_customizer ( $wp_customize ) {

  $wp_customize->add_setting( 'head_link_textcolor',
    array(
      'default'    => '#393542',
      'capability' => 'edit_theme_options',
      'transport'  => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'mytheme_head_textcolor',
    array(
        'label'       => 'ヘッダーナビテキストカラー',
        'section'     => 'colors',
        'settings'    => 'head_link_textcolor',
        'priority'    => 10,
        'description' => 'ヘッダーリンクテキストの色を調整します'
      )
    )
  );

  //ヘッダーのカラーを変更可能にする
  $wp_customize->add_setting( 'header_color',
    array(
      'default'    => '',
      'capability' => 'edit_theme_options',
      'transport'  => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color',
    )
  );
  $wp_customize->add_control( new WP_Customize_Color_Control(
    $wp_customize,
    'mytheme_header_color',
    array(
        'label'       => 'ヘッダーカラー',
        'section'     => 'colors',
        'settings'    => 'header_color',
        'priority'    => 50,
        'description' => 'ヘッダーの色を調整します'
      )
    )
  );

  // タイトル出力設定
  $wp_customize->add_setting(
    'title_tagline_radio',
    array(
      'default' => 'title_cp',
      'priority' => 10,
      'sanitize_callback' => 'sanitize_text_field'
    )
  );
  $wp_customize->add_control(
    'title_control_radio',
    array(
      'section'     => 'title_tagline',
      'settings'    => 'title_tagline_radio',
      'label'       => 'タイトル出力設定',
      'priority'    => 9,
      'type'        => 'radio',
      'choices'     => array(
        'title_cp'  => 'サイトロゴが無いときにサイトタイトルとキャッチコピーを表示する',
        'title'     => 'サイトロゴが無いときにサイトタイトルのみ表示する',
        'notitle'   => 'サイトロゴが無いときは何も表示しない'
      )
    )
  );

  //ビルトインテーマ設定の指定を変更
  $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
  $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
  $wp_customize->get_control( 'display_header_text' )->description = '※ページが再読み込みされます';
  $wp_customize->get_control( 'display_header_text' )->label = 'サイトロゴ及びタイトルを表示する';
  $wp_customize->get_control( 'display_header_text' )->priority = 1;
  $wp_customize->get_section( 'colors' )->title = '各コンテンツのカラー';
  $wp_customize->get_control( 'header_textcolor' )->label = 'サイトタイトルカラー';
  $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
  $wp_customize->get_control( 'background_color' )->label = '背景色の変更';
  $wp_customize->get_control( 'background_color' )->description = 'フィルター背景色を調整します';
  // 「ホームページ設定」を削除
  $wp_customize->remove_section("static_front_page");
  // 「追加CSS」を削除
  $wp_customize->remove_section("custom_css");
}

//   * ライブプレビュー中の <head> 内に CSS を出力
function header_output() {
  ?>
  <style type="text/css">
      <?php
      echo generate_css('#site-title', 'color', 'header_textcolor');
      // echo generate_css('body::before', 'background-color', 'background_color');
      // echo generate_css('.gMenu_name', 'color', 'head_link_textcolor');
       ?>
  </style>
  <?php
}
// ライブプレビュー中のサイトに CSS を出力します。
add_action( 'wp_head' , 'header_output' );

function generate_css( $selector, $property, $mod_name, $inline = false) {
  $return = '';
  $mod = get_theme_mod($mod_name);
  if ( !$inline ) :
    if( preg_match('/color/' , $property) || preg_match('/background-color/' , $property)) {
      $return = sprintf('%s { %s: #%s; }',
        $selector, $property, $mod
      );
    } else {
      $return = sprintf('%s { %s: %s; }',
        $selector, $property, $mod
      );
    }
  else :
    $return = sprintf('style="%s: %s;"',
      $property, $mod
    );
  endif;
  return $return;
} //generate_css



// カスタムヘッダー出力関数作成
function wphead_cb() {
  $text_color = get_theme_mod('head_link_textcolor');
  $header_color = get_theme_mod('header_color');
  echo '<style type="text/css">';
  echo 'header ul li a, .gMenu_name { color:'.$text_color.'; }';
  echo '#header { background-color:'.$header_color.'; }';
  echo '</style>';
}
add_action('wp_head', 'wphead_cb');

// カスタムバックグラウンド出力関数
function customize_bgfilter_color() {
  $background_color = get_background_color();
  if( $background_color ): ?>
  <style type="text/css">
    body::before {
      background-color: <?php echo '#'.$background_color; ?>;
      opacity: 0.6;
    }
  </style>
  <?php endif;
}
add_action( 'wp_head', 'customize_bgfilter_color');


//カスタムサイトロゴ&サイトタイトル
function title_radio_put() {
  return get_theme_mod('title_tagline_radio');
}
function oja_custom_title() {
  $site_title    = get_bloginfo( 'name' );
  $site_desc     = '<p class="site-description">'.get_bloginfo('description').'</p>' ;
  if( has_custom_logo() ) :
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $image  = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $mylogo = $image[0];
    echo '<img src="'. $mylogo .'" class="custom-logo" alt="'. $site_title .'" />';
  elseif ( title_radio_put() === 'title_cp'):
    if( is_front_page() && is_home()) {
      echo '<h1 id="site-title" class="site-logo">'. $site_title .'</h1>';
      echo $site_desc ;
    } else {
      echo '<p class="site-logo"><a href="'. home_url() .'" rel="home">'. $site_title .'</a></p>';
      echo $site_desc ;
    }
  elseif ( title_radio_put() === 'title') :
    if( is_front_page() && is_home()) {
      echo '<h1 id="site-title" class="site-logo">'. $site_title .'</h1>';
    } else {
      echo '<p class="site-logo"><a href="'. home_url() .'" rel="home">'. $site_title .'</a></p>';
    }
  else:
    return;
  endif; //if( has_custom_logo() )
}