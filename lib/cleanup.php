<?php

//コメント欄に貼られるURLリンクを無効化する
remove_filter('comment_text', 'make_clickable', 9);
//コメント欄に挿入されるHTMLタグを無効化する
function invalidate_comment_tags($comment_content) {
  if (get_comment_type() == 'comment') {
      $comment_content = htmlspecialchars($comment_content, ENT_QUOTES);
  }
  return $comment_content;
}
add_filter('comment_text', 'invalidate_comment_tags', 9);
add_filter('comment_text_rss', 'invalidate_comment_tags', 9);
add_filter('comment_excerpt', 'invalidate_comment_tags', 9);

// WordPressのバージョン情報削除
remove_action('wp_head','wp_generator');
//CSSとJSにもバージョン情報が乗るので削除
function vc_remove_wp_ver_css_js( $src ) {
  if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
    $src = remove_query_arg( 'ver', $src );
  return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

// RSSフィードリンクを発信する気がないので削除
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);

// 絵文字使わないので削除
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
//DNS Prefetch削除（読み込みに影響するため）
remove_action('wp_head', 'wp_resource_hints', 2);

// Embed（ブログを他のブログへ埋め込みやすくする）使わないので削除
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');

// EditURI外部投稿ツール削除
remove_action('wp_head', 'rsd_link');

// Windows Live Writerからの投稿機能
remove_action('wp_head', 'wlwmanifest_link');