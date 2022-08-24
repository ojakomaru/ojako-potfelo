import { addFilter } from "@wordpress/hooks";
import { createHigherOrderComponent } from "@wordpress/compose";
import { Fragment } from "@wordpress/element";
import { InspectorControls } from "@wordpress/block-editor";
import { PanelBody, SelectControl, RadioControl } from "@wordpress/components";
import classNames from "classnames";
import lodash from "lodash";
import { ListAwesomeIcons } from "./modules/ListAwesomeIcons";

const isValidBlockType = (name) => {
  const blockType = ["core/list"];
  return blockType.includes(name);
};

// リストブロックにカスタム属性値を追加
const addAttribute = (settings) => {
  if (isValidBlockType(settings.name)) {
    settings.attributes = lodash.merge(settings.attributes, {
      listIcon: {
        type: "string",
        default: "",
      },
      listThemeColor: {
        type: 'string',
        default: '',
      }
    });
  }
  return settings;
}
addFilter("blocks.registerBlockType", "oja/add-attr", addAttribute);

// リストブロックにインスペクターを追加
const addListBlockControl = createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    const { setAttributes, isSelected, attributes, name } = props;
    const { listIcon, listThemeColor } = attributes;
    // isValidBlockType で指定したブロックが選択されたら表示
    if (isValidBlockType(name)) {
      return (
        <Fragment>
          <BlockEdit {...props} />
          {isSelected && (
            <InspectorControls>
              <PanelBody
                title="リストデザイン設定"
                initialOpen={true}
                className="oja-listblock-controle"
              >
                <SelectControl
                  label="リストのアイコンを変更"
                  value={listIcon}
                  options={ListAwesomeIcons}
                  onChange={(listIcon) => setAttributes({ listIcon })}
                />
                <RadioControl
                  label="リストのテーマカラーを変更"
                  className=" list-color-setting"
                  selected={listThemeColor}
                  options={[
                    { label: "指定なし", value: "" },
                    { label: "ブルー", value: "blue" },
                    { label: "レッド", value: "red" },
                    { label: "グリーン", value: "green" },
                    { label: "イエロー", value: "yellow" },
                    { label: "ピンク", value: "pink" },
                    { label: "グレー", value: "gray" },
                    { label: "ブラック", value: "black" },
                  ]}
                  onChange={(val) => setAttributes({ listThemeColor: val })}
                />
              </PanelBody>
            </InspectorControls>
          )}
        </Fragment>
      );
    }
    return <BlockEdit {...props} />;
  };
}, "addBlockControl");
addFilter("editor.BlockEdit", "oja/block-control", addListBlockControl);

// エディター上の出力
const withListWrapperProps = createHigherOrderComponent((BlockListBlock) => {
  return (props) => {
    const { attributes, className, name, isValid, wrapperProps } = props;
    if (isValid && isValidBlockType(name)) {
      const { listIcon, listThemeColor } = attributes;
      if (listIcon !== "" || listThemeColor !== '') {
        const BlockwrapperProps = lodash.merge(wrapperProps, listIcon ? {"data-listicon": listIcon} : null);
        let extraClass = listThemeColor ? "list-themecolor-" + listThemeColor : null;

        return (
          <BlockListBlock
            {...props}
            className={classNames(className, extraClass)}
            wrapperProps={BlockwrapperProps}
          />
        );
      }
    }
    return <BlockListBlock {...props} />
  };
}, "withListWrapperProps");
addFilter(
  "editor.BlockListBlock",
  "oja/with-list-wrapper-prop",
  withListWrapperProps
);

// フロントエンドに属性値、クラス名を追加
const addListSaveProps = (extraProps, blockType, attributes) => {
  if (isValidBlockType(blockType.name)) {
    const { listIcon, listThemeColor } = attributes;
    const wrapperProps = lodash.merge(
      extraProps.wrapperProps,
      listIcon ? { "data-listicon": listIcon } : null
    );
    let extraClass = listThemeColor
      ? "list-themecolor-" + listThemeColor
      : null;
    extraProps.className = classNames(extraProps.className, extraClass);

    return lodash.merge(extraProps, { ...extraProps, ...wrapperProps });
  }
  return extraProps;
};
addFilter("blocks.getSaveContent.extraProps","oja/add-props",addListSaveProps);