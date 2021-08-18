<section class="submenu taglist" id="taglist">
  <h2>タグ一覧</h2>
  <?php if(is_active_sidebar('oja_tags-side-widget-area')): ?>
    <?php dynamic_sidebar('oja_tags-side-widget-area'); ?>
  <?php endif; ?>
  <ul class="tag_list">
    <?php $args = [
      'title_li' => '',
      'show_count' => false,
      'depth' => true,
      'hide_empty' => true,
      'number' => '',
      'taxonomy' => 'oja_tags'
    ];
    wp_list_categories($args); ?>
  </ul>
</section>