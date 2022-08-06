<?php
add_action( 'admin_menu', 'add_admin_mokuzi_menu' );
/**
 * 「設定」にメニューを追加
 */
function add_admin_mokuzi_menu() {
  add_options_page(
    '目次設定', // 設定画面のページタイトル.
    '目次の設定', // 管理画面メニューに表示される名前.
    'manage_options',
    'oja_mokuzi_setup', // メニューのスラッグ.
    'oja_mokuzi_setup_page' // メニューの中身を表示させる関数の名前.
  );
}

/**
 * メニューページの中身を作成
 */
function oja_mokuzi_setup_page() {
  // 権限チェック.
  if ( ! current_user_can( 'manage_options' ) ) {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  }
  ?>
  <div class="mokuzi_setting_wrap">
    <h1>オリジナルメニュー</h1>
  </div>
  <?php
}