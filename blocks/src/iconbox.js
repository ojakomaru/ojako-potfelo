import { registerBlockType } from "@wordpress/blocks";
import { InnerBlocks, RichText, useBlockProps } from "@wordpress/block-editor";
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
      default: true,
    },
    iconHead: {
      type: "string",
      default: "",
      source: 'html',
      selector: "h3"
    },
  },
  edit: IconBoxEdit,
  save: ({ className, attributes: { iconBoxType, isHeadLine, iconHead } }) => {
    isHeadLine
      ? (className += ` icon-headline ${iconBoxType}`)
      : (className += ` ${iconBoxType}`);
    const blockwraper = useBlockProps.save({className: className});
    iconBoxType += ` icon-element`;
    return (
      <div {...blockwraper}>
        <span className={iconBoxType}>
          {isHeadLine && (
            <RichText.Content
              className="icon-head"
              value={iconHead}
              tagName="h3"
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
