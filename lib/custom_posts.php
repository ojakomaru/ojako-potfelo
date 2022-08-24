<?php

//カスタム投稿タイプ「制作実績」を作成。
function cpt_register_works() { //add_actionの２つのパラメーターを定義
	$labels = [
		"singular_name" => "works",
		"edit_item"     => "制作実績",
		"menu_name"     => "制作実績",
    "add_new_item"  => "実績を追加する",
    "new_item"      => "新たな実績",
    "all_items"     => "制作実績",
    "view_item"     => "実績を表示",
    "search_items"  => "実績を検索",
    "not_found"     => "実績が見つかりませんでした",
    "not_found_in_trash" => "ゴミ箱に実績はありませんでした"
	];
	$args = [
		"label"       => "制作実績", //管理画面に出てくる名前
		"labels"      => $labels,
		"description" => "制作実績ページ",
		"public"      => true,//公開するかどうか
		"show_in_rest" => true,//グーテンベルクを使用可能に
		"rest_base"    => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive"  => true,//一覧ページを持つかどうか
		"exclude_from_search" => false,
		"delete_with_user" => false,
		"map_meta_cap"  => true,
		"hierarchical"  => true,//子階層を持つかどうか
		"rewrite" => [ "slug" => "works", "with_front" => true ], //スラッグをworksに設定
		"query_var"     => true,//特別なスラッグを与えない
		"menu_position" => 5,
		"supports"      => [ "title", "editor", "thumbnail" ],
	];
	register_post_type( "works", $args );
}
add_action( 'init', 'cpt_register_works' );


//「制作実績」にカテゴリーを追加
function oja_register_production() { //add_actionの２つのパラメーターを定義
	$labels = [
    'name'           => "WEBサイトのタイプ",
    'singular_name'  => 'production',
    'search_items'   => 'カテゴリー',
    'popular_items'  => 'カテゴリー',
    'all_items'      => 'すべてのカテゴリー',
    'parent_item'    => null,
    'parent_item_colon' => null,
    'edit_item'      => 'カテゴリーを編集',
    'update_item'    => 'カテゴリーを更新',
    'add_new_item'   => '新しいカテゴリーを追加',
    'new_item_name'  => '新しいカテゴリーネーム',
    'search_items'   => 'カテゴリーを検索',
    'popular_items'  => '人気のカテゴリー',
    'separate_items_with_commas' => 'カテゴリー',
    'add_or_remove_items' => 'カテゴリー',
    'choose_from_most_used' => 'カテゴリー',
    'not_found'      => 'カテゴリーはありませんでした',
    'menu_name'      => 'カテゴリー',
	];
	$args = [
		"labels"             => $labels,
		"publicly_queryable" => true,
		"hierarchical"       => true,
		"show_in_menu"       => true,
		"query_var"          => true,
		"rewrite" => [ 'slug' => 'production', 'with_front' => true, ], //カテゴリーのスラッグ
		"show_admin_column"  => false,
		"show_in_rest"       => true,
		"rest_base"          => "production",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"show_in_quick_edit" => false,
		];
	register_taxonomy( "production", [ "works" ], $args ); //「works」というカスタム投稿タイプにカテゴリーを追加
}
add_action( 'init', 'oja_register_production' );

//カスタム投稿タイプ「おジャコの出世成功記録」を作成。
function oja_register_blog() { //add_actionの２つのパラメーターを定義
	$labels = [
		"singular_name" => "blogs",
		"edit_item"     => "おジャコの編集",
		"menu_name"     => "おジャコの出世成功記録",
    "add_new_item"  => "ジャコを追加する",
    "new_item"      => "新たなお魚",
    "all_items"     => "すべての小魚",
    "view_item"     => "おジャコを表示",
    "search_items"  => "魚群を検索",
    "not_found"     => "おジャコが見つかりませんでした",
    "not_found_in_trash" => "ゴミ箱におジャコはいませんでした"
	];
	$args = [
		"label"       => "おジャコBLOG", //管理画面に出てくる名前
		"labels"      => $labels,
		"description" => "おジャコの出世成功記録",
		"public"      => true,//公開するかどうか
		"show_in_rest" => true,//グーテンベルクを使用可能に,REST APIを取得
		"rest_base"   => "blogs",//REST APIの取得URLを指定
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => true,//一覧ページを持つかどうか
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"map_meta_cap" => true,
		"hierarchical" => true,//子階層を持つかどうか
		"rewrite" => [ "slug" => "blogs", "with_front" => true ], //スラッグをworksに設定
		"query_var"    => true,//特別なスラッグを与えない
		"menu_position" => 6,
		"supports"     => [ "title", "editor", "thumbnail",
      'excerpt' ,//（抜粋）
      'trackbacks' ,//（トラックバック送信）
      'custom-fields',//（カスタムフィールド）
      'comments',//（コメントの他、編集画面にコメント数のバルーンを表示する）
      'revisions' ,//（リビジョンを保存する）
      'page-attributes',//（メニューの順序。「親〜」オプションを表示するために hierarchical が true であること）
      'post-formats'
    ],
	];
	register_post_type( "blogs", $args );

  // 「blogs」にカテゴリーを追加
  $labels = [
    "singular_name" => "oja_cat",
  ];
  $labels = array(
    'name'           => "Category",
    'singular_name'  => 'oja_cat',
    'search_items'   => 'カテゴリー',
    'popular_items'  => 'カテゴリー',
    'all_items'      => 'すべてのカテゴリー',
    'parent_item'    => null,
    'parent_item_colon' => null,
    'edit_item'      => 'カテゴリーを編集',
    'update_item'    => 'カテゴリーを更新',
    'add_new_item'   => '新しいカテゴリーを追加',
    'new_item_name'  => '新しいカテゴリーネーム',
    'search_items'   => 'カテゴリーを検索',
    'popular_items'  => '人気のカテゴリー',
    'separate_items_with_commas' => 'カテゴリー',
    'add_or_remove_items' => 'カテゴリー',
    'choose_from_most_used' => 'カテゴリー',
    'not_found'      => 'カテゴリーはありませんでした',
    'menu_name'      => 'カテゴリー',
  );
  $args = [
    "labels"             => $labels,
    "publicly_queryable" => true,
    "hierarchical"       => true, // 親を持つページかどうか
    "show_in_menu"       => true,
    "query_var"          => true,
    "rewrite" => [ 'slug' => 'oja_cat', 'with_front' => true, ], //カテゴリーのスラッグ
    "show_admin_column"  => false,
    "show_in_rest"       => true,
    "rest_base"          => "oja_cat",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
  ];
  register_taxonomy( 'oja_cat', 'blogs', $args ); //「blogs」というカスタム投稿タイプにカテゴリーを追加


  // 「blogs」というカスタム投稿タイプに「タグ」を追加
  $labels = array(
  'name'           => 'Tag',
  'singular_name'  => 'oja_tags',
  'search_items'   => 'タグを検索',
  'popular_items'  => '人気のタグ',
  'all_items'      => 'すべてのタグ',
  'parent_item'    => null,
  'parent_item_colon' => null,
  'edit_item'      => 'タグを編集',
  'update_item'    => 'タグを更新',
  'add_new_item'   => '新しいタグを追加',
  'new_item_name'  => '新しいタグネーム',
  'separate_items_with_commas' => 'タグ',
  'add_or_remove_items' => 'タグ',
  'choose_from_most_used' => 'タグ',
  'not_found'      => 'タグはありませんでした',
  'menu_name'      => 'タグ',
  );

  $args = array(
  'hierarchical' => true,
  'labels'       => $labels,
  "show_in_rest" => true,
  "rest_base"    => "oja_tags",
  'show_ui'      => true,
  'show_admin_column' => true,
  'update_count_callback' => '_update_post_term_count',
  'query_var'    => true,
  'rewrite'      => array( 'slug' => 'oja_tags' ),
  );

  register_taxonomy( 'oja_tags', 'blogs', $args );
}
add_action( 'init', 'oja_register_blog' );


//RESTAPIにエンドポイントを追加する
function oja_rest_route_for_post( $route, $post ) {
  if ( $post->post_type === 'blogs' ) {
    $route = '/wp/v2/blogs/' . $post->ID;
  }
  return $route;
}
add_filter( 'rest_route_for_post', 'oja_rest_route_for_post', 10, 2 );
