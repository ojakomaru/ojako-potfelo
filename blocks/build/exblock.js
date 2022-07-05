/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!************************!*\
  !*** ./src/exblock.js ***!
  \************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "addAttribute": () => (/* binding */ addAttribute),
/* harmony export */   "addBlockControl": () => (/* binding */ addBlockControl),
/* harmony export */   "addSaveProps": () => (/* binding */ addSaveProps)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);

const {
  assign
} = lodash;
const {
  __
} = wp.i18n;
const {
  Fragment
} = wp.element;
const {
  addFilter
} = wp.hooks;
const {
  PanelBody,
  RadioControl
} = wp.components;
const {
  InspectorControls
} = window.wp.editor;
const {
  createHigherOrderComponent
} = wp.compose;

const isValidBlockType = name => {
  const validBlockTypes = ["core/paragraph", // 段落
  "core/list", // リスト
  "core/image" // イメージ
  ];
  return validBlockTypes.includes(name);
};

const addBlockControl = createHigherOrderComponent(BlockEdit => {
  return props => {
    // isValidBlockType で指定したブロックが選択されたら表示
    if (isValidBlockType(props.name) && props.isSelected) {
      // すでにオプション選択されていたら
      let selectOption = props.attributes.marginSetting || "";
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(PanelBody, {
        title: "\u30DE\u30FC\u30B8\u30F3\u8A2D\u5B9A",
        initialOpen: false,
        className: "margin-controle"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(RadioControl, {
        selected: selectOption,
        options: [{
          label: "なし",
          value: ""
        }, {
          label: "小",
          value: "mb-sm"
        }, {
          label: "中",
          value: "mb-md"
        }, {
          label: "大",
          value: "mb-lg"
        }],
        onChange: changeOption => {
          let newClassName = changeOption; // 高度な設定で入力している場合は追加する

          if (props.attributes.className) {
            // 付与されているclassを取り出す
            let inputClassName = props.attributes.className; // スペース区切りを配列に

            inputClassName = inputClassName.split(" "); // 選択されていたオプションの値を削除

            let filterClassName = inputClassName.filter(function (name) {
              return name !== selectOption;
            }); // 新しく選択したオプションを追加

            filterClassName.push(changeOption); // 配列を文字列に

            newClassName = filterClassName.join(" ");
          }

          selectOption = changeOption;
          props.setAttributes({
            className: newClassName,
            marginSetting: changeOption
          });
        }
      }))));
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(BlockEdit, props);
  };
}, "addMyCustomBlockControls");
addFilter("editor.BlockEdit", "myblock/block-control", addBlockControl);
function addAttribute(settings) {
  if (isValidBlockType(settings.name)) {
    settings.attributes = assign(settings.attributes, {
      marginSetting: {
        type: "string"
      }
    });
  }

  return settings;
}
addFilter("blocks.registerBlockType", "myblock/add-attr", addAttribute);
function addSaveProps(extraProps, blockType, attributes) {
  if (isValidBlockType(blockType.name)) {
    // なしを選択した場合はmarginSetting削除
    if (attributes.marginSetting === "") {
      delete attributes.marginSetting;
    }
  }

  return extraProps;
}
addFilter("blocks.getSaveContent.extraProps", "myblock/add-props", addSaveProps);
})();

/******/ })()
;
//# sourceMappingURL=exblock.js.map