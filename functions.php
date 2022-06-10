<?php
require_once locate_template('lib/init.php');        // 初期設定の関数
require_once locate_template('lib/cleanup.php');     // 不要なモノを削除する関数
require_once locate_template('lib/scripts.php');     // CSSやJavascript関連の関数
require_once locate_template('lib/custom_posts.php');// カスタム投稿生成関数
require_once locate_template('lib/breadcrumbs.php'); // パンくずリストの関数
require_once locate_template('lib/paginations.php'); // ページネーションの関数
require_once locate_template('lib/widgets.php');     // サイドバー、ウィジェットの関数
require_once locate_template('lib/customizer/customizer.php');  // カスタマイズ機能の関数

//コメント欄のHTMLを設定
function custom_comment_list($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment; ?>

  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div class="comment_meta">
      <span class="author">
        名前 ： <?php echo get_comment_author(); ?>
      </span>

      <span class="post_date">
        <?php echo get_comment_date() ?> <?php echo get_comment_time() ?>
      </span>
    </div>
    <?php comment_text() ?>
  </li>
<?php
}


//既存の投稿の名前を変更
function post_has_archive( $args, $post_type ) { // 設定後に（パーマリンク更新すること）
	if ( 'post' == $post_type ) {
		$args['rewrite']     = true;
		$args['has_archive'] = 'news';
		$args['label']       = 'お知らせ' ;
	}
	return $args;
}
add_filter( 'register_post_type_args', 'post_has_archive', 10, 2 );

//メインクエリ投稿数を制限
add_action('pre_get_posts','my_pre_get_posts');
function my_pre_get_posts($query) {
	//管理画面とメインクエリーに干渉させないため必須
	if (is_admin() || !$query->is_main_query()) {
		return;
	}
	if ($query->is_home()) { //トップページの場合
		$query->set('posts_per_page',3);//３件表示する
		//$query->set('category_name','news');//カテゴリースラッグがnewsの記事
		//$query->set('nopaging',true);//ページングを使用せずにすべての記事を表示する。
		return;
	}
}

// the_excerpt();の文字数を変更する
function ojako_excerpt_mblength ($length) {
  $length = 40;
  if (is_archive()) {
    $length = 140;
  }
  return $length;
}
add_filter('excerpt_mblength','ojako_excerpt_mblength',999);

// 管理画面の投稿・固定ページ一覧にIDを表示
function manage_posts_columns_id( $columns ) {
	$columns['wps_post_id'] = 'ID';
	return $columns;
}

function add_column_id( $column_name, $post_id ) {
	if( $column_name == 'wps_post_id' ) {
		echo $post_id;
	}
}
// 投稿一覧
add_filter( 'manage_posts_columns', 'manage_posts_columns_id', 5 );
add_action( 'manage_posts_custom_column', 'add_column_id', 5, 2 );
// 固定ページ一覧
add_filter( 'manage_pages_columns', 'manage_posts_columns_id', 5 );
add_action( 'manage_pages_custom_column', 'add_column_id', 5, 2 );

// SVGをアップロード可能に
function enable_svg($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'enable_svg');
