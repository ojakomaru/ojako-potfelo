<?php

// ナビメニューの登録
function register_my_menus() {
  register_nav_menus( array(
  //'「メニューの位置」の識別子' => 'メニューの説明の文字列',
    'header-menu' => 'Header Menu',
    'footer-menu'  => 'Footer Menu',
    'sidebar-menu' => 'Sidebar Menu',
  ) );
}
add_action( 'after_setup_theme', 'register_my_menus' );

// ナビメニューのHTMLと階層構造の登録
class custom_walker_nav_menu extends Walker_Nav_Menu {
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';
		$classes     = empty( $item->classes ) ? array() : (array) $item->classes;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';
		$output     .= $indent . '<li id="menu-item-' . $item->ID . '"' . $value . $class_names . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
		$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
		$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
		$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

		$prepend     = '<strong class="gMenu_name">';
		$append      = '</strong>';
		$description = ! empty( $item->description ) ? '<div class="active_headwrap"><span class="gMenu_description">' . esc_attr( $item->description ) . '</span></div>' : '';

		if ( $depth != 0 ) {
			$description = $append = $prepend = '';
		}
		$item_output  = $args->before;
		$item_output .= '<a' . $attributes . '>';
		$item_output .= $args->link_before . $prepend . apply_filters( 'the_title', $item->title, $item->ID ) . $append;
		$item_output .= $description . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

  function start_lvl(&$output, $depth = 0, $args = array()) {
    $output .= '<div class="header-nav-child"><ul class="sub-menu">';
  }
  function end_lvl(&$output, $depth = 0, $args = array()) {
    $output .= '</ul></div>';
  }
}

if ( ! function_exists( 'oja_widgets_init' ) ) {
	function oja_widgets_init() {
		// sidebar widget area
		register_sidebar(
			array(
				'name'          => 'サイドバー（トップ）',
				'id'            => 'sidebar-maintop-widget-area',
        'description'   => 'メインのサイドバー最上部にウィジェットエリアを追加します。',
				'before_widget' => '<aside class="widget %2$s" id="%1$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h1 class="widget-subSection">',
				'after_title'   => '</h1>',
			)
		);
    register_sidebar(
      array(
        'name'          => 'サイドバー（下部 )',
        'id'            => 'side-bottom-widget-area',
        'description'   => 'メインのサイドバー下部にウィジェットエリアを追加します。',
        'before_widget' => '<aside class="widget %2$s" id="%1$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-subSection">',
        'after_title'   => '</h1>',
      )
    );
    register_sidebar(
      array(
        'name'          => 'サイドバー（お知らせ)',
        'id'            => 'news-side-widget-area',
        'description'   => 'サイドバー上のお知らせエリアにウィジェットエリアを追加します。',
        'before_widget' => '<aside class="widget %2$s" id="%1$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-subSection">',
        'after_title'   => '</h1>',
      )
    );

		// Sidebar( タクソノミー別 )
		$postTypes = get_post_types( array( 'public' => true ),'names' );
		foreach ( $postTypes as $postType ) {
      if ( $postType === 'post') {
        continue;
      }
      $taxonomies = get_object_taxonomies( $postType, 'objects' );
			if ( $taxonomies ) {
        foreach ( $taxonomies as $taxonomy_slug => $taxonomy ) {
				$taxonomy_name = esc_html( $taxonomy->label );
        $postType_name = esc_html( get_post_type_object( $postType )->labels->name);

				$sidebar_description = '';
        $sidebar_description = sprintf(
          'このウィジェット領域は、「%s」の%sコンテンツに表示されます。' , $postType_name , $taxonomy_name );

				register_sidebar(
					array(
						'name'          => sprintf('%sサイドバー(%s)',$postType_name , $taxonomy_name),
						'id'            => $taxonomy_slug . '-side-widget-area',
						'description'   => $sidebar_description,
						'before_widget' => '<aside class="widget %2$s" id="%1$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h1 class="widget-subSection-title">',
						'after_title'   => '</h1>',
					)
				);
      } //foreach ( $taxonomies as $taxonomy_slug => $taxonomy )
			} // if($taxonomies){
		} // foreach ($postTypes as $postType) {

		// メインコンテンツTOPエリア
    register_sidebar(
      array(
        'name'          => 'メインコンテンツTOP',
        'id'            => 'main-content-top-widget-area',
        'description'   => 'メインのコンテンツの最上部にウィジェットエリアを追加します。',
        'before_widget' => '<div class="widget %2$s" id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="mainSection-title">',
        'after_title'   => '</h2>',
      )
    );

		// フッター上部エリア
    register_sidebar(
      array(
        'name'          => 'フッター上部エリア',
        'id'            => 'footer-upper-widget',
        'description'   => 'フッターエリアの最上部にウィジェットエリアを追加します。',
        'before_widget' => '<aside class="widget %2$s" id="%1$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h1 class="widget-footer-top-title">',
        'after_title'   => '</h1>',
      )
    );

    // フッターエリア X 3
    $widget_area_count = 3;
		for ( $i = 1; $i <= $widget_area_count; ) {
			register_sidebar(
				array(
					'name'          => 'フッターウィジェットエリア' . ' ' . $i,
					'id'            => 'footer-widget-' . $i,
          'description'   => 'フッターエリア'.$i.'にウィジェットエリアを追加します。',
					'before_widget' => '<aside class="widget %2$s" id="%1$s">',
					'after_widget'  => '</aside>',
					'before_title'  => '<h1 class="widget-footer-title">',
					'after_title'   => '</h1>',
				)
			);
			$i++;
		}
	}
} // if ( ! function_exists( 'oja_widgets_init' ) ) {
add_action( 'widgets_init', 'oja_widgets_init' );