<?php
// ラップエレメントにclass名を追加する
function wrap_classname ($f_icon, $e_icon) {
  $class_name = "oja-corewraper ";
  if (isset($f_icon)) {
    $class_name .= ' ' . explode(" ",str_replace('fa-', '', $f_icon))[1];
  }
  if (isset($e_icon)) {
    $class_name .= ' ' . explode(" ",str_replace('fa-', '', $e_icon))[1];
  }
  return $class_name;
}
// マージン設定を反映する
function margin_style ($bottom_space) {
  if(empty($bottom_space)) return null;
  $style = 'style="';
  $style .= 'margin-bottom:' . $bottom_space;
  $style .= '"';
  return $style;
};
// アイコン判定出力
function icon_render($icon, $block_name) {
  if(empty($icon)) return null;
  if($block_name === "core/heading") {
    return '<i class="' . $icon .' fa-4x"></i>';
  }
  if($block_name === "core/paragraph") {
    return '<i class="' . $icon .' fa-3x"></i>';
  }
}

function core_expantion_render( $block_content, $block ) {
  $front_icon   = @$block['attrs']['frontIcon'];
  $end_icon     = @$block['attrs']['endIcon'];
  $bottom_space = @$block['attrs']['bottomSpace'];
  //段落と見出しのみに追加する
  if ( $block['blockName'] === 'core/paragraph' || $block['blockName'] === "core/heading" ) :
    // カスタム属性がなければreturn
    if(!empty($fornt_icon) || !empty($end_icon) || !empty($bottom_space)) :
      $content =
        '<div class="' . wrap_classname($front_icon, $end_icon).
        '"' . margin_style(@$bottom_space) .'>';
        $content .= icon_render($front_icon, $block['blockName']);
        $content .= $block_content .
        icon_render($end_icon, $block['blockName']) .
      '</div>';
      return $content;
    endif;
  endif;
  return $block_content;
}
if(!is_admin()) {
  add_filter( 'render_block', 'core_expantion_render', 8, 2 );
}