<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- metaTags -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Analytics Settings -->
<meta name = "yandex-verification" content = "9047b3dda1ff179f" />
<meta name="google-site-verification" content="kZMO3VWc9vz6WRxT-fnd1YH1NC9XocnKWt7ibFhIqkA" />
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-35CEMB5XPE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-35CEMB5XPE');
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
} else {
	do_action( 'wp_body_open' );
}
?>
<header id="header">
  <?php
  if( display_header_text() ) { oja_custom_title(); }
  ?>

  <?php if ( has_nav_menu( 'header-menu' ) ) : ?>
  <?php wp_nav_menu(
    array(
      'menu'           => 'ojako_main_menu',
      'theme_location' => 'header-menu',
      'container'      => 'nav',
      'container_id'   => 'main_nav',
      'menu_class'     => 'pc_only',
      'walker'         => new custom_walker_nav_menu
    )
  ); ?>
  <?php endif; ?>

   <?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
  <?php wp_nav_menu(
    array(
      'menu'           => 'mobile_menu',
      'theme_location' => 'footer-menu',
      'container'      => 'nav',
      'container_id'   => 'mobile_nav',
      'menu_class'     => 'bottom_nav',
    )
  ); ?>
  <?php endif; ?>

</header>

<!-- トップへ戻るボタン -->
<a href="" class="scroll_top" id="scroll_top">トップへ戻る</a>
<!-- 業務実績リンク -->
<?php
if (is_page('service')) { ?>
  <a href="<?php echo get_post_type_archive_link('works'); ?>" id="product_link">業務実績はこちら</a>
<?php }
?>