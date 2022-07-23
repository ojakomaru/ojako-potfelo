import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks, RichText } from "@wordpress/block-editor";
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
      default: "fa-pen",
    },
    isHeadLine: {
      type: "boolean",
      default: false,
    },
    iconHead: {
      type: "string",
      default: "",
      source: 'html'
    },
  },
  edit: IconBoxEdit,
  save: ({ className, attributes: { iconBoxType, isHeadLine, iconHead } }) => {
    isHeadLine
      ? (className += ` icon-headline ${iconBoxType}`)
      : (className += ` ${iconBoxType}`);
    iconBoxType += ` icon-element`;
    return (
      <div className={className}>
        <span className={iconBoxType}>
          {isHeadLine && (
            <RichText.Content
              className="icon-head"
              value={iconHead}
            />
          )}
        </span>
        <div className="icon-block-inner">
          <InnerBlocks.Content />
        </div>
      </div>
    );
  },
});
