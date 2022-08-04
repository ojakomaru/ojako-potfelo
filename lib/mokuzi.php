<?php


if(function_exists('oja_add_mokuzi')) {
  add_filter( 'the_content', 'oja_add_mokuzi', 1 );
}

function oja_add_mokuzi( $content ) {
  if ( is_single() && in_the_loop() && is_main_query() ) {
    //h2 ~ h5を正規表現で表す
    $pattern = '/<h[2-5]>(.*?)<\/h[2-5]>/i';
    //$contentから要素を検索する
    preg_match_all( $pattern, $content, $matches, PREG_SET_ORDER );
    // h2~h5要素が3つ以上の場合に目次を出力
    if ( count( $matches ) >= 3 ) {
      // 目次出力に使用する変数
			$toc = '<p>この記事の目録</p>
              <ol class="postin-list">';
			// 目次の階層の判断に使用する変数
			$hierarchy = NULL;
			// ループ回数を数える変数
			$i = 0;
      foreach ( $matches as $element) {
        $i++;
        $id = 'toc_chapter'. $i;
        // preg_replace( 検索文字列, 置換文字列, 対象 ) ※正規表現でグループ化した部分を$1~3で置換できる ここではidをタグに挿入
        $chapter = preg_replace( '/<(.+?)>(.+?)<\/(.+?)>/',  '<$1 id="' . $id . '">$2</$3>', $element[0] );
        // idを挿入したタグでcontentを置換する
        $content = preg_replace( $pattern, $chapter, $content, 1);

        // それぞれのタグによる階層構造の設定
        // strpos(検索対象, 検索文字列) 返り値:検索文字列の位置を整数で返す
        switch ( true ) {
          case strpos( $element[0], '<h2' ) !== false:
            $tag_level = 2; break;
          case strpos( $element[0], '<h3' ) !== false:
            $tag_level = 3; break;
          case strpos( $element[0], '<h4' ) !== false:
            $tag_level = 4; break;
          case strpos( $element[0], '<h5' ) !== false:
            $tag_level = 5; break;
        }

        // ループ一回目
        if( $i == 1 ) {
          $hierarchy = $tag_level;

        // 次のタグが下層となる場合
        } elseif ( $hierarchy < $tag_level ){
          $current_tag = $hierarchy - $tag_level;
          if ($hierarchy == 2 && $tag_level == 4) {
            $toc .= PHP_EOL .'<ol class="e_level toc-h'. $tag_level .'"><ol>'. PHP_EOL;
          } elseif ($hierarchy == 2 && $tag_level == 5) {
            $toc .= PHP_EOL .'<ol class="e_level toc-h'. $tag_level .'"><ol><ol>'. PHP_EOL;
          } else {
            $toc .= PHP_EOL .'<ol class="toc-h'. $tag_level .'">'. PHP_EOL;
          }
          $hierarchy = $tag_level;

        // 次のタグが上層となる場合
        }	elseif( $hierarchy > $tag_level ){
          $current_tag = $hierarchy - $tag_level;
          // str_repeat(文字列, 繰り返す回数) ※返り値:繰り返された文字列
          $closing = str_repeat('</li>'. PHP_EOL .'</ol>', $current_tag );
          $toc .= $closing . PHP_EOL .'</li>'. PHP_EOL;
          $hierarchy = $tag_level;

        // 同じ階層がそれぞれ連続する場合
        } elseif( $hierarchy === $tag_level ){
          $toc .= '</li>'. PHP_EOL;
          $hierarchy = $tag_level;
        }

        // HTMLとして生成する
        $title = $element[1];
        $toc .= '<li><a href="#' . $id . '">' . $title . '</a>';
      } //foreach ( $matches as $element)
      // 閉じタグを出力
      $toc .= str_repeat('</li></ol>', $tag_level - 1);

      $index = '<nav class="postin-nav toc">
                  '. PHP_EOL . $toc .
                '</nav>'. PHP_EOL;

      $h2 = '/<h2.*?>/i';
      if (preg_match($h2, $content, $h2s)) {
        $content = preg_replace($h2, $index . $h2s[0], $content, 1);
      }
    } //if ( count( $matches ) > 3 )
  } //if ( is_single() && in_the_loop() && is_main_query() )
  return $content;
} ////function oja_add_mokuzi( $content )
