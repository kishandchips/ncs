!function(n,e,t){var i=function(n){return n.trim?n.trim():n.replace(/^\s+|\s+$/g,"")},a=function(n,e){return-1!==(" "+n.className+" ").indexOf(" "+e+" ")},o=function(n,e){a(n,e)||(n.className=""===n.className?e:n.className+" "+e)},r=function(n,e){n.className=i((" "+n.className+" ").replace(" "+e+" "," "))},s=function(n,e){if(n)do{if(n.id===e)return!0;if(9===n.nodeType)break}while(n=n.parentNode);return!1},d=e.documentElement,c=n.Modernizr.prefixed("transform"),l=n.Modernizr.prefixed("transition"),v=function(){var n={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",msTransition:"MSTransitionEnd",transition:"transitionend"};return n.hasOwnProperty(l)?n[l]:!1}();n.App=function(){var t=!1,i={},c=e.getElementById("content"),u=!1,f="js-nav";return i.init=function(){if(!t){t=!0;var m=function(n){n&&n.target===c&&e.removeEventListener(v,m,!1),u=!1};i.closeNav=function(){if(u){var t=v&&l?parseFloat(n.getComputedStyle(c,"")[l+"Duration"]):0;t>0?e.addEventListener(v,m,!1):m(null)}r(d,f),e.getElementById("nav-open-btn").classList.toggle("active")},i.openNav=function(){u||(o(d,f),u=!0,e.getElementById("nav-open-btn").classList.toggle("active"))},i.toggleNav=function(n){u&&a(d,f)?i.closeNav():i.openNav(),n&&n.preventDefault()},e.getElementById("nav-open-btn").addEventListener("click",i.toggleNav,!1),e.getElementById("nav-close-btn").addEventListener("click",i.toggleNav,!1),e.addEventListener("click",function(n){u&&!s(n.target,"nav")&&i.closeNav()},!0),o(d,"js-ready")}},i}(),n.addEventListener&&n.addEventListener("DOMContentLoaded",n.App.init,!1)}(window,window.document);