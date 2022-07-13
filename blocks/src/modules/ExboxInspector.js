import { InspectorControls } from "@wordpress/block-editor";
import {
  PanelBody,
  PanelRow,
  ToggleControl,
  SelectControl,
  RadioControl,
} from "@wordpress/components";

const sinpleBoxContent = [
  { label: "シンプル", value: "simple-bd" },
  { label: "内側線", value: "inline-bd" },
  { label: "角丸 (線の変更は不可)", value: "radius-bd" },
  { label: "チェック柄", value: "check-bd" },
  { label: "水玉模様", value: "polka-dot" },
  { label: "左縦線 (細線選択不可)", value: "left-angle" },
  { label: "大カッコ", value: "brackets" },
  { label: "カギカッコ", value: "angle-brackets" },
  { label: "黒板風 (色、線変更不可)", value: "blackboard" },
];
const titleBoxContent = [
  { label: "シンプル", value: "sinple-head" },
  { label: "ノーマル", value: "nomal-head" },
  { label: "上側", value: "top-head" },
  { label: "外側", value: "outer-head" },
  { label: "内側", value: "inner-head" },
  { label: "角丸", value: "radius-head" },
  { label: "吹き出し", value: "speech-head" },
 
];

//インスペクター表示関数
export const ExboxInspector = ({
  attributes: { boxColor, borderSetting, isHeadLine },
  setAttributes,
}) => {
  const updateHeadStyle = ( value ) => {
    setAttributes({ isHeadLine: value });
    setAttributes({ borderSetting: "nomal-head" });
  }

  return (
    <InspectorControls>
      <PanelBody title="ボックス枠線設定" initialOpen={true}>
        <PanelRow>
          <ToggleControl
            label={isHeadLine ? "タイトルを表示する" : "タイトルは表示しない"}
            help=""
            checked={isHeadLine}
            onChange={updateHeadStyle}
          />
        </PanelRow>
        <PanelRow>
          <SelectControl
            label={isHeadLine ? "タイトル付きスタイル" : "シンプルスタイル"}
            value={borderSetting}
            options={isHeadLine ? titleBoxContent : sinpleBoxContent}
            onChange={(val) => setAttributes({ borderSetting: val })}
          />
        </PanelRow>
      </PanelBody>
      <PanelBody title="ボックスカラー設定" initialOpen={false}>
        <PanelRow>
          <RadioControl
            className=" exbox-color-setting"
            selected={boxColor}
            options={[
              { label: "ブルー", value: "blue" },
              { label: "レッド", value: "red" },
              { label: "グリーン", value: "green" },
              { label: "イエロー", value: "yellow" },
              { label: "ピンク", value: "pink" },
              { label: "グレー", value: "gray" },
              { label: "ブラック", value: "black" },
            ]}
            onChange={(val) => setAttributes({ boxColor: val })}
          />
        </PanelRow>
      </PanelBody>
    </InspectorControls>
  );
};
