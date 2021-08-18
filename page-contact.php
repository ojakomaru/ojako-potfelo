<?php
/*
Template Name: コンタクトページ
*/
?>
<?php
$kind = array(
  '1' => 'ご質問',
  '2' => 'ご相談',
  '3' => 'ご意見',
  '4' => '資料請求',
  '5' => 'お見積り'
);
session_start();
// モードチェンジ
$mode = 'input';
$err_msg = array();
if ( isset($_POST['back']) && $_POST['back'] ) {
  //何もしない
} else if ( isset($_POST['confirm']) && $_POST['confirm'] ) {
  if (!$_POST['mkind']) {
    $err_msg[] = "種別を選択してください。";
  } else if ( $_POST['mkind'] <= 0 || $_POST['mkind'] >= 5) {
    $err_msg[] = "種別が不正です。";
  }
  $_SESSION['mkind'] = htmlspecialchars($_POST['mkind'], ENT_QUOTES, "UTF-8");
  if (!$_POST['fullname']) {
    $err_msg[] = "名前を入力してください。";
  } else if ( mb_strlen($_POST['fullname']) > 100 ) {
    $err_msg[] = "名前は１００文字以内でご記入ください。";
  }
  $_SESSION['fullname'] = htmlspecialchars($_POST['fullname'], ENT_QUOTES, "UTF-8");
  if (!$_POST['email']) {
    $err_msg[] = "メールアドレスを入力してください。";
  } else if ( mb_strlen($_POST['email']) > 200 ) {
    $err_msg[] = "メールアドレスは２００文字以内でご記入ください。";
  } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $err_msg[] = "メールアドレスは正しくご記入ください。";
  }
  $_SESSION['email'] = htmlspecialchars($_POST['email'], ENT_QUOTES, "UTF-8");
  if ( mb_strlen($_POST['subject']) > 100 ) {
    $err_msg[] = "題名は１００文字以内でご記入ください。";
  }
  $_SESSION['subject']  = htmlspecialchars($_POST['subject'], ENT_QUOTES, "UTF-8");
  if (!$_POST['message']) {
    $err_msg[] = "本文を入力してください。";
  } else if ( mb_strlen($_POST['message']) > 500 ) {
    $err_msg[] = "本文は５００文字以内でご記入ください。";
  }
  $_SESSION['message']  = htmlspecialchars($_POST['message'], ENT_QUOTES, "UTF-8");
  if ($err_msg) {
    $mode = 'input';
  } else {
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;
    $mode = 'confirm';
  }
} else if ( isset($_POST['send']) && $_POST['send'] ) {
  if (!$_POST['token'] || !$_SESSION['token'] || !$_SESSION['email']) {
    $err_msg = '不正な処理が行われたためメールを送信できませんでした。';
    unset($_SESSION);
    $mode = 'input';
  } else if ( $_POST['token'] !== $_SESSION['token']) {
    $err_msg = '問題が発生したためメールを送信できませんでした。';
    unset($_SESSION);
    $mode = 'input';
  } else {
    $message = "お問い合わせを受け付けました。\r\n"
    ."要件の種別：".$kind[$_SESSION['mkind']]."\r\n"
    ."名前：".$_SESSION['fullname']."\r\n"
    ."メールアドレス：".$_SESSION['email']."\r\n"
    ."お問い合わせ内容：\r\n"
    .preg_replace("/\r\n|\r|\n/","\r\n",$_SESSION['message']);
    wp_mail($_SESSION['email'],'お問い合わせありがとうございます',$message);
    wp_mail('youthfulday.8348@gmail.com','お問い合わせを頂きました',$message);
    $mode = 'send';
  }
} else {
  unset($_SESSION);
}

get_header();
?>

<section class="key_visual" id="key_visual">
  <div class="key_movi">
    <video autoplay loop muted  id="bgvid">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/sakuratya.webm" type="video/webm">
      <source src="<?php echo get_stylesheet_directory_uri(); ?>/videos/sakuratya.webm" type="video/mp4">
    </video>

    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div id="taxonomy-text"><?php the_title(); ?></div>
    <div class="welcome-text">
      <h1 id="animation-text"><?php echo strtoupper($post->post_name); ?></h1>
    </div><!-- welcome-text -->

  </div><!--key_movi-->
</section><!-- key_visual -->

<div class="inner <?php echo layout_classname($post->post_name); ?>"><!-- フッターまでつづく -->
<main class="main">
  <?php
  if ($mode == 'input') { ?>
  <!-- 入力画面 -->
  <section class="contact">
  <?php
  if ($err_msg) {
    echo '<div class="err_msg">';
    echo implode('<br>',$err_msg );
    echo '</div>';
  }
  ?>
    <form action="<?php bloginfo("url");?>/contact" method="post" novalidate>
      <div class="form_group">
        <label for="select">ご用件の種別</label>
        <select name="mkind" id="select">
          <option value="" selected="selected">要件を選択して下さい</option>
          <?php foreach ($kind as $key => $title) {
            if ($_SESSION['mkind'] == $key ) { ?>
              <option value="<?php echo $key; ?>" selected="selected"><?php echo $title; ?></option>
            <?php } else { ?>
            <option value="<?php echo $key; ?>"><?php echo $title; ?></option>
          <?php }
        }?>
        </select><br>
      </div>
      <div class="form_group">
        <label for="inputName">お名前</label>
        <p class="require_item">必須</p><br>
        <input type="text" name="fullname" id="inputName" class="form-name" value="<?php echo $_SESSION['fullname'] ?>" autocomplete="name" required autofocus><br>
      </div><!-- form_group -->
      
      <div class="form_group">
        <label for="inputEmail">メールアドレス</label>
        <p class="require_item">必須</p><br>
        <input type="email" name="email" id="inputEmail" class="form_email" value="<?php echo $_SESSION['email']; ?>" autocomplete="email" required><br>
      </div><!-- form_group -->
      
      <div class="form_group">
        <label for="inputSubject">題名</label>
        <p class="any">※任意</p><br>
        <input type="text" name="subject" id="inputSubject" class="form_subject" value="<?php echo $_SESSION['subject']; ?>"><br>
      </div><!-- form_group -->
      
      <div class="form_group">
        <label for="inputContent">お問い合わせ内容</label>
        <p class="require_item">必須</p><br>
        <textarea name="message" id="inputContent" rows="10"><?php echo $_SESSION['message']; ?></textarea><br>
      </div><!-- form_group -->
      
      <div class="form_group">
        <input type="submit" value="確認する" name="confirm">
      </div><!-- form_group -->
    </form>
  </section>

  <?php } else if ( $mode == 'confirm'){ ?>
    <!-- 確認画面 -->
  <section class="confirm">
    <form action="<?php bloginfo("url");?>/contact" method="post" novalidate>
    <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>"/>
      <div class="form_group">
        <label for="select">要件の種別</label>
        <p><?php echo $kind[$_SESSION['mkind']]; ?></p>
      </div><!-- form_group -->

      <div class="form_group">
        <label for="inputName">お名前</label>
        <p><?php echo $_SESSION['fullname']; ?></p>
      </div><!-- form_group -->
      
      <div class="form_group">
        <label for="inputEmail">メールアドレス</label>
        <p><?php echo $_SESSION['email']; ?></p>
      </div><!-- form_group -->
      
      <div class="form_group">
        <label for="inputSubject">題名</label>
        <p><?php echo $_SESSION['subject']; ?></p>
      </div><!-- form_group -->
      
      <div class="form_text">
        <label for="inputContent">お問い合わせ内容</label>
        <p><?php echo nl2br($_SESSION['message']); ?></p>
      </div><!-- form_group -->
      
      <div class="form_group">
        <input type="submit" name="back" value="内容を修正します"/>
        <input type="submit" name="send" value="送信します"/>
      </div><!-- form_group -->
    </form>
  </section>

  <?php } else {?>
    <!-- 送信時の処理 -->
    <div class="active_head">
      <h2 class="text-frame">お問い合わせいただき誠にありがとうございます</h2>
    </div>
    <p>こちらから折り返しご連絡を差し上げます。<br>
      今しばらくお待ち下さい。<br>
      また返信には一日ほど頂く場合もございます。あらかじめご了承くださいませ。
    </p>
    <?php }

    endwhile; endif;?>
</main><!--main-->

<?php
  if (layout_classname($post->post_name) !== 'column1_noside'):
  ?>
    <aside class="aside">
    <?php
    get_sidebar();
    get_template_part('template-parts/sidebar/sidebar-news');
    get_template_part('template-parts/sidebar/sidebar-form');
    get_template_part('template-parts/sidebar/sidebar-blogs');
    ?>
    </aside>
<?php endif;?>

<?php get_footer(); ?>
