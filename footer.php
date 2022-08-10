</div><!-- container -->
<!-- パンくずリスト -->
<?php
// if(function_exists( 'yoast_breadcrumb' )){
//   yoast_breadcrumb( '<p id="breadcrumbs">', '</p>');
// }
if ( function_exists( custom_breadcrumb() ) ){
  custom_breadcrumb();
}
?>
<footer>
  <?php
  if ( is_active_sidebar( 'footer-upper-widget' ) ) :
    dynamic_sidebar( 'footer-upper-widget' );
  endif;
  ?>
  <div class="footerMenu">
    <?php
    $footer_widget_area_count = 3;
    for ($i = 1 ; $i <= $footer_widget_area_count; $i++) {
      if ( is_active_sidebar( 'footer-widget-' . $i ) ) {
        dynamic_sidebar( 'footer-widget-' . $i );
      }
    }
    ?>
  </div>
  <p><small>Copyright© ojakomaru1012.</small></p>
  <p>《Web Design:WordPress Portfolio Site》</p>
</footer>
<?php wp_footer();?>
</body>
</html>