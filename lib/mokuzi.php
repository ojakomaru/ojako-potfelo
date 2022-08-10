<?php
// 管理画面settingの読み込み
require_once locate_template('/lib/admin_setting/mokuzi_setting.php');

// 見出しのidを付け替える
function add_chapter_id($the_content) {
  if ( is_single() && in_the_loop() && is_main_query() ):
    $pattern = '/^<h([2-5]).*?.+?<\/h[2-5]>$/im';
    if (!preg_match_all($pattern, $the_content, $headings, PREG_SET_ORDER)) {
      //見出しがないときは終了
      return $the_content;
    }
    /*
    $headings：見出しの配列
    $headings[0]：array(2)=> "最初の見出し", h2なら"2"のセット
    */
    // $setcount = oja_option();
    // h2~h5要素が3つ以上の場合に出力(デフォルト)
    $headings_count = get_option('mokuzi_number') ? get_option('mokuzi_number') : 3;
    if(count($headings) >= $headings_count) :
      // ループ回数を数える変数
      $i = 0;
      foreach ( $headings as $element) {
        $i++;
        $id = 'toc_chapter'. $i;
        // preg_replace( 検索文字列, 置換文字列, 対象 ) ※正規表現でグループ化()した部分を$1~3で置換できる ここではid含むタグを作成し
        $chapter = preg_replace( '/<(.+?)>(.+?)<\/(.+?)>/',  '<$1 id="' . $id . '">$2</$3>', $element[0] );
        // idを挿入したタグで本文を置換する
        $the_content = str_replace( $element[0], $chapter, $the_content);
      }
    endif;
  endif;
  return $the_content;
}
add_filter('the_content', 'add_chapter_id', 1);

function oja_add_mokuzi( $the_content ) {
  if ( !is_single() || !in_the_loop() || !is_main_query() ) {
    return $the_content;
  }
  //h2 ~ h5をidごと正規表現で表す
  $pattern = '/^<h([2-5]).+?id\s*=\s*"(.+?)".*>(.+?)<\/h[2-5]>$/im';
  if (!preg_match_all($pattern, $the_content, $toc_headings)) {
    return $the_content;
  }
  /*
  $toc_headings[0]：マッチした文字列<h2>text</h2>
  $toc_headings[1]：見出しレベルの数字 "2"
  $toc_headings[2]：id設定値
  $toc_headings[3]：見出し文
  */
  // h2~h5要素が3つ以上の場合に目次を出力
  $headings_count = get_option('mokuzi_number') ? get_option('mokuzi_number') : 3;
  $heading_title = get_option('mokuzi_text') ? get_option('mokuzi_text'): '目次';
  if(count($toc_headings) >= $headings_count) :
    // 目次の設定に応じてクラス名を付与
    $toc_class = '';
    if(get_option('mokuzi_radio')) {
      $toc_class .= ' '.get_option('mokuzi_radio');
    }
    if(get_option('mokuzi_select')) {
      $toc_class .= ' '.get_option('mokuzi_select');
    }
    if(get_option('mokuzi_design')) {
      $toc_class .= ' '.get_option('mokuzi_design');
    }
    $level = '';
    $hierarchy = 0;
    $toc = '<dl class="oja_toc '.$toc_class.'" id="oja_toc">';
    $toc .= '<dt class="toc_title">'.$heading_title;
    $toc .=   '<span id="mokuzi_show_toggle">Close</span>';
    $toc .= '</dt><dd class="mokuzi_content"><ol>';
    $count = count($toc_headings[0]);
    for ($i = 0; $i < $count; $i++) {
      // strpos(検索対象, 検索文字列) 返り値:検索文字列の位置を整数で返す
      switch ( true ) {
        case strpos( $toc_headings[1][$i], '2' ) !== false:
          $level = 0;  break;
        case strpos( $toc_headings[1][$i], '3' ) !== false:
          $level = 1; break;
        case strpos( $toc_headings[1][$i], '4' ) !== false:
          $level = 2; break;
        case strpos( $toc_headings[1][$i], '5' ) !== false:
          $level = 3; break;
      }
      //階層がネストされるとき
      while ($hierarchy < $level) {
        $toc .= '<ol class="toc_child">';
        $hierarchy++;
      }
      //閉じるとき
      while ($hierarchy > $level) {
        $toc .= '</li></ol></li>';
        $hierarchy--;
      }
      //aタグでタイトルを囲む
      $toc .= '<li><a href="#' . $toc_headings[2][$i] . '">' . $toc_headings[3][$i] . '</a>';
    } //for
    $toc = $toc . '</ol></dd>';
    // 目次に戻るボタンの分岐
    if(get_option('mokuzi_showcheck')) {
      $toc .= '<span id="back_to_mokuzi"><a href="#oja_toc">目次へ</a></span>';
    }
    $toc .= '</dl>';
    //最初のh2の前に$tocをつけた本文に置換する
    $the_content = str_replace($toc_headings[0][0], $toc . $toc_headings[0][0], $the_content);
  endif; //if ( count( $toc_headings ) > 3 )
  return $the_content;
} //function oja_add_mokuzi( $content )
add_filter( 'the_content', 'oja_add_mokuzi', 8 );