<?php
// javascriptとstyle.cssを読み込む
function add_files() {
  wp_enqueue_script(
    'main_script',//識別子
    get_template_directory_uri() .'/js/script.js',//ファイルへのパス
    array(),//jsを読み込む順番を配列で指定
    false,//バージョン指定
    true//falseならheaderで読み込む様になる
  );

  //メインCSSの読み込み
  wp_enqueue_style(
    'main_css',
    get_template_directory_uri().'/css/style.css',
    array(),
    false,
    false
  );
}
add_action('wp_enqueue_scripts','add_files');

// FontAwesomeの読み込み
function enqueue_scripts(){
  wp_enqueue_script('fontawesome_js','https://kit.fontawesome.com/fb19e987ff.js');
  wp_enqueue_style('fontawesome_css','https://use.fontawesome.com/releases/v5.2.0/css/all.css');
}
add_action('wp_enqueue_scripts','enqueue_scripts');

// 即時反映用の JavaScript をエンキューします。
function live_preview() {
    wp_enqueue_script(
        'mytheme-themecustomizer',
        get_template_directory_uri() . '/js/theme-customizer.js',
        array( 'jquery', 'customize-preview' ),
        false, // バージョン指定
        true // スクリプトをフッターで読み込むか
    );
  }
add_action( 'customize_preview_init' , 'live_preview' );
