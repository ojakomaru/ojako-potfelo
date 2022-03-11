<?php
/*
Template Name: サービスページ
*/
?>
<?php get_header(); ?>
<?php $page = get_post(); ?>
<section class="key_visual" id="key_visual">

  <div id="taxonomy-text">サービスの特徴</div>
  <div class="page-title">
    <h1 id="animation-text">WordPressサイト制作オプション一切なし１万円から！</h1>
  </div><!-- welcome-text -->
	<div class="mask"></div>
</section><!-- key_visual -->

<div class="container <?php echo layout_classname($page->post_name); ?>">
  <main class="main">
    <section class="intro" id="intro">
      <h2 id="proposing_1" class="belief_text">ホームページを作りたいとお考えの方へのお願いです、、</h2>
      <div class="intro_text">
        <p>
          必ず他の制作会社、大手企業や中小規模制作会社、あるいはマーケティング会社・コンサルタントなどと相見積もりをお願いした上で、比較検討をお願いいたします。<br>
          そして、私の提案内容をしっかりと考察頂いた上で、今一度よく考えていただきたい、<br>
          どのようなサイトを作りたいのか？<br>
          どのようにサイトを運営、管理するのか？<br>
          それらをしっかりと踏まえ私にご相談下さい。
        </p>
      </div>
    </section>
    <section class="suggest">
      <h2 id="proposing_2" class="belief_text">私が提案するのは共に創り上げていく成長するサイト</h2>
      <p>
        私が制作するのはＣＭＳであるWordPressでの実装です。<br>
        このシステムはブログを筆頭に更新性のあるサイトを専門知識なしに自由に一切の縛りなく利用できるためお客様のやりたいことを限りなく実現できます。<br>
        その象徴とも言える数々の機能は、<br>
        一般的な制作会社では通常オプションとして扱われることが多いですが<br>
        私が制作する場合は、もっと自由な提案。
      </p>
      
      <ul class="wp_column">
        <li class="suggest_item">
          <div class="img_wrap sequential"><img src="<?php echo get_template_directory_uri(); ?>/img/custom_field.jpg" alt="カスタムフィールドイメージ画像"></div>
          <div class="suggest_text">
            <h2 class="sequential">カスタムフィールド無制限追加</h2>
            <p class="sequential">
              カスタムフィールドとはWordPressの管理画面からページの内容を書き換える事ができるフィールドの事です。<br>
              更新性がある記事や商品で例えば「価格」や、「取引先会社」など変更がありそうなフィールドに対して簡単に誰でも、内容を置き換えることが可能になります。<br>
              それはテキストだけでなく画像やURL、やリンクももちろん動的に変更可能になるフィールドを設定することです。<br>
              このフィールドによりデザインが崩れることなく好きなように内容を書き換えることが可能になります。<br>
              どの様にフィールドを扱うか、是非ご相談下さい。
            </p>
          </div>
        </li>

        <li class="suggest_item">
          <div class="img_wrap sequential"><img src="<?php echo get_template_directory_uri(); ?>/img/plug_in.jpg" alt="プラグイン画像"></div>
          <div class="suggest_text">
            <h2 class="sequential">プラグインいくら追加しても無料</h2>
            <p class="sequential">
              プラグインとはWordPressにさらに機能を追加していくことができるもので、<br>
              まるでスマホのアプリのインストールをするかのごとく簡単に行えるのですが、<br>
              それをデザインへと落とし込んだり実際にページに実装する際にはある程度の専門知識が必要なことと、<br>
              便利だからとあまりたくさん入れてしまうとプラグイン同士が干渉し合ったりしてうまく動作しないどころかエラーで動かなくなることもあるため、<br>
              プラグインに関しても私がすべて設定したいと思います。
            </p>
          </div>
        </li>

        <li class="suggest_item">
          <div class="img_wrap sequential"><img src="<?php echo get_template_directory_uri(); ?>/img/admin.jpg" alt=""></div>
          <div class="suggest_text">
            <h2 class="sequential">管理画面のカスタムOK</h2>
            <p class="sequential">
              WordPressの管理画面も随所に変更が効きます。<br>使わない機能を削除したり、UIを見やすくして更新作業のヒューマンエラー対策としたりすることが可能です。<br> 簡単な変更点などはすぐに取りかかれますが大掛かりなもの、に関しては別途ご提案もあるためご相談下さい。
            </p>
          </div>
        </li>
      </ul><!--wp_column-->
    </section>

    <div class="worry_img">
      <img src="<?php echo get_template_directory_uri(); ?>/img/nayami.jpg" alt="心配する様子の画像">
      <div class="worry">実装後のメンテナンスは？</div>
      <div class="worry">私にもできるかしら？</div>
    </div>
    <p class="worry_text">
      とここまで聞いて心配になってくるのが、<br>
      運営してく上でのトラブル時の対応や、<br>集客やマーケティング・コンサルタントなどの、公開後のことが気になります。<br>
      企業ホームページは5年10年と長期にわたって運用するものです。<br>
      小さな会社や、小さな委託型コンサルタントなどは、<br>
      「納品（公開後）のアフターフォローを一切行いません。」といった契約書を交わすとこもあれば、最悪の場合制作会社が倒産などで夜逃げ同然の状態に陥り、<br>
      丹精込めて育て上げたホームページのデータを失ったなどの事例もあるようです。
    </p>
    
    <h3><strong>ご安心下さい</strong></h3>
    <section class="after_follow" id="after_follow">
      <div class="after_item">
        <div class="img_wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/movi_resson.jpg" alt="初心者に優しい画像"></div>
        <div class="after_text">
          <h2>CMSの使い方動画・サーバー契約の手順動画贈呈</h2>
          <p>
            わかりやすい説明書となるマニュアルを動画として進呈します。
            基本的な更新方法やコンテンツの追加方法などを載せてあります。<br>
            また、ご契約頂いた方でサーバーなどの契約方法などがわからない方向けの動画もご用意しております。
          </p>
        </div>
      </div>

      <div class="after_item">
        <div class="img_wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/wakaba.jpg" alt="初心者に優しい画像"></div>
        <div class="after_text">
          <h2>わからないことへの電話対応、ズーム対応にも親切に</h2>
          <p>
            メッセージはもちろん、電話やズーム対応など即時動けるようにしておきます。<br>
            お気軽にご連絡下さい。<br>
            それでもうまく伝わらない、また貴社様の更新の担当者が退職などで引き継ぎが必要な場合などございましたら、<br>
            ご相談くだされば訪問レクチャーサービスも検討いたします。
          </p>
        </div>
      </div>

      <div class="after_item">
        <div class="img_wrap"><img src="<?php echo get_template_directory_uri(); ?>/img/update.jpg" alt="初心者に優しい画像"></div>
        <div class="after_text">
          <h2>WEBサイトの定期更新お声がけします</h2>
          <p>
            お客様のお手元で簡単に更新できるように設計しますが、
            プログラミングコードなども数年経てば移りゆくもので、<br>
            最新のロジック、ベストプラクティスへと更新する必要があります。<br>
            そうした専門的な更新作業もぜひお任せ下さい。
          </p>
        </div>
      </div>
    </section>

  </main><!--main-->
</div>
<div class="container">
<?php get_footer(); ?>
