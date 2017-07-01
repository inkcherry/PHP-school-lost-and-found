;(function(window) {

var svgSprite = '<svg>' +
  ''+
    '<symbol id="icon-fangdajing" viewBox="0 0 1024 1024">'+
      ''+
      '<path d="M870.44096 800.1536l-176.41472-176.49664c-2.08896-2.08896-4.34176-3.60448-6.47168-5.28384 29.77792-45.71136 47.14496-100.18816 47.14496-158.9248 0-161.21856-130.62144-291.84-291.88096-291.84-161.13664 0-291.88096 130.62144-291.88096 291.84 0 161.25952 130.74432 291.88096 291.88096 291.88096 58.65472 0 113.21344-17.44896 159.00672-47.26784 1.67936 2.2528 3.19488 4.38272 5.24288 6.47168l176.45568 176.49664c12.00128 12.00128 27.72992 17.94048 43.45856 17.94048s31.41632-5.9392 43.45856-17.94048C894.3616 863.0272 894.3616 824.15616 870.44096 800.1536M442.85952 659.21024c-110.10048 0-199.68-89.62048-199.68-199.72096s89.62048-199.68 199.68-199.68 199.72096 89.62048 199.72096 199.68S552.91904 659.21024 442.85952 659.21024"  ></path>'+
      ''+
    '</symbol>'+
  ''+
'</svg>'
var script = function() {
    var scripts = document.getElementsByTagName('script')
    return scripts[scripts.length - 1]
  }()
var shouldInjectCss = script.getAttribute("data-injectcss")

/**
 * document ready
 */
var ready = function(fn){
  if(document.addEventListener){
      document.addEventListener("DOMContentLoaded",function(){
          document.removeEventListener("DOMContentLoaded",arguments.callee,false)
          fn()
      },false)
  }else if(document.attachEvent){
     IEContentLoaded (window, fn)
  }

  function IEContentLoaded (w, fn) {
      var d = w.document, done = false,
      // only fire once
      init = function () {
          if (!done) {
              done = true
              fn()
          }
      }
      // polling for no errors
      ;(function () {
          try {
              // throws errors until after ondocumentready
              d.documentElement.doScroll('left')
          } catch (e) {
              setTimeout(arguments.callee, 50)
              return
          }
          // no errors, fire

          init()
      })()
      // trying to always fire before onload
      d.onreadystatechange = function() {
          if (d.readyState == 'complete') {
              d.onreadystatechange = null
              init()
          }
      }
  }
}

/**
 * Insert el before target
 *
 * @param {Element} el
 * @param {Element} target
 */

var before = function (el, target) {
  target.parentNode.insertBefore(el, target)
}

/**
 * Prepend el to target
 *
 * @param {Element} el
 * @param {Element} target
 */

var prepend = function (el, target) {
  if (target.firstChild) {
    before(el, target.firstChild)
  } else {
    target.appendChild(el)
  }
}

function appendSvg(){
  var div,svg

  div = document.createElement('div')
  div.innerHTML = svgSprite
  svg = div.getElementsByTagName('svg')[0]
  if (svg) {
    svg.setAttribute('aria-hidden', 'true')
    svg.style.position = 'absolute'
    svg.style.width = 0
    svg.style.height = 0
    svg.style.overflow = 'hidden'
    prepend(svg,document.body)
  }
}

if(shouldInjectCss && !window.__iconfont__svg__cssinject__){
  window.__iconfont__svg__cssinject__ = true
  try{
    document.write("<style>.svgfont {display: inline-block;width: 1em;height: 1em;fill: currentColor;vertical-align: -0.1em;font-size:16px;}</style>");
  }catch(e){
    console && console.log(e)
  }
}

ready(appendSvg)


})(window)
