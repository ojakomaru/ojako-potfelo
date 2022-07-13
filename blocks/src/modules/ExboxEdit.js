import { InnerBlocks, RichText } from "@wordpress/block-editor";
import { ExboxInspector } from "./ExboxInspector";

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

export default function ExEdit({ className, attributes, setAttributes }) {
  const { boxTitle, isHeadLine, boxColor, borderSetting } = attributes;
  className += ` ${boxColor} ${borderSetting}`;
  return [
    <ExboxInspector attributes={attributes} setAttributes={setAttributes} />,
    <div className={className}>
      {isHeadLine && (
        <RichText
          className="ex-head"
          value={boxTitle}
          onChange={(val) => setAttributes({ boxTitle: val })}
          tagName="h3"
          placeholder="タイトルを入力"
          //フォーカスされた際も文字が入力されるまでプレースホルダーテキストを表示
          keepPlaceholderOnFocus={true}
        />
      )}
      <InnerBlocks allowedBlocks={ALLOWED_BLOCKS} />
    </div>,
  ];
}