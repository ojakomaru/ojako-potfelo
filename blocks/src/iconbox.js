import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/block-editor";
import IconBoxEdit from "./modules/IconBoxEdit";

registerBlockType("oja/icon-block", {
  title: "アイコンボックス",
  description: "アイコンデザインを変更して下さい",
  category: "text",
  keywords: ["icon", "box", "oja"],
  icon: "block-default",
  supports: {
    html: false,
    customClassName: false,
  },
  attributes: {
    iconBoxType: {
      typp: "string",
      default: "fa-triangle-exclamation",
    },
    isHeadLine: {
      type: 'boolean',
      default: false
    },
    iconHead: {
      type: "string",
      default: ''
    }
  },
  edit: IconBoxEdit,
  save: ({ className }) => {
    return (
      <div className={className}>
        <InnerBlocks.Content />
      </div>
    );
  },
});
