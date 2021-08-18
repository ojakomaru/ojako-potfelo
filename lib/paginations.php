<?php
/**
* ページネーション出力関数
* $args  : [
  *'current_page'   =>現在のページ
  *'prev_next'      =>前後への案内表示
  *'range'          => 左右に何ページ表示するか
  *'show_only'      => 1ページしかないときの表示
  *'add_item_class' => 追加するクラス名
* ]
*/
function pagination($args) {
  $defaults = array (
 		'current_page'  => max(1, get_query_var('paged')),
 		'prev_next'     => TRUE,
 		'range'         => 2,
    'show_only'     => FALSE,
    'add_item_class'=> ''
	);
  $args = wp_parse_args( $args, $defaults );
	extract( $args, EXTR_SKIP );

  $text_first   = "先頭へ";
  $text_before  = "前へ";
  $text_next    = "次へ";
  $text_last    = "最後へ";

  $post_type = get_post_type();
  if (is_tax()) {
    $post_count = get_queried_object()->count;
    $current_url = get_term_link(get_queried_object()->slug, get_queried_object()->taxonomy);
  } elseif (is_search()) {
    global $wp_query;
    $post_count = $wp_query->found_posts;
    $current_url = get_post_type_archive_link($post_type);
  } else {
    $post_count = wp_count_posts($post_type)->publish;
    $current_url = get_post_type_archive_link($post_type);
  }
  $page_limit = get_option('posts_per_page');
  $max_page = ( int ) ceil($post_count / $page_limit);

  if ( $show_only && $post_count < $page_limit ) {
    echo '<ul class="pagination"><li class="current pager">1</li></ul>';
    return;
  }

  if ( $post_count < $page_limit ) return; // １ページのみで表示設定もない場合

  if ( 1 !== $post_count ) {
    echo '<ul class="pagination"><li class="page_num">現在 ', $current_page ,' ページ目です','</li><br>';
    if ( $current_page > $range + 1 && $prev_next) {
      echo '<li class="first ',$add_item_class,'"><a href="', $current_url ,'" >', $text_first ,'</a></li>';
    }
    if ( $current_page > 1 && $prev_next) {
      echo '<li class="prev ',$add_item_class,'"><a href="', get_pagenum_link( $current_page - 1 ) ,'">', $text_before ,'</a></li>';
    }
    for ( $i = 1; $i <= $max_page; $i++ ) {
      if ( $i <= $current_page + $range && $i >= $current_page - $range ) {
        if ( $current_page === $i ) {
          echo '<li class="current pager ',$add_item_class,'">', $i ,'</li>';
        } else {
          echo '<li class="pager ',$add_item_class,'"><a href="', get_pagenum_link( $i ) ,'" class="pager ',$add_item_class,'">', $i ,'</a></li>';
        }
      }
    }
    if ( $current_page < $max_page && $prev_next) {
      echo '<li class="next ',$add_item_class,'"><a href="', get_pagenum_link( $current_page + 1 ) ,'">', $text_next ,'</a></li>';
    }
    if ( $current_page + $range < $max_page && $prev_next) {
      echo '<li class="last ',$add_item_class,'"><a href="', get_pagenum_link( $max_page ) ,'">', $text_last ,'</a></li>';
    }
    echo '</ul>';
  }
}
