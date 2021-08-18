/**
 * このファイルはテーマカスタマイザーライブプレビューをライブにします。
 * テーマ設定で 'postMessage' を指定し、ここで制御します。
 * JavaScript はコントロールからテーマ設定を取得し、
 * jQuery を使ってページに変更を反映します。
 */

(function ($) {
  //HTMLとCSSを変更する関数
  const ajaxCustomize = function (customId, selector, script = true) {
    wp.customize(customId, function (value) {
      value.bind(function (newval) {
        script ? $(selector).html(newval) : $(selector).css("color", newval);
      });
    });
  };
  ajaxCustomize("blogname", "#site-title");

  ajaxCustomize("header_textcolor", "#site-title", false);

  // リアルタイムにキャッチフレーズを変更
  ajaxCustomize("blogdescription", ".site-description");

  // リアルタイムにヘッダーリンク色を変更
  ajaxCustomize("head_link_textcolor", ".gMenu_name", false);

  // リアルタイムにヘッダー色を変更
  wp.customize("header_color", function (value) {
    value.bind(function (newval) {
      $("#header").css( "background-color", newval );
    });
  });

  // リアルタイムに背景色を変更
  wp.customize("background_color", function (value) {
    value.bind(function (newval) {
      // $("#main_css-css").html( `body::bofore {background-color: ${newval};}` );
      $("body").css({ background: "none", "background-color": newval });
    });
  });

  // リアルタイムにバナー画像を変更
  for( $i = 1; $i >= 3; ) {
    wp.customize(`banner_${i}`, function (value) {
      value.bind(function (newval) {
        $(`#banner_${i}`).children('img').attr( 'src' , newval );
      });
    });
    $i++;
  }

  // wp.customize('home', function (value) {
  //   value.bind(function (newval) {
  //     $('inner').removeClass('column1');
  //     $('inner').removeClass('column2');
  //     $('inner').removeClass('column1_noside');
  //     $('inner').addClass(newval);
  //   });
  // });

  // IDをまとめて即時変更する
  const IdCustomizer = (PageElement) => {
    PageElement.forEach((id) => {
      ajaxCustomize(id, "#" + id + "_customizer");
    });
  };
  //フロントページのIDのコンテンツを即時変更する
  const homeIdElements = [
    "greeting_text",
    "greeting_textarea",
    "belief_title_1",
    "belief_text_1",
    "belief_title_2",
    "belief_text_2",
  ];
  //カンパニーページのIDのコンテンツを即時変更する
  const companyIdElements = [
    "creator_name",
    "oja_birth_place",
    "creator_email",
    "ojako_url",
    "ojako_business",
    "about_summary",
    "skill_map_title",
    "html_record",
    "css_record",
    "javascript_record",
    "wordpress_record",
    "php_record",
    "frame_work_record",
  ];

  IdCustomizer(companyIdElements);
  IdCustomizer(homeIdElements);
})(jQuery);

