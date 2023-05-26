/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/main.js":
/*!******************************!*\
  !*** ./resources/js/main.js ***!
  \******************************/
/***/ (() => {

 // import Tick from '../../../node_modules/@pqina/flip/dist/flip.module.js';
// import Tick from '@pqina/flip'; 
// import Swiper from "swiper";

function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

document.addEventListener("DOMContentLoaded", function () {
  var logosliderworktime = new Swiper('.main-slider', {
    slidesPerView: 1,
    spaceBetween: 0,
    // loop:true,	
    pagination: {
      el: '.m-pagination',
      clickable: true //   type: 'fraction',

    },
    navigation: {
      nextEl: '.m-next',
      prevEl: '.m-prev'
    },
    autoplay: {
      delay: 10000
    },
    on: {
      init: function init() {
        // $('.counts .current').text();
        var index = this.activeIndex + 1;
        var totalSlides = this.slides.length;
        $('.counts .current').text(index);
        $('.counts .total').text(totalSlides);
      },
      slideChange: function slideChange() {
        var index = this.activeIndex + 1;
        $('.counts .current').text(index);
      }
    }
  });
  var projectslider = new Swiper('.project-slider', {
    slidesPerView: 1,
    spaceBetween: 0,
    // loop:true,	
    pagination: {
      el: '.p-pagination',
      clickable: true //   type: 'fraction',

    },
    navigation: {
      nextEl: '.p-next',
      prevEl: '.p-prev'
    },
    on: {
      init: function init() {},
      slideChange: function slideChange() {}
    }
  });
  $('.menu-item-has-children .open-sub').click(function (e) {
    $(this).parent().find('>.sub-menu').slideToggle();
    $(this).toggleClass('opened');
  });
  $(".phone-mask").inputmask("+7(999)999-99-99", {
    showMaskOnFocus: true
  }); // burger animation

  var toggles = document.querySelectorAll(".cmn-toggle-switch");

  for (var i = toggles.length - 1; i >= 0; i--) {
    var toggle = toggles[i];
    toggleHandler(toggle);
  }

  ;

  function toggleHandler(toggle) {
    toggle.addEventListener("click", function (e) {
      e.preventDefault();

      if (this.classList.contains("active") === true) {
        this.classList.remove("active");
      } else {
        this.classList.add("active");
      }
    });
  } // menu open


  $('.cmn-toggle-switch').click(function () {
    var menu = $('.cmn-toggle-switch__htx');

    if (menu.hasClass('active')) {
      $('.menu-wrap').animate({
        "right": "0px"
      });
      $('.overlay').fadeIn();
    } else {
      $('.menu-wrap').animate({
        "right": "-100%"
      });
      $('.overlay').fadeOut();
    }
  });
  $('.s-item__header').click(function (e) {
    e.preventDefault();
    $(this).closest('.s-item').find('.s-item__body').slideToggle();
    $(this).toggleClass('opened');
  }); // menu close
  // document.querySelector('.menu-wrap__inner .close').onclick = function(e) {
  // 	e.preventDefault();
  // 	let menuwrap=document.querySelector(".menu-wrap");
  // 	menuwrap.classList.remove("open-menu");   	
  // 	document.querySelector(".cmn-toggle-switch").classList.remove('active');	
  // }
  // ask events
  // var askitems = document.querySelectorAll('.ask-item__header');    
  // [].forEach.call( askitems, function(el) {		
  // 	el.onclick = function(e) {
  // 		this.classList.toggle('header_opened');
  // 		this.nextElementSibling.classList.toggle('body_opened');			
  // 	}
  // });

  if (document.body.contains(document.querySelector('.open-modal'))) {
    document.querySelector('.open-modal').onclick = function (e) {
      e.preventDefault();
      document.querySelector('.modal-overlay_1').classList.toggle('modal-opened');
      document.querySelector('.modal-overlay_1').classList.toggle('fade-in');
    };
  }

  if ($('.sidebar .sub-menu .current-menu-item').length > 0) {
    $('.current-menu-parent').find('.open-sub').addClass('opened');
  }

  if (document.body.contains(document.querySelector('.sidebar .sub-menu .current-menu-item'))) {}

  document.addEventListener('wpcf7mailsent', function (event) {
    if ('125' == event.detail.contactFormId || '124' == event.detail.contactFormId) {
      $.fancybox.close();
      $.fancybox.open({
        src: '#modal-success',
        type: 'inline',
        'showCloseButton': false
      });
      setTimeout(function () {
        $.fancybox.close();
      }, 3000);
    }
  }, false); // document.querySelector('.modal__close').onclick = function(e) {		
  // 	e.preventDefault();
  // 	document.querySelector('.modal-overlay_1').classList.remove('modal-opened');		
  // };

  var anchors = document.querySelectorAll('a.go-home');

  var _iterator = _createForOfIteratorHelper(anchors),
      _step;

  try {
    var _loop = function _loop() {
      var anchor = _step.value;
      anchor.addEventListener('click', function (e) {
        e.preventDefault();
        var blockID = anchor.getAttribute('href');
        document.querySelector(blockID).scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      });
    };

    for (_iterator.s(); !(_step = _iterator.n()).done;) {
      _loop();
    }
  } catch (err) {
    _iterator.e(err);
  } finally {
    _iterator.f();
  }

  document.querySelector('.input-file input').addEventListener('change', function () {
    var splittedFakePath = this.value.split('\\');
    document.querySelector('.input-file label').textContent = splittedFakePath[splittedFakePath.length - 1];
  });
});

/***/ }),

/***/ "./resources/scss/main.scss":
/*!**********************************!*\
  !*** ./resources/scss/main.scss ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		if(__webpack_module_cache__[moduleId]) {
/******/ 			return __webpack_module_cache__[moduleId].exports;
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
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/******/ 	// the startup function
/******/ 	// It's empty as some runtime module handles the default behavior
/******/ 	__webpack_require__.x = x => {};
/************************************************************************/
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
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// Promise = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/js/bundle": 0
/******/ 		};
/******/ 		
/******/ 		var deferredModules = [
/******/ 			["./resources/js/main.js"],
/******/ 			["./resources/scss/main.scss"]
/******/ 		];
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		var checkDeferredModules = x => {};
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime, executeModules] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0, resolves = [];
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					resolves.push(installedChunks[chunkId][0]);
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			for(moduleId in moreModules) {
/******/ 				if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 					__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 				}
/******/ 			}
/******/ 			if(runtime) runtime(__webpack_require__);
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			while(resolves.length) {
/******/ 				resolves.shift()();
/******/ 			}
/******/ 		
/******/ 			// add entry modules from loaded chunk to deferred list
/******/ 			if(executeModules) deferredModules.push.apply(deferredModules, executeModules);
/******/ 		
/******/ 			// run deferred modules when all chunks ready
/******/ 			return checkDeferredModules();
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunk"] = self["webpackChunk"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 		
/******/ 		function checkDeferredModulesImpl() {
/******/ 			var result;
/******/ 			for(var i = 0; i < deferredModules.length; i++) {
/******/ 				var deferredModule = deferredModules[i];
/******/ 				var fulfilled = true;
/******/ 				for(var j = 1; j < deferredModule.length; j++) {
/******/ 					var depId = deferredModule[j];
/******/ 					if(installedChunks[depId] !== 0) fulfilled = false;
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferredModules.splice(i--, 1);
/******/ 					result = __webpack_require__(__webpack_require__.s = deferredModule[0]);
/******/ 				}
/******/ 			}
/******/ 			if(deferredModules.length === 0) {
/******/ 				__webpack_require__.x();
/******/ 				__webpack_require__.x = x => {};
/******/ 			}
/******/ 			return result;
/******/ 		}
/******/ 		var startup = __webpack_require__.x;
/******/ 		__webpack_require__.x = () => {
/******/ 			// reset startup function so it can be called again when more startup code is added
/******/ 			__webpack_require__.x = startup || (x => {});
/******/ 			return (checkDeferredModules = checkDeferredModulesImpl)();
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// run startup
/******/ 	var __webpack_exports__ = __webpack_require__.x();
/******/ 	
/******/ })()
;
//# sourceMappingURL=bundle.js.map