import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks } from "@wordpress/block-editor";
import IconBoxEdit from "./modules/IconBoxEdit";

registerBlockType("oja/icon-block", {
  title: "アイコンボックス",
  description: "アイコンデザインを変更して下さい",
  category: "text",
  keywords: ["icon", "box", "oja"],
  icon: "block-default",
  styles: [
    {
      name: "side-icon",
      label: "横向きアイコン",
      isDefault: true,
    },
    {
      name: "top-icon",
      label: "ワンポイント",
    },
  ],
  supports: {
    html: false,
    customClassName: false,
  },
  attributes: {
    iconBoxType: {
      typp: "string",
      default: "fa-triangle-exclamation",
    },
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
