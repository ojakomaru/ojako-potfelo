import { registerBlockStyle } from "@wordpress/blocks";

// ツールバーにボタンを追加する
(function (richText, element, editor) {
  richText.registerFormatType(`custom-editor/${ojaEditorObj[0].item}`, {
    title: ojaEditorObj[0].title,
    tagName: "span",
    className: ojaEditorObj[0].class,
    edit: function ({ isActive, onChange, value }) {
      return element.createElement(editor.RichTextToolbarButton, {
        icon: "admin-customizer",
        title: ojaEditorObj[0].title,
        onClick: () => {
          onChange(
            richText.toggleFormat(value, {
              type: `custom-editor/${ojaEditorObj[0].item}`,
            })
          );
        },
        isActive: isActive,
      });
    },
  });
})(window.wp.richText, window.wp.element, window.wp.editor);

// 見出しにスタイルを追加
registerBlockStyle("core/heading", {
  name: "default",
  label: "一文字目拡大、斜体",
  isDefault: true,
});
registerBlockStyle("core/heading", {
  name: "simple-line",
  label: "シンプルライン",
  isDefault: false,
});
registerBlockStyle("core/heading", {
  name: "top-bottom-line",
  label: "上下ボーダー",
  isDefault: false,
});
registerBlockStyle("core/heading", {
  name: "left-border",
  label: "左垂直ライン",
  isDefault: false,
});
registerBlockStyle("core/heading", {
  name: "speech-bubble",
  label: "吹き出し",
  isDefault: false,
});
registerBlockStyle("core/heading", {
  name: "speech-line",
  label: "斜め線吹き出し",
  isDefault: false,
});
registerBlockStyle("core/heading", {
  name: "two-tone",
  label: "ツートーンカラー",
  isDefault: false,
});
registerBlockStyle("core/heading", {
  name: "two-tone-circle",
  label: "ツートーンサークル",
  isDefault: false,
});
