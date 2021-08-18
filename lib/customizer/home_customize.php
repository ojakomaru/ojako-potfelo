<?php

function home_customizer( $wp_customize ) {
  //セクション設定
  $section_name = "oja_home_section";
  $wp_customize->add_section($section_name, array (
      "title"           =>  "TOPページカスタムジャコ",
      'description'     => 'ホームコンテンツの内容をカスタマイズ',
      "priority"        =>  1,
      'active_callback' => function () {
        return is_home('');
      }
    )
  );

  $fields = [
    'greeting_text' => [
      'label' => '挨拶文のテキスト',
      'type' => 'text',
      'sanitize_callback' => 'sanitize_text_field',
      'default' => '本サイトを御閲覧いただき誠にありがとうございます'
    ],
    'greeting_textarea' => [
      'label' => '挨拶文イントロテキスト',
      'type' => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default' => 'このデモサイトは、私「おジャコ丸」のポートフェリオサイトであるとともに、
      実際に納品する際の提案事例としてご参考になればと思い、
      私おジャコ丸が全て一人で制作しております。
      そして普段から私自身がブログやアプリ開発などに際し本サイトを拠点として制作の履歴などをブログとして運用しております。
      自分自身でサイトにふれることで、自身のこだわりが詰まったサイトに仕上がっております。
      デザインはもちろん全体のサイト構成、またはCMSとしてお客様自身でサイトを機能させるためにどこのコンテンツやテキストやビジュアルをどうさわって、意のままにカスタマイズするかなどを考察する上でのご参考になれば幸いです。'
    ],
    'belief_title_1'  => [
      'label'  => '制作への信条①',
      'type'   => 'text',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default' => '大切なことはお客様とのコミュニケーション'
    ],
    'belief_text_1'  => [
      'label'  => '制作への心がけ①',
      'type'   => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default' => 'まずはお客様の熱い思いをお聞かせください。
      企業コンセプトや商品へのこだわり・サービスへの思いを知り、共感することで、お客様のサービスや商品を愛用されているユーザーの立場に立って考えることができます。そのすべての思いを何処まで表現できるかはすべてお客様とのコミュニケーションにかかっています。
      そうして何度もヒアリングしていくことで生まれるお客様との信頼関係はどんなものにも代えがたいものであり
      自サイトへの誇りとなります。
      そしてその強固な信頼関係はサイト完成後も一段とサイトを成長させ、立派な分身として高らかなものにしていきます。'
    ],
    'belief_title_2'  => [
      'label'  => '制作への信条②',
      'type'   => 'text',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default' => 'わかりやすさという「やさしさ」を'
    ],
    'belief_text_2'  => [
      'label'  => '制作への心がけ②',
      'type'   => 'textarea',
      'sanitize_callback' => 'wp_filter_post_kses',
      'default' => '私自身、WEB制作の勉強を始めてからというもの、専門知識ばかりが身に付いて、IT用語で説明したりしてしまいそうになります。
      大事なことはサイトを運営されるのはクライアント様でありご利用されるのは、いちユーザーであるということ。
      ホームページ制作に大切なのは、いかにクライアント様にわかりやすく扱いやすいかどうか、
      ユーザーにとってわかりやすいサイト構成になっているかどうかだと考えています。
      サイトの中ではコンテンツの内容に専門用語を使うべきか、誰にでもわかりやすい言葉、表現でユーザーにとってすぐに理解できる内容になっているかどうか。
      進化するWEB技術にとらわれてユーザーにとって煩わしい表現になっていないか。
      パソコン操作に不慣れな方でも管理や更新が容易かどうか。
      これらを高い次元で実現すること。それは素晴らしいWEBサイトの条件だと確信しております。
      これをしっかりとどこまで実現できるかでサイトの出来、ユーザーの印象が大きく変わってくると思います。'
    ]
  ];

  add_customizer_contol($wp_customize, $fields, $section_name);
} //home_customizer( $wp_customize )




