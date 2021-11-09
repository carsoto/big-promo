/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /home/axdev/code/big-promo/package.json: Error while parsing JSON - Unexpected token < in JSON at position 1182\n    at JSON.parse (<anonymous>)\n    at /home/axdev/code/big-promo/node_modules/@babel/core/lib/config/files/package.js:57:20\n    at /home/axdev/code/big-promo/node_modules/@babel/core/lib/config/files/utils.js:36:12\n    at Generator.next (<anonymous>)\n    at Function.<anonymous> (/home/axdev/code/big-promo/node_modules/@babel/core/lib/gensync-utils/async.js:26:3)\n    at Generator.next (<anonymous>)\n    at step (/home/axdev/code/big-promo/node_modules/gensync/index.js:261:32)\n    at /home/axdev/code/big-promo/node_modules/gensync/index.js:273:13\n    at async.call.result.err.err (/home/axdev/code/big-promo/node_modules/gensync/index.js:223:11)\n    at /home/axdev/code/big-promo/node_modules/gensync/index.js:189:28\n    at FSReqCallback.readFileAfterClose [as oncomplete] (internal/fs/read_file_context.js:63:3)");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/css-loader/index.js):\nModuleBuildError: Module build failed (from ./node_modules/sass-loader/dist/cjs.js):\nSassError: expected \"{\".\n    ╷\n179 │ @import 'video.scss';\n    │                     ^\n    ╵\n  /home/axdev/code/big-promo/resources/sass/app.scss 179:21  root stylesheet\n    at /home/axdev/code/big-promo/node_modules/webpack/lib/NormalModule.js:316:20\n    at /home/axdev/code/big-promo/node_modules/loader-runner/lib/LoaderRunner.js:367:11\n    at /home/axdev/code/big-promo/node_modules/loader-runner/lib/LoaderRunner.js:233:18\n    at context.callback (/home/axdev/code/big-promo/node_modules/loader-runner/lib/LoaderRunner.js:111:13)\n    at /home/axdev/code/big-promo/node_modules/sass-loader/dist/index.js:73:7\n    at Function.call$2 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:90547:16)\n    at _render_closure1.call$2 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:79617:12)\n    at _RootZone.runBinary$3$3 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:27035:18)\n    at _FutureListener.handleError$1 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25563:19)\n    at _Future__propagateToListeners_handleError.call$0 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25860:49)\n    at Object._Future__propagateToListeners (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:4539:77)\n    at _Future._completeError$2 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25693:9)\n    at _AsyncAwaitCompleter.completeError$2 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25036:12)\n    at Object._asyncRethrow (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:4288:17)\n    at /home/axdev/code/big-promo/node_modules/sass/sass.dart.js:13174:20\n    at _wrapJsFunctionForAsync_closure.$protected (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:4313:15)\n    at _wrapJsFunctionForAsync_closure.call$2 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25057:12)\n    at _awaitOnObject_closure0.call$2 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25049:25)\n    at _RootZone.runBinary$3$3 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:27035:18)\n    at _FutureListener.handleError$1 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25563:19)\n    at _Future__propagateToListeners_handleError.call$0 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25860:49)\n    at Object._Future__propagateToListeners (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:4539:77)\n    at _Future._completeError$2 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25693:9)\n    at _Future__asyncCompleteError_closure.call$0 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:25782:18)\n    at Object._microtaskLoop (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:4590:24)\n    at StaticClosure._startMicrotaskLoop (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:4596:11)\n    at _AsyncRun__scheduleImmediateJsOverride_internalCallback.call$0 (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:24947:21)\n    at invokeClosure (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:1397:26)\n    at Immediate.<anonymous> (/home/axdev/code/big-promo/node_modules/sass/sass.dart.js:1418:18)\n    at processImmediate (internal/timers.js:461:21)");

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /home/axdev/code/big-promo/resources/js/app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! /home/axdev/code/big-promo/resources/sass/app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });