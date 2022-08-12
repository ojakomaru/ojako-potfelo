/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/AwesomeIcons.js":
/*!*************************************!*\
  !*** ./src/modules/AwesomeIcons.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "AwesomeIcons": () => (/* binding */ AwesomeIcons)
/* harmony export */ });
const AwesomeIcons = [{
  label: "なし",
  value: ""
}, {
  label: "電球",
  value: "fa-regular fa-lightbulb"
}, {
  label: "お知らせ",
  value: "fa-regular fa-bell"
}, {
  label: "カート",
  value: "fa-solid fa-cart-shopping"
}, {
  label: "吹き出し",
  value: "fa-regular fa-comment-dots"
}, {
  label: "星",
  value: "fa-regular fa-star"
}, {
  label: "はてなマーク",
  value: "fa-regular fa-question"
}, {
  label: "チェック",
  value: "fa-regular fa-circle-check"
}, {
  label: "ノート",
  value: "fa-solid fa-file-pen"
}, {
  label: "クリップボード",
  value: "fa-regular fa-clipboard"
}, {
  label: "鉛筆",
  value: "fa-solid fa-pen"
}, {
  label: "歯車",
  value: "fa-solid fa-gear"
}, {
  label: "注意",
  value: "fa-solid fa-triangle-exclamation"
}, {
  label: "いいね！",
  value: "fa-regular fa-thumbs-up"
}, {
  label: "低評価",
  value: "fa-regular fa-thumbs-down"
}, {
  label: "ハート",
  value: "fa-regular fa-heart"
}, {
  label: "旗",
  value: "fa-regular fa-flag"
}, {
  label: "ビックリマーク",
  value: "fa-solid fa-circle-exclamation"
}];

/***/ }),

/***/ "./node_modules/classnames/index.js":
/*!******************************************!*\
  !*** ./node_modules/classnames/index.js ***!
  \******************************************/
/***/ ((module, exports) => {

var __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;/*!
  Copyright (c) 2018 Jed Watson.
  Licensed under the MIT License (MIT), see
  http://jedwatson.github.io/classnames
*/
/* global define */

(function () {
	'use strict';

	var hasOwn = {}.hasOwnProperty;

	function classNames() {
		var classes = [];

		for (var i = 0; i < arguments.length; i++) {
			var arg = arguments[i];
			if (!arg) continue;

			var argType = typeof arg;

			if (argType === 'string' || argType === 'number') {
				classes.push(arg);
			} else if (Array.isArray(arg)) {
				if (arg.length) {
					var inner = classNames.apply(null, arg);
					if (inner) {
						classes.push(inner);
					}
				}
			} else if (argType === 'object') {
				if (arg.toString === Object.prototype.toString) {
					for (var key in arg) {
						if (hasOwn.call(arg, key) && arg[key]) {
							classes.push(key);
						}
					}
				} else {
					classes.push(arg.toString());
				}
			}
		}

		return classes.join(' ');
	}

	if ( true && module.exports) {
		classNames.default = classNames;
		module.exports = classNames;
	} else if (true) {
		// register as 'classnames', consistent with npm package name
		!(__WEBPACK_AMD_DEFINE_ARRAY__ = [], __WEBPACK_AMD_DEFINE_RESULT__ = (function () {
			return classNames;
		}).apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__),
		__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
	} else {}
}());


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["components"];

/***/ }),

/***/ "@wordpress/compose":
/*!*********************************!*\
  !*** external ["wp","compose"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["compose"];

/***/ }),

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["element"];

/***/ }),

/***/ "@wordpress/hooks":
/*!*******************************!*\
  !*** external ["wp","hooks"] ***!
  \*******************************/
/***/ ((module) => {

"use strict";
module.exports = window["wp"]["hooks"];

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/extends.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/extends.js ***!
  \************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ _extends)
/* harmony export */ });
function _extends() {
  _extends = Object.assign ? Object.assign.bind() : function (target) {
    for (var i = 1; i < arguments.length; i++) {
      var source = arguments[i];

      for (var key in source) {
        if (Object.prototype.hasOwnProperty.call(source, key)) {
          target[key] = source[key];
        }
      }
    }

    return target;
  };
  return _extends.apply(this, arguments);
}

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
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!*******************************!*\
  !*** ./src/core_expantion.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @wordpress/hooks */ "@wordpress/hooks");
/* harmony import */ var _wordpress_hooks__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_wordpress_hooks__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @wordpress/compose */ "@wordpress/compose");
/* harmony import */ var _wordpress_compose__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! classnames */ "./node_modules/classnames/index.js");
/* harmony import */ var classnames__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(classnames__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _modules_AwesomeIcons__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./modules/AwesomeIcons */ "./src/modules/AwesomeIcons.js");










const isValidBlockType = name => {
  const validBlockTypes = ["core/paragraph", // 段落
  "core/heading" //見出し
  ];
  return validBlockTypes.includes(name);
}; // コアブロックにカスタム属性値を追加


function addAttribute(settings) {
  if (isValidBlockType(settings.name)) {
    settings.attributes = Object.assign(settings.attributes, {
      bottomSpace: {
        type: "string",
        default: "0"
      },
      frontIcon: {
        type: "string",
        default: ""
      },
      endIcon: {
        type: "string",
        default: ""
      }
    });
  }

  return settings;
}

(0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_2__.addFilter)("blocks.registerBlockType", "oja/add-attr", addAttribute);
const addBlockControl = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__.createHigherOrderComponent)(BlockEdit => {
  return props => {
    const {
      setAttributes,
      isSelected,
      attributes,
      name
    } = props;
    const {
      bottomSpace,
      frontIcon,
      endIcon
    } = attributes; // isValidBlockType で指定したブロックが選択されたら表示

    if (isValidBlockType(name)) {
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(BlockEdit, props), isSelected && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_4__.InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelBody, {
        title: "\u30AB\u30B9\u30BF\u30E0\u8A2D\u5B9A",
        initialOpen: false,
        className: "oja-coreblock-controle"
      }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.PanelRow, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.RadioControl, {
        label: "\u4E0B\u90E8\u306E\u4F59\u767D\u8A2D\u5B9A",
        selected: bottomSpace,
        options: [{
          label: "なし",
          value: "0"
        }, {
          label: "小",
          value: "3%"
        }, {
          label: "中",
          value: "6%"
        }, {
          label: "大",
          value: "10%"
        }],
        onChange: changeOption => {
          setAttributes({
            bottomSpace: changeOption
          });
        }
      })), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
        label: "\u524D\u90E8\u30A2\u30A4\u30B3\u30F3",
        value: frontIcon,
        options: _modules_AwesomeIcons__WEBPACK_IMPORTED_MODULE_7__.AwesomeIcons,
        onChange: frontIcon => setAttributes({
          frontIcon
        })
      }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(_wordpress_components__WEBPACK_IMPORTED_MODULE_5__.SelectControl, {
        label: "\u5F8C\u90E8\u30A2\u30A4\u30B3\u30F3",
        value: endIcon,
        options: _modules_AwesomeIcons__WEBPACK_IMPORTED_MODULE_7__.AwesomeIcons,
        onChange: endIcon => setAttributes({
          endIcon
        })
      }))));
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(BlockEdit, props);
  };
}, "addBlockControl");
(0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_2__.addFilter)("editor.BlockEdit", "oja/block-control", addBlockControl);
const withOjaWrapperProp = (0,_wordpress_compose__WEBPACK_IMPORTED_MODULE_3__.createHigherOrderComponent)(BlockListBlock => {
  return props => {
    const {
      attributes,
      className,
      name,
      isValid
    } = props;

    if (isValid && isValidBlockType(name)) {
      const {
        frontIcon,
        endIcon,
        bottomSpace
      } = attributes;

      if (frontIcon !== "" || endIcon !== "" || bottomSpace !== "0") {
        const extraStyle = {
          marginBottom: bottomSpace ? bottomSpace : undefined
        };

        const iconElement = icon => {
          let iconClass;

          if (name === "core/heading") {
            return iconClass = `${icon} fa-5x`;
          } else {
            return iconClass = `${icon} fa-3x`;
          }
        };

        const extraClass = [frontIcon.replace(/fa-/g, "").split(" ")[1], endIcon.replace(/fa-/g, "").split(" ")[1]];
        const wrapperProps = { ...props.wrapperProps,
          "data-fronticon": frontIcon.split(' ')[1],
          "data-endicon": endIcon.split(' ')[1]
        };
        return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("div", {
          className: classnames__WEBPACK_IMPORTED_MODULE_6___default()("oja-corewraper", extraClass),
          style: extraStyle
        }, frontIcon !== "" && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("i", {
          className: iconElement(frontIcon)
        }), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(BlockListBlock, (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, props, {
          className: className,
          wrapperProps: wrapperProps
        })), endIcon !== "" && (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)("i", {
          className: iconElement(endIcon)
        }));
      }
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(BlockListBlock, props);
  };
}, "withOjaWrapperProp");
wp.hooks.addFilter("editor.BlockListBlock", "oja/with-oja-wrapper-prop", withOjaWrapperProp);

function addSaveProps(extraProps, blockType, attributes) {
  if (isValidBlockType(blockType.name)) {
    const {
      frontIcon,
      endIcon
    } = attributes;
    const wrapperProps = { ...extraProps.wrapperProps,
      "data-fronticon": frontIcon.split(" ")[1],
      "data-endicon": endIcon.split(" ")[1]
    };
    return Object.assign(extraProps, { ...extraProps,
      ...wrapperProps
    });
  }

  return extraProps;
}

(0,_wordpress_hooks__WEBPACK_IMPORTED_MODULE_2__.addFilter)("blocks.getSaveContent.extraProps", "oja/add-props", addSaveProps);
})();

/******/ })()
;
//# sourceMappingURL=core_expantion.js.map