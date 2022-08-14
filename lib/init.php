<?php
//管理用ツールバーを非表示にする
// add_filter('show_admin_bar','__return_false');

//テーマのサポート用
function ojakomaru_theme_support() {
	add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption']);
  add_theme_support('editor-styles');
  add_editor_style('/css/editor-style.css');

  $bg_defaults = array(
    'default-color'          => '#F8F9F7',
    'default-image'          => '',
    'default-repeat'         => 'no-repeat',
    'default-position-x'     => 'center',
    'default-attachment'     => 'scroll',
    'wp-head-callback'       => '_custom_background_cb',
  );
  add_theme_support( 'custom-background', $bg_defaults );

  $custom_header_args = array(
    'default-image'  => '',
    'width'          => 600,
    'height'         => 198,
    'flex-width'     => true,
    'flex-height'    => true,
    'header-text'    => true,
    'video'          => true,
    'uploads'        => false,
    'random-default' => false,
    'default-text-color' => '#393542',
    'wp-head-callback'   => 'wphead_cb',
  );
  add_theme_support( 'custom-header', $custom_header_args );

  $defaults = array(
    'height'               => 100,
    'width'                => 400,
    'flex-height'          => true,
    'flex-width'           => true,
    'header-text'          => array( 'site-title', 'site-description' ),
    'unlink-homepage-logo' => true,
  );
  add_theme_support( 'custom-logo', $defaults );
}
add_action('after_setup_theme','ojakomaru_theme_support');

//カスタマイザーでのウィジェットのセレクティブリフレッシュ
function customizer_widgets() {
  add_theme_support('customize-selective-refresh-widgets');
}
add_action('init', 'customizer_widgets');
