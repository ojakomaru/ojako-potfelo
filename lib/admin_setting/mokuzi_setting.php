<?php
/**
 * 「設定」にメニューを追加
 */
add_action( 'admin_menu', 'add_admin_mokuzi_menu' );
function add_admin_mokuzi_menu() {
  add_options_page(
    '目次設定', // 設定画面のページタイトル.
    '目次の設定', // 管理画面メニューに表示される名前.
    'manage_options',
    'oja_mokuzi_setup', // メニューのスラッグ.
    'oja_mokuzi_setup_page' // メニューの中身を表示させる関数の名前.
  );
  add_action('admin_init', 'register_custom_setting');
}

/**
 * メニューページの中身を作成
 */
$selected_mokuzifont = [
  ['value' => 'gothick', 'content' => 'デフォルト(ゴシック体)'],
  ['value' => 'helvetica', 'content' => 'Helvetica'],
  ['value' => 'noto-sans-jp', 'content' => 'Google Noto Sans'],
  ['value' => 'minchou', 'content' => '明朝体'],
];
$selected_mokuzicolor = [
  ['value' => 'sunny-blue', 'color' => 'サニーブルー'],
  ['value' => 'citrus', 'color' => 'シトラス'],
  ['value' => 'fanny', 'color' => 'ファニー'],
  ['value' => 'modan', 'color' => 'モダン'],
  ['value' => 'cool', 'color' => 'シック'],
];
$selected_mokuzidesign = [
  ['value' => 'circle', 'design' => 'かわいい (デフォルト)'],
  ['value' => 'sinple', 'design' => 'シンプル'],
  ['value' => 'sharp', 'design' => 'シャープ'],
  ['value' => 'coolish', 'design' => 'クール'],
];
function oja_mokuzi_setup_page() {
  // 権限チェック.
  if ( ! current_user_can( 'manage_options' ) ) {
    wp_die('You do not have sufficient permissions to access this page.' );
  }
  ?>
  <div class="wrap">
  <h2>おジャコの目録いじり</h2>
  <form method="post" action="options.php" enctype="multipart/form-data" encoding="multipart/form-data">
    <?php
    settings_fields('oja_mokuzi_group');
    do_settings_sections('oja_mokuzi_group'); ?>
    <div class="metabox-holder">
      <div class="postbox ">
        <h2 class='hndle'><span>基本設定</span></h2>
        <div class="inside">
          <h3>タイトル設定</h3>
          <p class="setting_description">目次のタイトルテキストを入力してください。</p>
          <p><input type="text" id="text" name="mokuzi_text" placeholder="Contents" value="<?php echo get_option('mokuzi_text'); ?>"></p>
          <h3>表示条件</h3>
          <p class="setting_description">見出しが個から目次を表示
            <input type="number" min="2" max="10" id="number" name="mokuzi_number" value="<?php echo get_option('mokuzi_number'); ?>"/>
          </p>
        </div>
      </div>
      <div class="postbox ">
        <h2 class='hndle'><span>デザイン設定</span></h2>
        <div class="inside">
          <h3>書式設定</h3>
          <p class="setting_description">目次の書式を選択してください。</p>
          <select name="mokuzi_select" id="select">
            <?php
            global $selected_mokuzifont;
            foreach ($selected_mokuzifont as $style) {
              echo '<option value="'. $style['value'] .'"'. selected($style['value'], get_option('mokuzi_select')).'>'.$style['content'].'</option>';
            } ?>
          </select>
          <h3>目次のテーマカラー</h3>
          <p class="setting_description">カラーテーマを選択してください。</p>
          <ul>
            <?php
            global $selected_mokuzicolor;
            foreach($selected_mokuzicolor as $color) {
              echo '<li><label><input name="mokuzi_color" type="radio" value="'.$color['value'].'"'.checked($color['value'], get_option('mokuzi_color'), false).'/>'.$color['color'].'</label></li>';
            } ?>
          </ul>
          <h3>目次のデザイン</h3>
          <p class="setting_description">デザインテーマを選択してください。</p>
          <ul>
            <?php
            global $selected_mokuzidesign;
            foreach($selected_mokuzidesign as $design) {
              echo '<li><label><input name="mokuzi_design" type="radio" value="'.$design['value'].'"'.checked($design['value'], get_option('mokuzi_design'), false).'/>'.$design['design'].'</label></li>';
            } ?>
          </ul>
        </div>
      </div>
      <div class="postbox ">
        <h3 class='hndle'><span>目次に戻るボタン</span></h3>
        <div class="inside">
          <p class="setting_description">目次に戻るボタンを表示する場合チェックを入れてください。</p>
          <label><input name="mokuzi_showcheck" id="checkbox1" type="checkbox" value="1" <?php checked(1, get_option('mokuzi_showcheck')); ?> />目次に戻るボタン</label>
        </div>
      </div>
    </div>
    <?php submit_button(); ?>
  </form>
</div>
  <?php
}

/**
 * 設定値を登録保存処理
 */
function register_custom_setting() {
  register_setting('oja_mokuzi_group', 'mokuzi_text');
  register_setting('oja_mokuzi_group', 'mokuzi_number');
  register_setting('oja_mokuzi_group', 'mokuzi_select');
  register_setting('oja_mokuzi_group', 'mokuzi_color');
  register_setting('oja_mokuzi_group', 'mokuzi_design');
  register_setting('oja_mokuzi_group', 'mokuzi_showcheck');
  // 初期値の設定
  add_option('mokuzi_text', 'Content');
  add_option('mokuzi_number', '2');
  add_option('mokuzi_select', 'gothick');
  add_option('mokuzi_color', 'sunny-blue');
  add_option('mokuzi_design', 'circle');
  add_option('mokuzi_showckeck', false);
}
