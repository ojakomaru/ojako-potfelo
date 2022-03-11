<div class="two_column">
  <div class="pc_frame">
    <div class="frame">
      <iframe is="x-frame-bypass" src="<?php the_field('link'); ?>" width="1280" height="800" title="PC画面"></iframe>
    </div>
  </div><!-- pc_frame -->
  <div class="main_item_text">
    <h3><?php the_field('client'); ?></h3>
    <dl class="item_about">
      <dt>制作費用</dt>
      <dd>約<?php the_field('price'); ?>円</dd>
      <dt>制作期間</dt>
      <dd><?php the_field('period'); ?></dd>
    </dl>
    <?php if ($terms = get_the_terms($post->ID,'production')) :
      echo ('<h2>');
      echo esc_html($terms[0]->name);
      echo ('</h2>');
    endif; ?>
  </div><!--main_item_text-->
</div>
<div class="two_column column_reverse">
  <div class="sp_frame">
    <div class="frame">
      <iframe is="x-frame-bypass" src="<?php the_field('link'); ?>  " width="385" height="667" title="スマホ画面"></iframe>
      </div>
    </div><!-- sp_frame -->
    <div class="main_item_text">
      <h1><?php the_field('title'); ?></h1>
      <?php if (is_post_type_archive('works') || is_tax('production')) :
        echo ('<p>');
        the_excerpt();
        echo ('</p>');
      elseif(is_singular('works')):
        the_content();
        echo ('<a href="').get_field('link').('" class="original" target="_blank" rel="noopener noreferrer">');
        echo esc_url(the_field('link'));
        echo ('</a>');
      else:?>
      <p>詳細はありません</p>
      <?php endif; ?>
    </div>
</div>