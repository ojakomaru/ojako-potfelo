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
  <?php if ( is_active_sidebar( 'footer-upper-widget' ) ) : ?>
    <?php dynamic_sidebar( 'footer-upper-widget' ); ?>
  <?php endif; ?>
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
  <p>《Web Design:Word Press Portfolio Site》</p>
</footer>
<!-- インラインフレームが表示できないサイト用 -->
<script type="module" src="https://unpkg.com/x-frame-bypass"></script>
<?php wp_footer();?><!-- 必ずこの記述をココに！！ -->
</body>
</html>