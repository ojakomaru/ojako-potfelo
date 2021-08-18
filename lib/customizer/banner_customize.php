<?php
/**
 * バナー画像を管理画面で設定する
 */
function banner_customizer( WP_Customize_Manager $wp_customize ) {

	$wp_customize->add_panel( 'banners', array(
		'title' => 'バナー画像',
		'priority' => 140,
	) );

	foreach ( range( 1, 3 ) as $index ) {
		$id = 'banner_' . $index;

		$wp_customize->add_section( $id, array(
			'title' => sprintf( 'Banner %s', $index ),
			'panel' => 'banners',
		) );

		$wp_customize->add_setting( $id, array(
			'default'           => '',
      'type'              => 'theme_mod',
			'sanitize_callback' => 'esc_url',
			'transport'         => 'postMessage',
		) );

		$wp_customize->selective_refresh->add_partial( $id, array(
			'selector'            => '#'.$id,
      'container_inclusive' => false,
			'render_callback'     => 'banner_render'
		) );

		$control = new WP_Customize_Image_Control( $wp_customize, $id, array(
				'label'    => 'バナーをアップロード',
				'section'  => $id,
			)
		);
		$wp_customize->add_control( $control );
	}
}

function banner_render($id) {
  $image = null;
  $image = get_theme_mod( $id );
  if ( $image ): ?>
    <img src="<?php echo esc_url( $image ); ?>" alt="">
  <?php
  endif;
}