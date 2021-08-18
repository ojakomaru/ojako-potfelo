<?php

function oja_theme_customize($wp_customize) {
  home_customizer( $wp_customize );
  about_customizer( $wp_customize );
  built_in_customizer ( $wp_customize );
  banner_customizer( $wp_customize );
  design_customizer( $wp_customize );
}
add_action('customize_register', 'oja_theme_customize');

function about_customizer($wp_customize) {

  //セクション設定
  $section_name = "about_section";
  $wp_customize->add_section(
    $section_name,
    [
      'title'           => '制作者ページ',
      'priority'        => 1,
      'description'     => '制作者ページの内容をカスタマイズ',
      'active_callback' => function () {
        return is_page('company');
      }
    ]
  );
  //各フィールドのオプション設定を格納しておく
  $fields = [
    'creator_name' => [
      'label'             => '制作者名',
      'type'              => 'text',
      'default'           => 'おジャコについて',
      'sanitize_callback' => 'sanitize_text_field'
    ],
    'oja_birth_place' => [
      'label'             => '出身地',
      'type'              => 'text',
      'default'           => '岐阜県羽島市',
      'sanitize_callback' => 'sanitize_text_field'
    ],
    'creator_email' => [
      'label'             => '連絡先',
      'type'              => 'email',
      'default'           => 'youthfulday8348.@ojako1012.com',
      'sanitize_callback' => 'sanitize_email'
    ],
    'ojako_url' => [
      'label'             => 'オフィシャルサイトURL',
      'type'              => 'url',
      'default'           => 'https://ojako1012.com/',
      'sanitize_callback' => 'esc_url_raw'
    ],
    'ojako_business' => [
      'label'       => '事業内容',
      'type'        => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default'     => "職業 ： 良き夫｜WEBデザイナー｜飛行機を作る人"
    ],
    'about_summary' => [
      'label'       => 'おジャコについて：概要',
      'type'        => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default'     => "昭和生まれのゆとり世代。勉強は苦手
        安定を求めて製造業勤務に務めて十年
        運動以外は基本的に何でも得意で非常に好奇心旺盛な性格
        しかし35歳になるまでなぜかIT業界に興味を持つどころか、パソコンすら触った事がなかった、、
        昔からゲームなどが得意分野でプログラミングもゲーム感覚で楽しみながら日々精進できる
        よく喋り、よく動き、よく食べる。"
    ],
    'skill_map_title' => [
      'label'       => 'スキルグラフコンテンツ：タイトル',
      'type'        => 'text',
      'default'     => '能力レベルマップ',
      'sanitize_callback' => 'sanitize_text_field'
    ],
    'html_record' => [
      'label'             => 'HTML学習遍歴',
      'type'              => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default'           => 'HTMLとは、Webページの記述言語です。
        HTMLのルールに従って記述されたテキストファイルをブラウザが読み込むことで、Webページを表示させることができます。
        コンピューターがそのWebページを読み込むということは検索エンジンにもその作用が働きます。これがいわゆる「SEO」と呼ばれるもので、
        SEOとは、検索したユーザの求めるものにより即した検索結果を表示する技術や概念の事です。
        HTMLの正しい文章構造にそって作り込むことでページは検索結果上位に反映されやすすることが可能です。'
    ],
    'css_record' => [
      'label'             => 'CSS学習遍歴',
      'type'              => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default'           => 'CSSとはWebサイトの基本的なテキストを形作るHTMLに対して、CSSは見た目を作る言語、つまりWebページのスタイルを指定するための言語です。
      CSSを用いれば、HTMLで記述した文字の色を変更したり、レイアウトを整える事が可能になります。さら3D表現やアニメーション、音声デバイスや点字デバイスに対応するなどよりWebサイトをマルチに彩る事が可能です。
      近年のCSSの進化はめざましく、下記のjavascriptを多用するよりCSSでの可能性を模索する方がUXの向上（ユーザーの体験）に優れていると考えております。'
    ],
    'javascript_record' => [
      'label'             => 'JavaScript学習遍歴',
      'type'              => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default'           => 'JavaScriptとはブラウザを「動かす」ためのプログラム言語です。マウスを乗せる、画面をスクロールする、入力に対してポップアップを表示する。それぞれのタイミングで「動く」ために、指示を出しているプログラミング言語がJavaScriptです。
      そんなJavaScriptですが非常に奥が深く、簡単なブラウザ操作やアニメーションなどから、データのやり取り、アプリ開発まで多岐にわたり活躍するため、まだまだ網羅しきれておらず、可能性を広げるために日々勉強中でございます。
      JavaScriptを簡単に使用できるようにキットされた「jQuery」はあまり使用しませんが読み書きは問題ありません。'
    ],
    'wordpress_record' => [
      'label'             => 'WordPress学習遍歴',
      'type'              => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default'           => 'WordPressは今閲覧いただいているこのサイトを構築しているMicrosoft社が開発したソフトウェアです。下記に特徴をまとめております。ご一読くだされば幸いです。'
    ],
    'php_record' => [
      'label'             => 'PHP学習遍歴',
      'type'              => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default'           => 'WordPressではPHPプログラムが動作してHTMLファイルを生成します。このHTMLを生成するときにPHPはデータベースと呼ばれる情報の保管庫へデータを取りに行きます。
      データベースには日々、投稿した記事の本文や投稿日時、本文のバックアップなどが格納されています。
      こうしたデータのやり取りを扱う言語です。
      WordPressのコアを支える縁の下の力持ち、まさしく大黒柱であるため、
      WordPressでのPHPを扱えることによりオリジナリティに溢れた、更新性もあって管理しやすいクライアント様に優しいWebサイトが創れます。'
    ],
    'frame_work_record' => [
      'label'             => 'フレームワーク学習遍歴',
      'type'              => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default'           => ' Webデザインにおけるフレームワークとは、Webページを作るのに必要な素材をあらかじめ何パターンか用意した有名なBootstrapから、先述したCSSを簡潔に実装できるようにしたSCSSなどを学びました。
      これらを使用するメリットは大きく、メンテナンス性の向上から、制作工数の削減、チームで開発する際の一貫性など、多数のメリットが挙げられます。
      デメリットももちろんあります。これに頼りすぎると他所と同じような似たりよったりのデザインになったり、使用ファイルが多くなるとサイト自体が重くなったりなどが挙げられますが理想の表現には欠かせない存在であるためしっかりと勉強した上で酸いも甘いも噛み分けた提案を盛り込みたいと思います。'
    ],
  ];
  //セクションにフォームコントロールを追加
  add_customizer_contol($wp_customize, $fields,$section_name);
}


function add_customizer_contol($wp_customize, $fields, $section_name) {
  foreach ((array)$fields as $id => $value) {
    $default = !empty($value["default"]) ? $value["default"] : null;
    $wp_customize->add_setting( $id, array(
        "default"           => $default,
        'type'              => 'theme_mod',
        'capability'        => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => !empty($value['sanitize_callback']) ? $value['sanitize_callback'] : null
      )
    );
    $wp_customize->selective_refresh->add_partial( $id,
      [
        'selector'            => "#${id}_customizer",
        'container_inclusive' => false,
        'render_callback'     => function ($partial = null) {
          return nl2br(get_theme_mod($partial->id));
        }
      ]
    );
    $wp_customize->add_control(
      new WP_Customize_Control(
        $wp_customize,"${section_name}_${id}",
        [
          'settings'    => $id,
          'label'       => $value['label'],
          'section'     => $section_name,
          'type'        => !empty($value['type']) ? $value['type'] : 'textarea',
          'description' => !empty($value['description']) ? $value['description'] : null,
          'choices'     => !empty($value['choices']) ? $value['choices'] : null
        ]
      )
    );

  }//foreach ($fields as $id => $value)
}

