function FrontEndMenu() {
    return {
        Selectmenu: function (n) {
            $("#navMenu .navbar ul li a")
                .removeClass("selected"), $("#navMenu .navbar ul li a:eq(" + n + ")")
                .addClass("selected")
        }
    }
}
function hilightZebraCrossing(n) {
    n == null && (n = ".lstable"), $("tbody tr:odd", n)
        .removeClass("even")
        .addClass("odd"), $("tbody tr:even", n)
        .removeClass("odd")
        .addClass("even")
}
function OpenMark() {
    var t = $(document)
        .height(),
        n = $(window)
            .width();
    $("#mask")
        .css({
        width: n,
        height: t
    }), $("#mask")
        .fadeIn(100), $("#mask")
        .fadeTo("fast", .8)
}
var _xdealcate, _JSPersonalPage;
(function (n) {
    function i(n) {
        return typeof n == "object" ? n : {
            top: n,
            left: n
        }
    }
    var t = n.scrollTo = function (t, i, r) {
        n(window)
            .scrollTo(t, i, r)
    };
    t.defaults = {
        axis: "xy",
        duration: parseFloat(n.fn.jquery) >= 1.3 ? 0 : 1
    }, t.window = function () {
        return n(window)
            ._scrollable()
    }, n.fn._scrollable = function () {
        return this.map(function () {
            var t = this,
                r = !t.nodeName || n.inArray(t.nodeName.toLowerCase(), ["iframe", "#document", "html", "body"]) != -1,
                i;
            return r ? (i = (t.contentWindow || t)
                .document || t.ownerDocument || t, n.browser.safari || i.compatMode == "BackCompat" ? i.body : i.documentElement) : t
        })
    }, n.fn.scrollTo = function (r, u, f) {
        return typeof u == "object" && (f = u, u = 0), typeof f == "function" && (f = {
            onAfter: f
        }), r == "max" && (r = 9e9), f = n.extend({}, t.defaults, f), u = u || f.speed || f.duration, f.queue = f.queue && f.axis.length > 1, f.queue && (u /= 2), f.offset = i(f.offset), f.over = i(f.over), this._scrollable()
            .each(function () {
            function l(n) {
                c.animate(o, u, f.easing, n && function () {
                    n.call(this, r, f)
                })
            }
            var h = this,
                c = n(h),
                e = r,
                s, o = {}, a = c.is("html,body");
            switch (typeof e) {
            case "number":
            case "string":
                if (/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(e)) {
                    e = i(e);
                    break
                }
                e = n(e, this);
            case "object":
                (e.is || e.style) && (s = (e = n(e))
                    .offset())
            }
            n.each(f.axis.split(""), function (n, i) {
                var y = i == "x" ? "Left" : "Top",
                    u = y.toLowerCase(),
                    r = "scroll" + y,
                    p = h[r],
                    w = t.max(h, i),
                    v;
                s ? (o[r] = s[u] + (a ? 0 : p - c.offset()[u]), f.margin && (o[r] -= parseInt(e.css("margin" + y)) || 0, o[r] -= parseInt(e.css("border" + y + "Width")) || 0), o[r] += f.offset[u] || 0, f.over[u] && (o[r] += e[i == "x" ? "width" : "height"]() * f.over[u])) : (v = e[u], o[r] = v.slice && v.slice(-1) == "%" ? parseFloat(v) / 100 * w : v), /^\d+$/.test(o[r]) && (o[r] = o[r] <= 0 ? 0 : Math.min(o[r], w)), !n && f.queue && (p != o[r] && l(f.onAfterFirst), delete o[r])
            }), l(f.onAfter)
        })
            .end()
    }, t.max = function (t, i) {
        var u = i == "x" ? "Width" : "Height",
            r = "scroll" + u;
        if (!n(t)
            .is("html,body")) return t[r] - n(t)[u.toLowerCase()]();
        var o = "client" + u,
            e = t.ownerDocument.documentElement,
            f = t.ownerDocument.body;
        return Math.max(e[r], f[r]) - Math.min(e[o], f[o])
    }
})(jQuery), _xdealcate = {
    init: function () {
        this.loadbestseller(), this.loadMore()
    },
    loadbestseller: function () {
        $("#ifrdost")
            .unbind("load")
            .load(function () {
            var n = $("#ifrdost")
                .contents()
                .find("body")
                .html();
            $("#slider")
                .html($(n)
                .find("#slider")
                .html()), $("#slider")
                .easySlider({
                auto: !0,
                continuous: !0,
                pause: 4e3,
                speed: 500,
                prevId: "bob_prev",
                prevText: "",
                nextId: "bob_next",
                nextText: ""
            })
        }), $("#frdost")
            .attr("target", "ifrdost"), $("#frdost")
            .submit()
    },
    pause: !1,
    loadMore: function () {
        $(window)
            .scroll(function () {
            if ($(window)
                .scrollTop() + 200 >= $(document)
                .height() - $(window)
                .height() && _xdealcate.pause == !1) {
                _xdealcate.pause = !0;
                var n = $("#frdost2 #npage")
                    .val();
                return n == 0 ? !1 : ($(".ls_deal_of_category .loading_more")
                    .show(), $("#ifrdost2")
                    .unbind("load")
                    .load(function () {
                    var n = $("#ifrdost2")
                        .contents()
                        .find("body")
                        .html(),
                        t = $(n)
                            .find("#npage")
                            .val();
                    $("#frdost2 #npage")
                        .val(t), $(".ls_deal_of_category .ls_cate_product")
                        .append($(n)
                        .find(".ls_cate_product")
                        .html()), $(".ls_deal_of_category .loading_more")
                        .hide(), _xdealcate.pause = !1
                }), $("#frdost2")
                    .attr("target", "ifrdost2"), $("#frdost2")
                    .submit(), !1)
            }
        })
    }
}, $(function () {
    var n = new FrontEndMenu;
    n.Selectmenu(0), _glbInitLazyLoad.init(".ls_deal_of_category img"), _xdealcate.init()
}), $(function () {
    _JSPersonalPage.Init()
}), _JSPersonalPage = {
    Init: function () {
        _JSPersonalPage.ViewOrderDetailClick(), _JSPersonalPage.CloseOrderDetailBox(), _JSPersonalPage.EscapeKeyPressed(".order-detail-box"), _JSPersonalPage.HilightTable(".table-content .lstable"), _JSPersonalPage.HilightTable(".orderdetail-table"), _JSPersonalPage.Selectmenu2(1), _JSPersonalPage.LookUpPaymentMethodClick(), _JSPersonalPage.NumberOnly("#tbxMobile")
    },
    HilightTable: function (n) {
        n == null && (n = ".lstable"), $(">tbody >tr:odd", n)
            .removeClass("even")
            .addClass("odd"), $(">tbody >tr:even", n)
            .removeClass("odd")
            .addClass("even")
    },
    NumberOnly: function (n) {
        $(n)
            .keyup(function () {
            this.value = this.value.replace(/[^0-9]/g, "")
        })
    },
    ViewOrderDetailClick: function () {
        $(".lstable tbody a.btnViewDetail")
            .click(function () {
            var r = $(this)
                .parent(),
                n = $(".detail-box .order-detail-box", r),
                t, i;
            OpenMark(), t = $(window)
                .height(), i = $(window)
                .width(), $(n)
                .css("top", t / 2 - $(n)
                .height() / 2 - 100), $(n)
                .css("left", i / 2 - $(n)
                .width() / 2), $(n)
                .fadeIn(100)
        })
    },
    CloseOrderDetailBox: function () {
        $(".btnClose")
            .click(function () {
            $(".detail-box .order-detail-box")
                .hide(), CloseMark()
        })
    },
    EscapeKeyPressed: function (n) {
        $(document)
            .keypress(function (t) {
            t.keyCode == 27 && ($(n)
                .hide(), CloseMark())
        })
    },
    Selectmenu: function (n) {
        $("#navMenu .navbar ul li a")
            .removeClass("selected"), $(".rightContent .personal .content ul li")
            .removeClass("selected"), $(".rightContent .personal .content ul li:eq(" + n + ")")
            .addClass("selected")
    },
    Selectmenu2: function (n) {
        $("#navMenu .navbar ul li a")
            .removeClass("selected"), $(".leftContent .personal-nav .personal-bar ul li")
            .removeClass("selected"), $(".leftContent .personal-nav .personal-bar ul li:eq(" + n + ")")
            .addClass("selected")
    },
    LookUpPaymentMethodClick: function () {
        $(".lstable tbody td .btnLookupTT")
            .click(function () {
            var n = $(this).attr("posit");
            $.scrollTo(".pttt-index-" + n, 500)
        })
    }
}