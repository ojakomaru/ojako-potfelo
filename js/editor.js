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

wp.blocks.registerBlockStyle("core/heading", {
  name: "default",
  label: "デフォルト",
  isDefault: true,
});

wp.blocks.registerBlockStyle("core/heading", {
  name: "under-line",
  label: "下線",
  isDefault: false,
});

wp.blocks.registerBlockStyle("core/heading", {
  name: "left-line",
  label: "左線",
  isDefault: false,
});
