
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
wp.blocks.registerBlockStyle("core/heading", {
  name: "drop-itaric",
  label: "一文字目拡大、斜体",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/heading", {
  name: "simple-line",
  label: "シンプルライン",
  isDefault: true,
});
wp.blocks.registerBlockStyle("core/heading", {
  name: "top-bottom-line",
  label: "上下ボーダー",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/heading", {
  name: "left-border",
  label: "左垂直ライン",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/heading", {
  name: "speech-bubble",
  label: "吹き出し",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/heading", {
  name: "speech-line",
  label: "斜め線吹き出し",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/heading", {
  name: "two-tone",
  label: "ツートーンカラー",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/heading", {
  name: "two-tone-circle",
  label: "ツートーンサークル",
  isDefault: false,
});

// リストブロックスタイル登録
wp.blocks.registerBlockStyle("core/list", {
  name: "border-solid",
  label: "シンプルボーダー",
  isDefault: true,
});
wp.blocks.registerBlockStyle("core/list", {
  name: "dashed",
  label: "破線枠",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/list", {
  name: "shadow",
  label: "シャドウ枠",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/list", {
  name: "note-dashed",
  label: "ノート風破線",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/list", {
  name: "border-none",
  label: "枠線なし",
  isDefault: false,
});
wp.blocks.registerBlockStyle("core/list", {
  name: "underline-only",
  label: "枠線なし下線のみ",
  isDefault: false,
});