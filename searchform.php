<!-- 記事内検索フォーム -->
<form action="<?php echo home_url('/'); ?>" method="GET">
  <div class="search">
    <input type="text" name="s" value="<?php the_search_query();?>" placeholder="キーワードを入力">
  </div>
  <input type="hidden" name="post_type" value="production">
  <input type="hidden" name="post_type" value="oja_tags">
  <input type="hidden" name="post_type" value="oja_cat">
</form>


