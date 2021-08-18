<?php
function design_customizer($wp_customize) {
  //セクション設定
  $section_name = "design_section";
  $wp_customize->add_section(
    $section_name,
    [
      'title'           => 'サイトデザインカスタム',
      'priority'        => 1,
      'description'     => 'サイトのレイアウトやサイドバーの表示設定をカスタマイズします',
    ]
  );

  // 投稿タイプ取得
  $postTypes = get_post_types( array( 'public' => true ),'names' );
  $fields = array();
  foreach ( $postTypes as $postType ) :
    // タクソノミー取得
    $taxonomies = get_object_taxonomies( $postType, 'objects' );
    // 固定ページ取得
    $page_list = get_pages();

    if ( $taxonomies || $page_list ) {
      foreach ( $taxonomies as $taxonomy_slug => $taxonomy ) {
        foreach ( $page_list as $page_item ) {
          $page_title = $page_item->post_title;
          $page_slug = $page_item->post_name;
          $taxonomy_name = esc_html( $taxonomy->label );
          $postType_name = esc_html( get_post_type_object( $postType )->labels->name);
          $postType_slug = get_post_type_object($postType)->name;
          
          if ( $postType_slug === 'post' ||
                $postType_slug === 'category' ||
                $postType_slug === 'post_tag') {
            continue;
          }
          $fields[$postType_slug] = array (
          'label'             => $postType_name.'ページ',
          'default'           => 'column2',
          'sanitize_callback' => 'sanitize_text_field',
          'type'              => 'select',
          'choices'           => array (
            'column1'          => '１カラム（コンテンツの下部にサイドバー）',
            'column1_noside'   => '１カラム（コンテンツ：サイドバーなし）',
            'column2'          => '２カラム（コンテンツ：サイドバーあり）'
            )
          );
          if ( $taxonomy_slug === 'post_format') {
            continue;
          }
          $fields[$taxonomy_slug] = array (
            'label'             => $taxonomy_name.'ページ',
            'default'           => 'column2',
            'sanitize_callback' => 'sanitize_text_field',
            'type'              => 'select',
            'choices'           => array (
              'column1'         => '１カラム（コンテンツの下部にサイドバー）',
              'column1_noside'  => '１カラム（コンテンツ：サイドバーなし）',
              'column2'         => '２カラム（コンテンツ：サイドバーあり）'
            )
          );
          if ( $page_slug === 'service') {
            continue;
          }
          $fields[$page_slug] = array (
            'label'             => $page_title.'ページ',
            'default'           => 'column1_noside',
            'sanitize_callback' => 'sanitize_text_field',
            'type'              => 'select',
            'choices'           => array (
              'column1'         => '１カラム（コンテンツの下部にサイドバー）',
              'column1_noside'  => '１カラム（コンテンツ：サイドバーなし）',
              'column2'         => '２カラム（コンテンツ：サイドバーあり）'
            )
          );
        } //foreach ( $page_list as $page_item )
      } // foreach ( $taxonomies as $taxonomy_slug => $taxonomy )
  	} // if( $taxonomies || $page_list )
  endforeach;// foreach ($postTypes as $postType) {
  //セクションにフォームコントロールを追加
  add_customizer_contol($wp_customize, $fields,$section_name);
} //function design_customizer($wp_customize)

function layout_classname($id) {
  return esc_attr(get_theme_mod($id));
}