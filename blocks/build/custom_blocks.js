/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "@wordpress/element":
/*!*********************************!*\
  !*** external ["wp","element"] ***!
  \*********************************/
/***/ ((module) => {

module.exports = window["wp"]["element"];

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/esm/extends.js":
/*!************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/esm/extends.js ***!
  \************************************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!******************************!*\
  !*** ./src/custom-blocks.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/extends */ "./node_modules/@babel/runtime/helpers/esm/extends.js");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/element */ "@wordpress/element");
/* harmony import */ var _wordpress_element__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_element__WEBPACK_IMPORTED_MODULE_1__);
Object(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());



/* eslint-disable react/jsx-props-no-spreading, react/prop-types */

const {
  assign,
  merge
} = lodash;
const {
  __
} = wp.i18n;
const {
  addFilter
} = wp.hooks;
const {
  createHigherOrderComponent
} = wp.compose;
const {
  Fragment
} = wp.element;
const {
  InspectorControls
} = wp.blockEditor;
const {
  PanelBody,
  SelectControl
} = wp.components;
/**
 * Add Size attribute to Button block
 *
 * @param  {Object} settings Original block settings
 * @param  {string} name     Block name
 * @return {Object}          Filtered block settings
 */

function addAttributes(settings, name) {
  if (name === "core/button") {
    return assign({}, settings, {
      attributes: merge(settings.attributes, {
        size: {
          type: "string",
          default: ""
        }
      })
    });
  }

  return settings;
}

addFilter("blocks.registerBlockType", "intro-to-filters/button-block/add-attributes", addAttributes);
/**
 * Add Size control to Button block
 */

const addInspectorControl = createHigherOrderComponent(BlockEdit => {
  return props => {
    const {
      attributes: {
        size
      },
      setAttributes,
      name
    } = props;

    if (name !== "core/button") {
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(BlockEdit, props);
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(Fragment, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(BlockEdit, props), (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(InspectorControls, null, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(PanelBody, {
      title: __("Size settings", "intro-to-filters"),
      initialOpen: false
    }, (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(SelectControl, {
      label: __("Size", "intro-to-filters"),
      value: size,
      options: [{
        label: __("Regular", "intro-to-filters"),
        value: "regular"
      }, {
        label: __("Small", "intro-to-filters"),
        value: "small"
      }, {
        label: __("Large", "intro-to-filters"),
        value: "large"
      }],
      onChange: value => {
        setAttributes({
          size: value
        });
      }
    }))));
  };
}, "withInspectorControl");
addFilter("editor.BlockEdit", "intro-to-filters/button-block/add-inspector-controls", addInspectorControl);
/**
 * Add size class to the block in the editor
 */

const addSizeClassEditor = createHigherOrderComponent(BlockListBlock => {
  return props => {
    const {
      attributes: {
        size
      },
      className,
      name
    } = props;

    if (name !== "core/button") {
      return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(BlockListBlock, props);
    }

    return (0,_wordpress_element__WEBPACK_IMPORTED_MODULE_1__.createElement)(BlockListBlock, (0,_babel_runtime_helpers_extends__WEBPACK_IMPORTED_MODULE_0__["default"])({}, props, {
      className: Object(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(className, size ? `has-size-${size}` : "")
    }));
  };
}, "withClientIdClassName");
addFilter("editor.BlockListBlock", "intro-to-filters/button-block/add-editor-class", addSizeClassEditor);
/**
 * Add size class to the block on the front end
 *
 * @param  {Object} props      Additional props applied to save element.
 * @param  {Object} block      Block type.
 * @param  {Object} attributes Current block attributes.
 * @return {Object}            Filtered props applied to save element.
 */

function addSizeClassFrontEnd(props, block, attributes) {
  if (block.name !== "core/button") {
    return props;
  }

  const {
    className
  } = props;
  const {
    size
  } = attributes;
  return assign({}, props, {
    className: Object(function webpackMissingModule() { var e = new Error("Cannot find module 'classnames'"); e.code = 'MODULE_NOT_FOUND'; throw e; }())(className, size ? `has-size-${size}` : "")
  });
} // Comment out to test the PHP approach defined in intro-to-block-filters.php


addFilter("blocks.getSaveContent.extraProps", "intro-to-filters/button-block/add-front-end-class", addSizeClassFrontEnd);
})();

/******/ })()
;
//# sourceMappingURL=custom_blocks.js.map