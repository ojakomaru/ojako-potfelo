/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/ExboxEdit.js":
/*!**********************************!*\
  !*** ./src/modules/ExboxEdit.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ ExEdit)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _ExboxInspector__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ExboxInspector */ "./src/modules/ExboxInspector.js");



const ALLOWED_BLOCKS = ["core/image", "core/paragraph", "core/list", "core/heading", "core/table", "oja/post-list", "oja/oja-related-post-block", "ojako/custom-dlblock"];
function ExEdit(_ref) {
  let {
    className,
    attributes,
    setAttributes
  } = _ref;
  const {
    boxTitle,
    isHeadLine,
    boxColor,
    borderSetting
  } = attributes;
  className += ` ${boxColor} ${borderSetting}`;
  return [(0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_ExboxInspector__WEBPACK_IMPORTED_MODULE_2__.ExboxInspector, {
    attributes: attributes,
    setAttributes: setAttributes
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
    className: className
  }, isHeadLine && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.RichText, {
    className: "ex-head",
    value: boxTitle,
    onChange: val => setAttributes({
      boxTitle: val
    }),
    tagName: "h3",
    placeholder: "\u30BF\u30A4\u30C8\u30EB\u3092\u5165\u529B" //フォーカスされた際も文字が入力されるまでプレースホルダーテキストを表示
    ,
    keepPlaceholderOnFocus: true
  }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InnerBlocks, {
    allowedBlocks: ALLOWED_BLOCKS
  }))];
}

/***/ }),

/***/ "./src/modules/ExboxInspector.js":
/*!***************************************!*\
  !*** ./src/modules/ExboxInspector.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "ExboxInspector": () => (/* binding */ ExboxInspector)
/* harmony export */ });
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__);



const sinpleBoxContent = [{
  label: "シンプル",
  value: "simple-bd"
}, {
  label: "内側線",
  value: "inline-bd"
}, {
  label: "角丸 (線の変更は不可)",
  value: "radius-bd"
}, {
  label: "チェック柄",
  value: "check-bd"
}, {
  label: "水玉模様",
  value: "polka-dot"
}, {
  label: "左縦線 (細線選択不可)",
  value: "left-angle"
}, {
  label: "大カッコ",
  value: "brackets"
}, {
  label: "カギカッコ",
  value: "angle-brackets"
}, {
  label: "黒板風 (色、線変更不可)",
  value: "blackboard"
}];
const titleBoxContent = [{
  label: "シンプル",
  value: "sinple-head"
}, {
  label: "ノーマル",
  value: "nomal-head"
}, {
  label: "上側",
  value: "top-head"
}, {
  label: "外側",
  value: "outer-head"
}, {
  label: "内側",
  value: "inner-head"
}, {
  label: "角丸",
  value: "radius-head"
}, {
  label: "吹き出し",
  value: "speech-head"
}]; //インスペクター表示関数

const ExboxInspector = _ref => {
  let {
    attributes: {
      boxColor,
      borderSetting,
      isHeadLine
    },
    setAttributes
  } = _ref;

  const updateHeadStyle = value => {
    setAttributes({
      isHeadLine: value
    });
    setAttributes({
      borderSetting: "nomal-head"
    });
  };

  return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_1__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: "\u30DC\u30C3\u30AF\u30B9\u67A0\u7DDA\u8A2D\u5B9A",
    initialOpen: true
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.ToggleControl, {
    label: isHeadLine ? "タイトルを表示する" : "タイトルは表示しない",
    help: "",
    checked: isHeadLine,
    onChange: updateHeadStyle
  })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.SelectControl, {
    label: isHeadLine ? "タイトル付きスタイル" : "シンプルスタイル",
    value: borderSetting,
    options: isHeadLine ? titleBoxContent : sinpleBoxContent,
    onChange: val => setAttributes({
      borderSetting: val
    })
  }))), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelBody, {
    title: "\u30DC\u30C3\u30AF\u30B9\u30AB\u30E9\u30FC\u8A2D\u5B9A",
    initialOpen: false
  }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_2__.RadioControl, {
    className: " exbox-color-setting",
    selected: boxColor,
    options: [{
      label: "ブルー",
      value: "blue"
    }, {
      label: "レッド",
      value: "red"
    }, {
      label: "グリーン",
      value: "green"
    }, {
      label: "イエロー",
      value: "yellow"
    }, {
      label: "ピンク",
      value: "pink"
    }, {
      label: "グレー",
      value: "gray"
    }, {
      label: "ブラック",
      value: "black"
    }],
    onChange: val => setAttributes({
      boxColor: val
    })
  }))));
};

/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

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
/*!**********************!*\
  !*** ./src/exbox.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _modules_ExboxEdit__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/ExboxEdit */ "./src/modules/ExboxEdit.js");




(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.registerBlockType)("oja/exbox-block", {
  title: "EXボックス",
  description: "用途に合わせてデザインを変更して下さい",
  category: "text",
  keywords: ["box", "ex", "oja"],
  icon: "block-default",
  styles: [{
    name: "solid",
    label: "シンプル",
    isDefault: true
  }, {
    name: "bold",
    label: "太線"
  }, {
    name: "dashed",
    label: "点線"
  }, {
    name: "double",
    label: "二重線"
  }],
  supports: {
    html: false,
    customClassName: false
  },
  example: {
    attributes: {
      boxTitle: "好きなテキストや画像が入ります"
    }
  },
  transforms: {
    from: [{
      type: "block",
      //"段落, 見出し"から
      blocks: ["core/paragraph",, "core/heading"],
      //処理されるブロックの属性を受け取るコールバック
      transform: _ref => {
        let {
          content
        } = _ref;
        return (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.createBlock)("oja/exbox-block", {
          // ojaブロックのcontentにPブロックのcontent
          boxTitle: content
        });
      }
    }],
    to: [{
      type: "block",
      //"段落"へ
      blocks: ["core/paragraph"],
      //isMatchでfalseを返すと変換を適用しない
      //boxTitleがあるときだけ変換を選択できる
      isMatch: _ref2 => {
        let {
          boxTitle
        } = _ref2;
        if (boxTitle) return true;
        return false;
      },
      transform: _ref3 => {
        let {
          boxTitle
        } = _ref3;
        return (0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_1__.createBlock)("core/paragraph", {
          content: boxTitle
        });
      }
    }]
  },
  attributes: {
    boxTitle: {
      type: "string",
      default: "",
      source: "html",
      selector: "h3"
    },
    boxColor: {
      type: "string",
      default: "blue"
    },
    borderSetting: {
      type: "string",
      default: "nomal-head"
    },
    isHeadLine: {
      type: "boolean",
      default: true
    }
  },
  edit: _modules_ExboxEdit__WEBPACK_IMPORTED_MODULE_3__["default"],
  save: _ref4 => {
    let {
      className,
      attributes: {
        boxTitle,
        isHeadLine,
        boxColor,
        borderSetting
      }
    } = _ref4;
    className += ` ${boxColor} ${borderSetting}`;
    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)("div", {
      className: className
    }, isHeadLine && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.RichText.Content, {
      className: "ex-head",
      value: boxTitle,
      tagName: "h3"
    }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_0__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_2__.InnerBlocks.Content, null));
  }
});
})();

/******/ })()
;
//# sourceMappingURL=exbox.js.map