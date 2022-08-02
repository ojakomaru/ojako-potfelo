import { addFilter } from "@wordpress/hooks";
import { createHigherOrderComponent } from "@wordpress/compose";
import { Fragment } from "@wordpress/element";
import { InspectorControls } from "@wordpress/block-editor";
import {
  PanelBody,
  PanelRow,
  SelectControl,
  RadioControl,
} from "@wordpress/components";
import classNames from "classnames"
import { AwesomeIcons } from "./modules/AwesomeIcons";

const isValidBlockType = (name) => {
  const validBlockTypes = [
    "core/paragraph", // 段落
    "core/heading", //見出し
  ];
  return validBlockTypes.includes(name);
};

// コアブロックにカスタム属性値を追加
function addAttribute(settings) {
  if (isValidBlockType(settings.name)) {
    settings.attributes = Object.assign(settings.attributes, {
      bottomSpace: {
        type: "string",
        default: "0",
      },
      frontIcon: {
        type: "string",
        default: "",
      },
      endIcon: {
        type: "string",
        default: "",
      },
    });
  }
  return settings;
}
addFilter("blocks.registerBlockType", "oja/add-attr", addAttribute);

const addBlockControl = createHigherOrderComponent((BlockEdit) => {
  return (props) => {
    const { setAttributes, isSelected, attributes,name } = props;
    const { bottomSpace, frontIcon, endIcon } = attributes;

    // isValidBlockType で指定したブロックが選択されたら表示
    if (isValidBlockType(name)) {
      return (
        <Fragment>
          <BlockEdit {...props} />
          {isSelected && (
            <InspectorControls>
              <PanelBody
                title="カスタム設定"
                initialOpen={false}
                className="oja-coreblock-controle"
              >
                <PanelRow>
                  <RadioControl
                    label="下部の余白設定"
                    selected={bottomSpace}
                    options={[
                      { label: "なし", value: "0" },
                      { label: "小", value: "3%" },
                      { label: "中", value: "6%" },
                      { label: "大", value: "10%" },
                    ]}
                    onChange={(changeOption) => {
                      setAttributes({ bottomSpace: changeOption });
                    }}
                  />
                </PanelRow>
                <SelectControl
                  label="前部アイコン"
                  value={frontIcon}
                  options={AwesomeIcons}
                  onChange={(frontIcon) => setAttributes({ frontIcon })}
                />
                <SelectControl
                  label="後部アイコン"
                  value={endIcon}
                  options={AwesomeIcons}
                  onChange={(endIcon) => setAttributes({ endIcon })}
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
addFilter("editor.BlockEdit", "oja/block-control", addBlockControl);

const withOjaWrapperProp = createHigherOrderComponent((BlockListBlock) => {
  return (props) => {
    const { attributes, className, name, isValid } = props;
    if (isValid && isValidBlockType(name)) {
      const { frontIcon, endIcon, bottomSpace } = attributes;
      const extraStyle = {
        marginBottom: bottomSpace ? bottomSpace : undefined,
      };
      const iconElement = (icon) => {
        let iconClass;
        if(name === "core/heading") {
          return iconClass = `${icon} fa-5x`;
        } else {
          return iconClass = `${icon} fa-3x`;
        }
      }

      const extraClass = [
        frontIcon.replace(/fa-/g, "").split(" ")[1],
        endIcon.replace(/fa-/g, "").split(" ")[1],
      ];

      const wrapperProps = {
        ...props.wrapperProps,
        "data-fronticon": frontIcon.split(' ')[1],
        "data-endicon": endIcon.split(' ')[1]
      };

      return (
        <div
          className={classNames("oja-corewraper", extraClass)}
          style={extraStyle}
        >
          {frontIcon !== "" && <i className={iconElement(frontIcon)}></i>}
          <BlockListBlock
            {...props}
            className={className}
            wrapperProps={wrapperProps}
          />
          {endIcon !== "" && <i className={iconElement(endIcon)}></i>}
        </div>
      );
    }
    return <BlockListBlock {...props} />;
  };
}, "withOjaWrapperProp");
wp.hooks.addFilter(
  "editor.BlockListBlock",
  "oja/with-oja-wrapper-prop",
  withOjaWrapperProp
);

function modifyGetSaveElement(element, blockType, attributes) {
  if (!element) {
    return;
  }
  let getBlocks = wp.data.select("core/editor").getBlocks();
  // 現在のブロックが現在の記事/ページで使用されていることを確認
  if (
    isValidBlockType(blockType.name) &&
    getBlocks.find((block) => isValidBlockType(block.name))
  ) {
    const { frontIcon, endIcon, bottomSpace } = attributes;
    const extraStyle = {
      marginBottom: bottomSpace ? bottomSpace : undefined,
    };
    const iconElement = (icon) => {
      let iconClass;
      if (blockType.name === "core/heading") {
        return (iconClass = `${icon} fa-5x`);
      } else {
        return (iconClass = `${icon} fa-3x`);
      }
    };
    const extraClass = [
      frontIcon.replace(/fa-/g, "").split(" ")[1],
      endIcon.replace(/fa-/g, "").split(" ")[1],
    ];
    return (
      <div
        className={classNames("oja-corewraper", extraClass)}
        style={extraStyle}
      >
        {frontIcon !== "" && <i className={iconElement(frontIcon)}></i>}
        {element}
        {endIcon !== "" && <i className={iconElement(endIcon)}></i>}
      </div>
    );
  }
  return element;
}
// addFilter(
//   "blocks.getSaveElement",
//   "oja/modify-get-save-element",
//   modifyGetSaveElement
// );

function addSaveProps(extraProps, blockType, attributes ) {
  if (isValidBlockType(blockType.name)) {
    const {frontIcon, endIcon} = attributes;
    const wrapperProps = {
      ...extraProps.wrapperProps,
      "data-fronticon": frontIcon.split(" ")[1],
      "data-endicon": endIcon.split(" ")[1],
    };
    return Object.assign(extraProps,{ ...extraProps, ...wrapperProps });
  }
  return extraProps;
}
addFilter(
  "blocks.getSaveContent.extraProps",
  "oja/add-props",
  addSaveProps
);


