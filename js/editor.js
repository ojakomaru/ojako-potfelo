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
  }),
    richText.registerFormatType(`custom-editor/${ojaEditorObj[1].item}`, {
      title: ojaEditorObj[1].title,
      tagName: "span",
      className: ojaEditorObj[1].class,
      edit: function (args) {
        return element.createElement(editor.RichTextToolbarButton, {
          icon: "admin-customizer",
          title: ojaEditorObj[1].title,
          onClick: function () {
            args.onChange(
              richText.toggleFormat(args.value, {
                type: `custom-editor/${ojaEditorObj[1].item}`,
              })
            );
          },
          isActive: args.isActive,
        });
      },
    });
})(window.wp.richText, window.wp.element, window.wp.editor);
