<?php if(is_active_sidebar('sidebar-maintop-widget-area')): ?>
  <?php dynamic_sidebar('sidebar-maintop-widget-area'); ?>
<?php endif; ?>
<section class="submenu" id="pc_nav">
  <h2>本サイトの目録</h2>
  <dl>
    <a href="<?php echo home_url('company');?>">
      <dt>わたしが創ります</dt>
    </a>
    <a href="<?php echo home_url('company');?>#profile">
      <dd>ー  製作者のご紹介</dd>
    </a>
    <a href="<?php echo home_url('company');?>#skill_graph">
      <dd>ー  能力レベル表</dd>
    </a>
    <a href="<?php echo home_url('company');?>#history">
      <dd>ー  学習遍歴</dd>
    </a>
    <a href="<?php echo home_url('company');?>#wp_recommend">
      <dd>ー  WordPress紹介</dd>
    </a>
    
    <a href="<?php echo home_url('service');?>">
      <dt>サービス紹介</dt>
    </a>
    <a href="<?php echo get_post_type_archive_link('works'); ?>">
      <dd>ー  制作実績</dd>
    </a>
    <a href="<?php echo home_url('service');?>/#after_follow">
      <dd>ー  公開した後も安心</dd>
    </a>
    
    <a href="<?php echo home_url('/blogs/'); ?>">
      <dt>ブログ</dt>
    </a>
    <a href="<?php echo home_url('/blogs/'); ?>#new_blog">
      <dd>ー  新着記事</dd>
    </a>
    <a href="<?php echo home_url('/blogs/'); ?>#modal_open">
      <dd>ー  条件絞り込み検索</dd>
    </a>

    <a href="<?php echo home_url(''); ?>">
      <dt>ホーム</dt>
    </a>
    <a href="<?php echo home_url(''); ?>#greeting">
      <dd>ー  ご挨拶</dd>
    </a>
    <a href="<?php echo home_url(''); ?>#philosophy">
      <dd>ー  制作理念</dd>
    </a>

    <a href="<?php echo home_url('/contact/');?>">
      <dt>お問い合わせ</dt>
    </a>

  </dl>
</section><!-- submenu -->

<div class="hisi_loop"></div><!-- hisi_loop -->

<?php if(is_active_sidebar('side-bottom-widget-area')): ?>
		<?php dynamic_sidebar('side-bottom-widget-area'); ?>
<?php endif; ?>