import {
  InnerBlocks,
  InspectorControls,
  RichText,
} from "@wordpress/block-editor";
import {
  PanelBody,
  PanelRow,
  SelectControl,
  ToggleControl,
} from "@wordpress/components";

const ALLOWED_BLOCKS = [
  "core/image",
  "core/paragraph",
  "core/list",
  "core/heading",
  "core/table",
  "oja/post-list",
  "oja/oja-related-post-block",
  "ojako/custom-dlblock",
];
const boxType = [
  { label: "注意", value: "fa-triangle-exclamation" },
  { label: "電球", value: "fa-lightbulb" },
  { label: "お知らせ", value: "fa-bell" },
  { label: "カート", value: "fa-cart-shopping" },
  { label: "吹き出し", value: "fa-comment-dots" },
  { label: "星", value: "fa-star" },
  { label: "はてなマーク", value: "fa-question" },
  { label: "チェック", value: "fa-circle-check" },
  { label: "ノート", value: "fa-file-pen" },
  { label: "クリップボード", value: "fa-clipboard" },
  { label: "鉛筆", value: "fa-pen" },
  { label: "歯車", value: "fa-gear" },
  { label: "いいね！", value: "fa-thumbs-up" },
  { label: "低評価", value: "fa-thumbs-down" },
  { label: "ハート", value: "fa-heart" },
  { label: "旗", value: "fa-flag" },
  { label: "ビックリマーク", value: "fa-circle-exclamation" },
];

export default function IconBoxEdit({
  className,
  setAttributes,
  attributes: { iconBoxType, isHeadLine, iconHead },
}) {
  isHeadLine
    ? (className += ` icon-headline ${iconBoxType}`)
    : (className += ` ${iconBoxType}`);
  return [
    <InspectorControls>
      <PanelBody title="ボックスの種類" initialOpen={true}>
        <PanelRow>
          <SelectControl
            label=""
            value={iconBoxType}
            options={boxType}
            onChange={(val) => setAttributes({ iconBoxType: val })}
          />
        </PanelRow>
        <PanelRow>
          <ToggleControl
            label={isHeadLine ? "見出しアイコン" : "サイドアイコン"}
            help=""
            checked={isHeadLine}
            onChange={(val) => setAttributes({ isHeadLine: val })}
          />
        </PanelRow>
      </PanelBody>
    </InspectorControls>,
    <div className={className}>
      <span className={iconBoxType}>
        {isHeadLine && (
          <RichText
            className="icon-head"
            value={iconHead}
            onChange={(val) => setAttributes({iconHead: val})}
            tagName="h3"
            placeholder="見出しを入力できます"
            keepPlaceholderOnFocus={true}
          />
        )}
      </span>
      <InnerBlocks allowedBlocks={ALLOWED_BLOCKS} />
    </div>,
  ];
}
