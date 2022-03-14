<?php
// カスタムスクリプトを読み込む
function add_scripts() {
  // FontAwesomeの読み込み
  wp_enqueue_script('fontawesome_js','https://kit.fontawesome.com/fb19e987ff.js');
  wp_enqueue_style('fontawesome_css','https://use.fontawesome.com/releases/v5.2.0/css/all.css');

  // Github Gist カスタマイズ用CDN読み込み
  wp_enqueue_script( 'github_gist_customize', 'https://cdnjs.cloudflare.com/ajax/libs/gist-embed/2.4/gist-embed.min.js', array(), '', true );
}
add_action('wp_enqueue_scripts','add_scripts');

function add_enqueue_files(){
  define("TEMPLATE_DIRE", get_template_directory_uri());
  define("TEMPLATE_PATH", get_template_directory());

  function wp_css($css_name, $file_path){
    wp_enqueue_style($css_name,TEMPLATE_DIRE.$file_path, array(), date('YmdGis', filemtime(TEMPLATE_PATH.$file_path)));
  }
  function wp_script($script_name, $file_path, $bool = true){
    wp_enqueue_script($script_name,TEMPLATE_DIRE.$file_path, array(), date('YmdGis', filemtime(TEMPLATE_PATH.$file_path)), $bool);
  }


  //メインJavaScriptのエンキュー
  wp_script('main_script','/js/script.js');

  //メインCSSのエンキュー
  wp_css('main_css','/css/style.css');

  //製作者ページスタイル
  if (is_page('company')) {
    wp_css('company_style','/css/company.css');
  }
  //サービスページスタイル
  elseif(is_page('service')) {
    wp_css('service-style', '/css/service.css');
  }
  //contactページスタイル
  elseif(is_page('contact')) {
    wp_css('contact-style', '/css/contact.css');
  }
  //カスタム投稿ブログアーカイブスタイル
  elseif( is_post_type_archive('blogs')) {
    wp_css('blogs_archive', '/css/archive-blogs.css');
  }
  //カスタム投稿実績アーカイブスタイル
  elseif( is_post_type_archive('works')) {
    wp_css('works_archive', '/css/archive-works.css');
  }
  //カスタム投稿記事スタイル
  elseif (is_singular('blogs')) {
    wp_css('blogs-style', '/css/single-blogs.css');
  }
  //カスタムタクソノミースタイル
  elseif(is_tax(array('oja_cat', 'oja_tags'))) {
    wp_css('taxonomy-style', '/css/oja_tax.css');
  }
}
add_action('wp_enqueue_scripts', 'add_enqueue_files',1);

// 即時反映用の JavaScript をエンキュー
function live_preview() {
  wp_enqueue_script(
    'theme-customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    false, // バージョン指定
    true // スクリプトをフッターで読み込むか
  );
}
add_action( 'customize_preview_init' , 'live_preview' );
