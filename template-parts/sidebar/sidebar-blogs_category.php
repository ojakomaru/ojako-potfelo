<section class="submenu catlist">
  <h2>カテゴリーを選ぶ</h2>
  <?php if(is_active_sidebar('oja_cat-side-widget-area')): ?>
    <?php dynamic_sidebar('oja_cat-side-widget-area'); ?>
  <?php endif; ?>
  <div class="category_list">
    <?php
    $categories = get_categories(array('taxonomy' => 'oja_cat'));
    if (!empty($categories)) :?>
    <select name="dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
      <option value="" selected="selected">カテゴリーを選択</option>
      <?php foreach ( $categories as $category ): ?>
      <option value="<?php echo esc_url( get_category_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></option>
      <?php endforeach; ?>
    </select>
  </div>

</section>
<?php endif; ?>