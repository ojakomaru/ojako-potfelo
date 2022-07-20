import { InnerBlocks, InspectorControls } from "@wordpress/block-editor";
import {PanelBody, PanelRow, SelectControl} from "@wordpress/components";

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
  { label: "星", value: "fa-star" },
  { label: "電球", value: "fa-lightbulb" },
  { label: "カート", value: "fa-cart-shopping" },
  { label: "お知らせ", value: "fa-bell" },
  { label: "吹き出し", value: "fa-comment-dots" },
  { label: "チェック", value: "fa-circle-check" },
  { label: "鉛筆", value: "fa-pen" },
  { label: "ノート", value: "fa-file-pen" },
  { label: "歯車", value: "fa-gear" },
  { label: "クリップボード", value: "fa-clipboard" },
  { label: "いいね！", value: "fa-thumbs-up" },
  { label: "低評価", value: "fa-thumbs-down" },
  { label: "ハート", value: " fa-heart" },
  { label: "はてなマーク", value: " fa-question" },
  { label: "旗", value: " fa-flag" },
  { label: "ビックリマーク", value: " fa-circle-exclamation" },
];

export default function IconBoxEdit({
  className,
  setAttributes,
  attributes: { iconBoxType },
}) {
  className += ` ${iconBoxType}`;
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
      </PanelBody>
    </InspectorControls>,
    <div className={className}>
      <span className={iconBoxType}></span>
      <InnerBlocks allowedBlocks={ALLOWED_BLOCKS} />
    </div>,
  ];
}
