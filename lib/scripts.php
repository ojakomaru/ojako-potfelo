<?php
// 現在のテーマのテンプレートディレクトリの URI
define("TEMPLATE_DIRE", get_template_directory_uri());
// 現在のテーマのテンプレートディレクトリのパス
define("TEMPLATE_PATH", get_template_directory());

function wp_css($css_name, $file_path){
  wp_enqueue_style($css_name,TEMPLATE_DIRE.$file_path, array(), date('YmdGis', filemtime(TEMPLATE_PATH.$file_path)));
}
function wp_script($script_name, $file_path, $bool = true){
  wp_enqueue_script($script_name,TEMPLATE_DIRE.$file_path, array(), date('YmdGis', filemtime(TEMPLATE_PATH.$file_path)), $bool);
}

// 管理画面用スクリプトを読み込む
function add_admin_scripts($hook) {
  // cssファイルを追加
  wp_register_style( 'oja_admin_css', get_template_directory_uri() . '/css/oja-admin.css', false, '1.0.0' );
  wp_enqueue_style( 'oja_admin_css' );
}
add_action('admin_enqueue_scripts','add_admin_scripts');

function add_enqueue_files(){
  //メインJavaScriptのエンキュー
  wp_script('main_script','/js/script.js');

  //ホームCSSのエンキュー
  if(is_front_page()) {
    wp_css('home_css','/css/style.css');
  }
  //製作者ページスタイル
  elseif (is_page('company')) {
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
  //カスタム投稿実績スタイル
  elseif(is_singular('works')) {
    wp_css('works-style', '/css/single-works.css');
  }
  //カスタムタクソノミー記事スタイル & 検索結果ページスタイル
  elseif(is_tax(array('oja_cat', 'oja_tags')) || is_search()) {
    wp_css('taxonomy-style', '/css/oja_tax.css');
  }
  //カスタムタクソノミー実績スタイル
  elseif(is_tax('production')) {
    wp_css('works_archive', '/css/works_tax.css');
  }
  // FontAwesomeの読み込み
  wp_enqueue_script('fontawesome_js', 'https://kit.fontawesome.com/fb19e987ff.js');
  wp_enqueue_style('fontawesome_css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');
}
add_action('wp_enqueue_scripts', 'add_enqueue_files',1);

// カスタムブロック登録用スクリプト
add_action( 'enqueue_block_editor_assets', function () {
  /**
   * ExBoxブロック登録
   */
  $exbox_asset_file = include __DIR__ . '/../blocks/build/exbox.asset.php';
	wp_enqueue_script(
		'exbox-script',
		get_theme_file_uri( '/blocks/build/exbox.js' ),
		$exbox_asset_file['dependencies'], //依存スクリプトの配列
    $exbox_asset_file['version'], //バージョン
		true
	);

  /**
   * アイコンブロック登録
   */
  $iconbox_asset_file = include __DIR__ . '/../blocks/build/iconbox.asset.php';
	wp_enqueue_script(
		'iconbox-script',
		get_theme_file_uri( '/blocks/build/iconbox.js' ),
		$iconbox_asset_file['dependencies'],
    $iconbox_asset_file['version'],
		true
	);
  //Font Awesome読み込み
  wp_enqueue_style('fontawesome_css','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');

  /**
   * コアブロック拡張スクリプト
   */
  $excore_asset_file = include __DIR__ . '/../blocks/build/core_expantion.asset.php';
	wp_enqueue_script(
		'core_expantion-script',
		get_theme_file_uri( '/blocks/build/core_expantion.js' ),
		$excore_asset_file['dependencies'],
    $excore_asset_file['version'],
		true
	);

  /**
   * コアブロックの追加スタイル登録
   */
  wp_enqueue_script( 'oja-block-editor', get_theme_file_uri( 'js/editor.js'), [
    'wp-blocks', 'wp-element', 'wp-rich-text', 'wp-i18n', 'wp-editor'
  ]);
	wp_localize_script( 'oja-block-editor', 'ojaEditorObj', [
		[
			'item' => 'editor01',
			'title' => 'marker',
			'class' => 'text-marker',
		],
	]);
});

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
