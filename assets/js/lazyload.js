/*
  hey, [be]Lazy.js - v1.8.2 - 2016.10.25
  A fast, small and dependency free lazy load script (https://github.com/dinbror/blazy)
  (c) Bjoern Klinggaard - @bklinggaard - http://dinbror.dk/blazy
*/

!(function (t, e) {
  "function" == typeof define && define.amd ? define(e) : "object" == typeof exports ? (module.exports = e()) : (t.LazyLoad = e());
})(this, function () {
  function t(t) {
    var o = t._util;
    (o.elements = (function (t) {
      for (var e = [], o = (t = t.root.querySelectorAll(t.selector)).length; o--; e.unshift(t[o]));
      return e;
    })(t.options)),
      (o.count = o.elements.length),
      o.destroyed &&
      ((o.destroyed = !1),
        t.options.container &&
        f(t.options.container, function (t) {
          l(t, "scroll", o.validateT);
        }),
        l(window, "resize", o.saveViewportOffsetT),
        l(window, "resize", o.validateT),
        l(window, "scroll", o.validateT)),
      e(t);
  }
  function e(t) {
    for (var e = t._util, n = 0; n < e.count; n++) {
      var s,
        i = e.elements[n],
        a = i;
      s = t.options;
      var c = a.getBoundingClientRect();
      s.container && h && (a = a.closest(s.containerClass))
        ? (s = !!o((a = a.getBoundingClientRect()), v) && o(c, { top: a.top - s.offset, right: a.right + s.offset, bottom: a.bottom + s.offset, left: a.left - s.offset }))
        : (s = o(c, v)),
        (s || r(i, t.options.successClass)) && (t.load(i), e.elements.splice(n, 1), e.count--, n--);
    }
    0 === e.count && t.destroy();
  }
  function o(t, e) {
    return t.right >= e.left && t.bottom >= e.top && t.left <= e.right && t.top <= e.bottom;
  }
  function n(t, e, o) {
    if (!r(t, o.successClass) && (e || o.loadInvisible || (0 < t.offsetWidth && 0 < t.offsetHeight)))
      if ((e = t.getAttribute(p) || t.getAttribute(o.src))) {
        var n = (e = e.split(o.separator))[m && 1 < e.length ? 1 : 0],
          c = t.getAttribute(o.srcset),
          d = "img" === t.nodeName.toLowerCase(),
          v = (e = t.parentNode) && "picture" === e.nodeName.toLowerCase();
        if (d || void 0 === t.src) {
          var h = new Image(),
            g = function () {
              o.error && o.error(t, "invalid"), a(t, o.errorClass), u(h, "error", g), u(h, "load", w);
            },
            w = function () {
              d ? v || i(t, n, c) : (t.style.backgroundImage = 'url("' + n + '")'), s(t, o), u(h, "load", w), u(h, "error", g);
            };
          v &&
            ((h = t),
              f(e.getElementsByTagName("source"), function (t) {
                var e = o.srcset,
                  n = t.getAttribute(e);
                n && (t.setAttribute("srcset", n), t.removeAttribute(e));
              })),
            l(h, "error", g),
            l(h, "load", w),
            i(h, n, c);
        } else (t.src = n), s(t, o);
      } else
        "video" === t.nodeName.toLowerCase()
          ? (f(t.getElementsByTagName("source"), function (t) {
            var e = o.src,
              n = t.getAttribute(e);
            n && (t.setAttribute("src", n), t.removeAttribute(e));
          }),
            t.load(),
            s(t, o))
          : (o.error && o.error(t, "missing"), a(t, o.errorClass));
  }
  function s(t, e) {
    a(t, e.successClass),
      e.success && e.success(t),
      t.removeAttribute(e.src),
      t.removeAttribute(e.srcset),
      f(e.breakpoints, function (e) {
        t.removeAttribute(e.src);
      });
  }
  function i(t, e, o) {
    o && t.setAttribute("srcset", o), (t.src = e);
  }
  function r(t, e) {
    return -1 !== (" " + t.className + " ").indexOf(" " + e + " ");
  }
  function a(t, e) {
    r(t, e) || (t.className += " " + e);
  }
  function c(t) {
    (v.bottom = (window.innerHeight || document.documentElement.clientHeight) + t), (v.right = (window.innerWidth || document.documentElement.clientWidth) + t);
  }
  function l(t, e, o) {
    t.attachEvent ? t.attachEvent && t.attachEvent("on" + e, o) : t.addEventListener(e, o, { capture: !1, passive: !0 });
  }
  function u(t, e, o) {
    t.detachEvent ? t.detachEvent && t.detachEvent("on" + e, o) : t.removeEventListener(e, o, { capture: !1, passive: !0 });
  }
  function f(t, e) {
    if (t && e) for (var o = t.length, n = 0; n < o && !1 !== e(t[n], n); n++);
  }
  function d(t, e, o) {
    var n = 0;
    return function () {
      var s = +new Date();
      s - n < e || ((n = s), t.apply(o, arguments));
    };
  }
  var p, v, m, h;
  return function (o) {
    if (!document.querySelectorAll) {
      var s = document.createStyleSheet();
      document.querySelectorAll = function (t, e, o, n, i) {
        for (i = document.all, e = [], o = (t = t.replace(/\[for\b/gi, "[htmlFor").split(",")).length; o--;) {
          for (s.addRule(t[o], "k:v"), n = i.length; n--;) i[n].currentStyle.k && e.push(i[n]);
          s.removeRule(0);
        }
        return e;
      };
    }
    var i = this,
      r = (i._util = {});
    (r.elements = []),
      (r.destroyed = !0),
      (i.options = o || {}),
      (i.options.error = i.options.error || !1),
      (i.options.offset = i.options.offset || 100),
      (i.options.root = i.options.root || document),
      (i.options.success = i.options.success || !1),
      (i.options.selector = i.options.selector || ".lazy-laod"),
      (i.options.separator = i.options.separator || "|"),
      (i.options.containerClass = i.options.container),
      (i.options.container = !!i.options.containerClass && document.querySelectorAll(i.options.containerClass)),
      (i.options.errorClass = i.options.errorClass || "lazy-error"),
      (i.options.breakpoints = i.options.breakpoints || !1),
      (i.options.loadInvisible = i.options.loadInvisible || !1),
      (i.options.successClass = i.options.successClass || "lazy-loaded"),
      (i.options.validateDelay = i.options.validateDelay || 25),
      (i.options.saveViewportOffsetDelay = i.options.saveViewportOffsetDelay || 50),
      (i.options.srcset = i.options.srcset || "data-srcset"),
      (i.options.src = p = i.options.src || "data-src"),
      (h = Element.prototype.closest),
      (m = 1 < window.devicePixelRatio),
      ((v = {}).top = 0 - i.options.offset),
      (v.left = 0 - i.options.offset),
      (i.revalidate = function () {
        t(i);
      }),
      (i.load = function (t, e) {
        var o = this.options;
        void 0 === t.length
          ? n(t, e, o)
          : f(t, function (t) {
            n(t, e, o);
          });
      }),
      (i.destroy = function () {
        var t = this._util;
        this.options.container &&
          f(this.options.container, function (e) {
            u(e, "scroll", t.validateT);
          }),
          u(window, "scroll", t.validateT),
          u(window, "resize", t.validateT),
          u(window, "resize", t.saveViewportOffsetT),
          (t.count = 0),
          (t.elements.length = 0),
          (t.destroyed = !0);
      }),
      (r.validateT = d(
        function () {
          e(i);
        },
        i.options.validateDelay,
        i
      )),
      (r.saveViewportOffsetT = d(
        function () {
          c(i.options.offset);
        },
        i.options.saveViewportOffsetDelay,
        i
      )),
      c(i.options.offset),
      f(i.options.breakpoints, function (t) {
        if (t.width >= window.screen.width) return (p = t.src), !1;
      }),
      setTimeout(function () {
        t(i);
      });
  };
});
