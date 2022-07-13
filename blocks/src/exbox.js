import { registerBlockType, createBlock } from "@wordpress/blocks";
import { InnerBlocks, RichText } from "@wordpress/block-editor";
import ExEdit from "./modules/ExboxEdit";
import { useBlockProps } from "@wordpress/block-editor";

registerBlockType("oja/exbox-block", {
  title: "EXボックス",
  description: "用途に合わせてデザインを変更して下さい",
  category: "text",
  keywords: ["box", "ex", "oja"],
  icon: "block-default",
  styles: [
    {
      name: "solid",
      label: "シンプル",
      isDefault: true,
    },
    {
      name: "bold",
      label: "太線",
    },
    {
      name: "dashed",
      label: "点線",
    },
    {
      name: "double",
      label: "二重線",
    },
  ],
  supports: {
    html: false,
    customClassName: false,
  },
  example: {
    attributes: {
      boxTitle: "好きなテキストや画像が入ります",
    },
  },
  transforms: {
    from: [
      {
        type: "block",
        //"段落, 見出し"から
        blocks: ["core/paragraph", , "core/heading"],
        //処理されるブロックの属性を受け取るコールバック
        transform: ({ content }) => {
          return createBlock("oja/exbox-block", {
            // ojaブロックのcontentにPブロックのcontent
            boxTitle: content,
          });
        },
      },
    ],
    to: [
      {
        type: "block",
        //"段落"へ
        blocks: ["core/paragraph"],
        //isMatchでfalseを返すと変換を適用しない
        //boxTitleがあるときだけ変換を選択できる
        isMatch: ({ boxTitle }) => {
          if (boxTitle) return true;
          return false;
        },
        transform: ({ boxTitle }) => {
          return createBlock("core/paragraph", {
            content: boxTitle,
          });
        },
      },
    ],
  },
  attributes: {
    boxTitle: {
      type: "string",
      default: "",
      source: "html",
      selector: "h3",
    },
    boxColor: {
      type: "string",
      default: "blue",
    },
    borderSetting: {
      type: "string",
      default: "nomal-head",
    },
    isHeadLine: {
      type: "boolean",
      default: true,
    },
  },
  edit: ExEdit,
  save: ({
    className,
    attributes: { boxTitle, isHeadLine, boxColor, borderSetting },
  }) => {
    className += ` ${boxColor} ${borderSetting}`;
    return (
      <div className={className}>
        {isHeadLine && (
          <RichText.Content className="ex-head" value={boxTitle} tagName="h3" />
        )}
        <InnerBlocks.Content />
      </div>
    );
  },
});

