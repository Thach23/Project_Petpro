<!DOCTYPE html>
<html lang="en">

<head>
    @include('Partital_Share.GGAnalytics2Partial', ['GgAnalytics' => $GgAnalytics])

    {{-- <script async src="https://cse.google.com/cse.js?cx=466f66a2c6149ef59"></script> --}}
    @if ($Meta['collection'] != null)
        <meta charset="UTF-8" />
        {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0" /> --}}
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
        <!--Meta key word-->
        @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'keyword')
                <meta name="keywords" content="{{ $val->Value }}">
            @endif
        @endforeach

        <!--Meta Title-->
        @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'title')
                <meta name="og:title" content="{{ $val->Value }}">
                <title>{{ $val->Value }}</title>
            @endif
        @endforeach

        <!-- meta facebook -->
        <meta name="og:type" content="website">
        <meta name="og:site_name" content="PetPro">
        <meta name="og:locale" content="vi_VN">
        <meta name="og:url" content="https://petpro.com.vn">
        @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'image')
                <meta name="og:image" content="{{ $val->Value }}">
            @endif
        @endforeach

        <!--Meta Description-->
        @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'description')
                <meta name="description" content="{{ $val->Value }}">
                <meta name="og:description" content="{{ $val->Value }}">
            @endif
        @endforeach

        <!-- meta twitter -->
        @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'title')
                <meta name="twitter:title" content="{{ $val->Value }}">
            @endif
        @endforeach

        @foreach ($Meta['collection'] as $val)
            @if ($val->Description == 'description')
                <meta name="twitter:description" content="{{ $val->Value }}">
            @endif
        @endforeach
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:domain" content="https://petpro.com.vn/">
        <meta name="twitter:image" content="https://petpro.com.vn/images/common/ogp.jpg">
        <!-- add to home screen name -->
        <meta name="apple-mobile-web-app-title" data-hid="apple-mobile-web-app-title" content="PetPro">
        <meta name="application-name" data-hid="application-name" content="PetPro">
    @else
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1" />
        <!--Meta key word-->
        <meta name="keywords" content="{{ $Meta['blog']->MetaKeywords }}">

        <!--Meta Title-->
        <meta name="og:title" content="{{ $Meta['blog']->MetaTitle }}">
        <title>{{ $Meta['blog']->MetaTitle }}</title>

        <!-- meta facebook -->
        <meta name="og:type" content="website">
        <meta name="og:site_name" content="PetPro">
        <meta name="og:locale" content="vi_VN">
        <meta name="og:url" content="https://petpro.com/">
        <meta name="og:image" content="{{ $Meta['blog']->BlogImage }}">
        <!--Meta Title-->
        <meta name="description" content="{{ $Meta['blog']->MetaDescription }}">
        <meta name="og:description" content="{{ $Meta['blog']->MetaDescription }}">

        <!-- meta twitter -->
        <meta name="twitter:title" content="{{ $Meta['blog']->MetaTitle }}">
        <meta name="twitter:description" content="{{ $Meta['blog']->MetaDescription }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:domain" content="https://petpro.com.vn/">
        <meta name="twitter:image" content="https://petpro.com.vn/images/common/ogp.jpg">
        <!-- add to home screen name -->
        <meta name="apple-mobile-web-app-title" data-hid="apple-mobile-web-app-title" content="PetPro">
        <meta name="application-name" data-hid="application-name" content="PetPro">
    @endif
    <!--Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet">
    <!-- icon -->
    <link rel="icon" type="image/svg+xml" href="/assets/logo.061b39cb.svg" />
    <link rel="apple-touch-icon" href="https://petpro.com.vn/images/common/apple-touch-icon.png">
    <!-- stylesheet -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/revolution/fonts/font-awesome/css/font-awesome.css') }}">
    <!-- Main Style CSSS -->
    <link href="{{ asset('assets/css/theme-plugins.min_custome.css') }}" rel="stylesheet">
    <!-- Main Theme CSS -->
    <link href="{{ asset('assets/css/style_custome.css') }}" rel="stylesheet">
    <script type="module" crossorigin src="/assets/collapse.6f9ad156.js"></script>
    <script type="module" crossorigin src="/assets/shop.48bc1008.js"></script>
    {{-- <script type="module" crossorigin src="/assets/index.974c8f5e.js"></script> --}}
    <script type="module" crossorigin src="/assets/index.0d8fd601.js"></script>
    <script type="module" crossorigin src="/assets/main.accd4bf9.js"></script>
    <script type="module" crossorigin src="/assets/shop-detail.54a5c02b.js"></script>
    <script type="module" crossorigin src="/assets/shop.11b29b94.js"></script>
    <script type="module" crossorigin src="/assets/cat-shop.4dda0059.js"></script>
    <link rel="modulepreload" href="/assets/menu.f7029f46.js">
    <link rel="modulepreload" href="/assets/hover.38850bf6.js">
    <link rel="modulepreload" href="/assets/vendor.95a61fa3.js">
    <link rel="modulepreload" href="/assets/number-counter.3c460b30.js">
    <link rel="modulepreload" href="/assets/carousel.b54df7cb.js">
    <link rel="modulepreload" href="/assets/career.58ba098a.js">
    <link rel="stylesheet" href="/assets/custom.89e0b6a8.css">
    <link rel="modulepreload" href="/assets/custom.f5eea7dd.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    {{-- <link rel="stylesheet" href="/assets/custom.b9e65f55.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/custom.d9612118.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/custom.72a5673d.css"> --}}
    {{-- <link rel="stylesheet" href="/assets/custom.6b676a4d.css"> --}}
    {{-- ----------------------------- --}}
    {{-- Recaptcha --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    {{-- Google search --}}
    {{-- <script async src="https://cse.google.com/cse.js?cx=29fae346ff9ff011a"></script> --}}
    <script async src="https://cse.google.com/cse.js?cx=60cb5e4b4f54c5881"></script>
    {{-- <script async src="https://cse.google.com/cse.js?cx=ab83258d37eda94eb"></script> --}}
    {{-- <script async src="https://cse.google.com/cse.js?cx=253d5cadf6f219b77"></script> --}}
</head>

<body>
    @include('Partital_Share.GGAnalyticsPartial', ['GgAnalytics' => $GgAnalytics])
    <!-- header -->
    <header class="text-white bg-blue-600">
        @include('Partital_Share.HeaderPartial')
    </header>
    <!-- menu -->
    @include('Partital_Share.nav')
    <!--End menu -->
    <!--Start Content-->
    @yield('content')
    <!--End Content-->
    <!-- back-to-top -->
    <div id="backToTop"
        class="fixed z-50 flex items-center justify-center w-12 h-12 transition-all bg-white rounded-full shadow-md cursor-pointer bottom-16 right-6">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 11l7-7 7 7M5 19l7-7 7 7"></path>
        </svg>
    </div>
    <!-- footer -->
    <footer class="text-gray-600 bg-white border-t border-gray-200 border-solid">
        <div class="h-full pt-6 pb-4 mx-auto md:pt-12 px-11">
            <div class="flex flex-col justify-between w-full lg:flex-row flex-nowrap">
                <div class="flex items-start md:items-center flex-col w-full md:w-[300px] mb-4 md:mb-10 md:mt-0">
                    <a class="inline-block" href="{{ route('home') }}">
                        @foreach ($Scocial_Media as $val)
                            @if ($val->Value == null || $val->IsPublic == false)
                            @else
                                <img class="w-[87px] h-[80px] md:w-[143px] md:h-[131px]" src="{{ $val->Value }}"
                                    alt="PetPro">
                            @endif
                        @endforeach

                    </a>
                    <div class="items-center justify-start hidden mt-8 md:justify-center md:flex">
                        <div>
                            <img src="/assets/registered.f04fe57d.png" alt="">
                        </div>
                        <div class="ml-4">
                            <img src="data:image/png;base64,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"
                                alt="facebook">
                        </div>
                    </div>
                </div>
                <div class="grid flex-1 grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5">
                    <div class="flex-1 px-0 mt-4 md:px-4 lg:mt-0">
                        <h3 class="pb-1 text-xs font-bold uppercase border-b border-gray-600 sm:text-sm">petpro</h3>
                        <ul class="grid grid-cols-2 md:grid-cols-1">
                            <li class="mt-3 capitalize">
                                <a href="{{ route('home') }}" class="text-[10px] sm:text-sm">Trang Chủ</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="#" class="text-[10px] sm:text-sm">shop</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('KienThucCategory') }}" class="text-[10px] sm:text-sm">kiến
                                    thức</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('DatLich') }}" class="text-[10px] sm:text-sm">đặt lịch hẹn</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('TuyenDung') }}" class="text-[10px] sm:text-sm">tuyển dụng</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('LienHe') }}" class="text-[10px] sm:text-sm">liên hệ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1 px-0 mt-4 md:px-4 lg:mt-0">
                        <h3
                            class="pb-1 text-xs font-bold uppercase border-b border-gray-600 sm:text-sm whitespace-nowrap">
                            câu chuyện petpro</h3>
                        <ul class="grid grid-cols-2 md:grid-cols-1">
                            <li class="mt-3 capitalize">
                                <a href="{{ route('GioiThieuBenhVien') }}" class="text-[10px] sm:text-sm">Giới thiệu
                                    bệnh viện</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('DoiNguBacSi') }}" class="text-[10px] sm:text-sm">đội ngũ bác
                                    sĩ</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('TrangThietBiHD') }}" class="text-[10px] sm:text-sm">trang thiết bị
                                    hiện đại</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('KHNoivePetPro') }}" class="text-[10px] sm:text-sm">khách hàng nói
                                    về PetPro</a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1 px-0 mt-4 md:px-4 lg:mt-0">
                        <h3 class="pb-1 text-xs font-bold uppercase border-b border-gray-600 sm:text-sm">chuyên khoa
                        </h3>
                        <ul class="grid grid-cols-2 md:grid-cols-1">
                            <li class="mt-3 capitalize">
                                <a href="{{ route('chuyenkhoaGroup', 'khoa-nhiem') }}"
                                    class="text-[10px] sm:text-sm">khoa nhiễm</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('chuyenkhoaGroup', 'khoa-noi') }}"
                                    class="text-[10px] sm:text-sm">khoa nội</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('chuyenkhoaGroup', 'khoa-ngoai') }}"
                                    class="text-[10px] sm:text-sm">khoa ngoại</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('chuyenkhoaGroup', 'tiem-phong') }}"
                                    class="text-[10px] sm:text-sm">tiêm phòng</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('chuyenkhoaGroup', 'sieu-am') }}"
                                    class="text-[10px] sm:text-sm">Siêu âm</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('chuyenkhoaGroup', 'x-quang') }}"
                                    class="text-[10px] sm:text-sm">X-Quang</a>
                            </li>
                            <li class="mt-3 capitalize">
                                <a href="{{ route('chuyenkhoaGroup', 'xet-nghiem') }}"
                                    class="text-[10px] sm:text-sm">xét nghiệm</a>
                            </li>
                        </ul>
                    </div>
                    <div class="flex-1 col-span-1 px-0 mt-4 md:px-4 lg:mt-0 lg:col-span-2">
                        <h3 class="pb-1 text-xs font-bold uppercase border-b border-gray-600 sm:text-sm">dịch vụ</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <ul class="flex-1">
                                <li class="mt-3 capitalize">
                                    <a href="{{ route('dichvuGroup', 'cap-cuu-247') }}"
                                        class="text-[10px] sm:text-sm">cấp cứu 24/7</a>
                                </li>
                                <li class="mt-3 capitalize">
                                    <a href="{{ route('dichvuGroup', 'kham-benh-tai-nha') }}"
                                        class="text-[10px] sm:text-sm">Khám Bệnh Tại Nhà</a>
                                </li>
                                <li class="mt-3 capitalize"><a
                                        href="{{ route('dichvuGroup', 'cham-soc-rang-mieng') }}"
                                        class="text-[10px] sm:text-sm">Chăm Sóc Răng Miệng</a></li>
                                <li class="mt-3 capitalize"><a href="{{ route('dichvuGroup', 'thuoc-ke-toa') }}"
                                        class="text-[10px] sm:text-sm">Thuốc Kê Toa</a></li>
                                <li class="mt-3 capitalize"><a href="{{ route('dichvuGroup', 'bao-hiem') }}"
                                        class="text-[10px] sm:text-sm">bảo Hiểm</a></li>
                            </ul>
                            <ul class="flex-1">
                                <li class="mt-3 capitalize">
                                    <a href="{{ route('dichvuGroup', 'dich-vu-luu-chuong') }}"
                                        class="text-[10px] sm:text-sm">Dịch Vụ Lưu chuồng</a>
                                </li>
                                <li class="mt-3 capitalize">
                                    <a href="{{ route('dichvuGroup', 'xuat-canh') }}"
                                        class="text-[10px] sm:text-sm">Xuất Cảnh</a>
                                </li>
                                <li class="mt-3 capitalize"><a href="{{ route('dichvuGroup', 'grooming') }}"
                                        class="text-[10px] sm:text-sm">Grooming</a></li>
                                <li class="mt-3 capitalize"><a href="{{ route('dichvuGroup', 'dao-tao') }}"
                                        class="text-[10px] sm:text-sm">Đào tạo</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center mt-8 md:justify-center md:hidden">
                <div>
                    <img src="/assets/registered.f04fe57d.png" alt="">
                </div>
                <div class="ml-4">
                    <img src="data:image/png;base64,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"
                        alt="facebook">
                </div>
            </div>
        </div>
        <div
            class="px-4 py-2 text-[10px] text-center md:text-left sm:text-sm text-white bg-blue-600 copyright md:px-15">
            Designed by Masthead 2022 <br class="block md:hidden"><span class="hidden md:inline-block">-</span>
            Copyrighted © PetPro <br class="block sm:hidden"><span class="hidden md:inline-block">-</span> Vì thú cưng
            không ngừng vươn tới - Since 1998
        </div>
    </footer>


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script script src="{{ asset('assets/js/script.js') }}"></script>



    <script>
        var reply_click = function() {
            var x = document.getElementById("search-all-input");

            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";

            }
        }
        document.getElementById("search-all").onclick = reply_click;


        (function(opts_) {
            /*

            Copyright The Closure Library Authors.
            SPDX-License-Identifier: Apache-2.0
            */
            var g = this || self,
                k = function(a, b) {
                    function d() {}
                    d.prototype = b.prototype;
                    a.l = b.prototype;
                    a.prototype = new d;
                    a.prototype.constructor = a;
                    a.j = function(e, c, f) {
                        for (var h = Array(arguments.length - 2), q = 2; q < arguments.length; q++) h[q - 2] =
                            arguments[q];
                        return b.prototype[c].apply(e, h)
                    }
                },
                l = function(a) {
                    return a
                };

            function m(a) {
                if (Error.captureStackTrace) Error.captureStackTrace(this, m);
                else {
                    var b = Error().stack;
                    b && (this.stack = b)
                }
                a && (this.message = String(a))
            }
            k(m, Error);
            m.prototype.name = "CustomError";
            var n = function(a, b) {
                a = a.split("%s");
                for (var d = "", e = a.length - 1, c = 0; c < e; c++) d += a[c] + (c < b.length ? b[c] : "%s");
                m.call(this, d + a[e])
            };
            k(n, m);
            n.prototype.name = "AssertionError";
            var p = function(a, b, d) {
                    if (!a) {
                        var e = "Assertion failed";
                        if (b) {
                            e += ": " + b;
                            var c = Array.prototype.slice.call(arguments, 2)
                        }
                        throw new n("" + e, c || []);
                    }
                },
                r = function(a, b) {
                    throw new n("Failure" + (a ? ": " + a : ""), Array.prototype.slice.call(arguments, 1));
                };
            var t;
            var w = function(a, b) {
                this.h = a === u && b || "";
                this.i = v
            };
            w.prototype.toString = function() {
                return "Const{" + this.h + "}"
            };
            var x = function(a) {
                    if (a instanceof w && a.constructor === w && a.i === v) return a.h;
                    r("expected object of type Const, got '" + a + "'");
                    return "type_error:Const"
                },
                v = {},
                u = {};
            var z = function(a, b) {
                this.g = b === y ? a : ""
            };
            z.prototype.toString = function() {
                return this.g + ""
            };
            var A = function(a) {
                    if (a instanceof z && a.constructor === z) return a.g;
                    var b = typeof a;
                    r("expected object of type TrustedResourceUrl, got '" + a + "' of type " + ("object" != b ? b :
                        a ?
                        Array.isArray(a) ? "array" : b : "null"));
                    return "type_error:TrustedResourceUrl"
                },
                E = function(a, b) {
                    var d = x(a);
                    if (!B.test(d)) throw Error("Invalid TrustedResourceUrl format: " + d);
                    a = d.replace(C, function(e, c) {
                        if (!Object.prototype.hasOwnProperty.call(b, c)) throw Error('Found marker, "' + c +
                            '", in format string, "' + d +
                            '", but no valid label mapping found in args: ' +
                            JSON.stringify(b));
                        e = b[c];
                        return e instanceof w ? x(e) : encodeURIComponent(String(e))
                    });
                    return D(a)
                },
                C = /%{(\w+)}/g,
                B = /^((https:)?\/\/[0-9a-z.:[\]-]+\/|\/[^/\\]|[^:/\\%]+\/|[^:/\\%]*[?#]|about:blank#)/i,
                F = /^([^?#]*)(\?[^#]*)?(#[\s\S]*)?/,
                J = function(a) {
                    var b = G;
                    a = E(H, a);
                    a = A(a).toString();
                    a = F.exec(a);
                    var d = a[3] || "";
                    return D(a[1] + I("?", a[2] || "", b) + I("#", d, void 0))
                },
                y = {},
                D = function(a) {
                    if (void 0 === t) {
                        var b = null;
                        var d = g.trustedTypes;
                        if (d && d.createPolicy) try {
                            b = d.createPolicy("goog#html", {
                                createHTML: l,
                                createScript: l,
                                createScriptURL: l
                            })
                        } catch (e) {
                            g.console && g.console.error(e.message)
                        }
                        t = b
                    }
                    a = (b = t) ? b.createScriptURL(a) : a;
                    return new z(a, y)
                },
                I = function(a, b, d) {
                    if (null == d) return b;
                    if ("string" === typeof d) return d ? a + encodeURIComponent(d) : "";
                    for (var e in d)
                        if (Object.prototype.hasOwnProperty.call(d, e)) {
                            var c = d[e];
                            c = Array.isArray(c) ? c : [c];
                            for (var f = 0; f < c.length; f++) {
                                var h = c[f];
                                null != h && (b || (b = a), b += (b.length > a.length ? "&" : "") +
                                    encodeURIComponent(
                                        e) + "=" + encodeURIComponent(String(h)))
                            }
                        } return b
                };
            var aa = /^[\w+/_-]+[=]{0,2}$/;
            var ba = new w(u,
                    "https://www.google.com/cse/static/style/look/%{versionDir}%{versionSlash}%{theme}.css"),
                K = new w(u,
                    "https://www.google.com/cse/static/element/%{versionDir}%{versionSlash}default%{experiment}+%{lang}.css"
                ),
                H = new w(u,
                    "https://www.google.com/cse/static/element/%{versionDir}%{versionSlash}cse_element__%{lang}.js"
                ),
                L = new w(u, "/");
            window.__gcse = window.__gcse || {};
            window.__gcse.ct = Date.now();
            window.__gcse.scb = function() {
                var a = window.__gcse;
                M() || delete opts_.rawCss;
                var b = ca(a.initializationCallback || a.callback);
                google.search.cse.element.init(opts_) && ("explicit" !== a.parsetags ? "complete" === document
                    .readyState || "interactive" === document.readyState ? (google.search.cse.element.go(),
                        b &&
                        b()) : google.setOnLoadCallback(function() {
                        google.search.cse.element.go();
                        b && b()
                    }, !0) : b && b())
            };

            function ca(a) {
                return "function" === typeof a ? a : "string" === typeof a && "function" === typeof window[a] ?
                    window[
                        a] : null
            }

            function M() {
                return !(window.__gcse && window.__gcse.plainStyle)
            }

            function N(a) {
                var b = document.createElement("link");
                b.type = "text/css";
                a: {
                    try {
                        var d = b && b.ownerDocument,
                            e = d && (d.defaultView || d.parentWindow);
                        e = e || g;
                        if (e.Element && e.Location) {
                            var c = e;
                            break a
                        }
                    } catch (h) {}
                    c = null
                }
                if (c && "undefined" != typeof c.HTMLLinkElement && (!b || !(b instanceof c.HTMLLinkElement) && (
                        b instanceof c.Location || b instanceof c.Element))) {
                    c = typeof b;
                    if ("object" == c && null != b || "function" == c) try {
                        var f = b.constructor.displayName || b.constructor.name || Object.prototype.toString
                            .call(b)
                    } catch (h) {
                        f = "<object could not be stringified>"
                    } else f =
                        void 0 === b ? "undefined" : null === b ? "null" : typeof b;
                    r("Argument is not a %s (or a non-Element, non-Location mock); got: %s", "HTMLLinkElement", f)
                }
                b.rel = "stylesheet";
                p(a instanceof z, 'URL must be TrustedResourceUrl because "rel" contains "stylesheet"');
                b.href = A(a).toString();
                a: {
                    a = (b.ownerDocument && b.ownerDocument.defaultView || g).document;
                    if (a.querySelector && (a = a.querySelector(
                            'style[nonce],link[rel="stylesheet"][nonce]')) && (
                            a = a.nonce || a.getAttribute("nonce")) && aa.test(a)) break a;a = ""
                }
                a && b.setAttribute("nonce",
                    a);
                return b
            };
            var O, G = opts_.usqp ? {
                    usqp: opts_.usqp
                } : {},
                P = opts_.language.toLowerCase();
            O = opts_.cselibVersion ? J({
                versionDir: opts_.cselibVersion,
                versionSlash: L,
                lang: P
            }) : J({
                versionDir: "",
                versionSlash: "",
                lang: P
            });
            var Q = window.__gcse.scb,
                R = document.createElement("script");
            R.src = A(O);
            var S, T, U = (R.ownerDocument && R.ownerDocument.defaultView || window).document,
                V = null === (T = U.querySelector) || void 0 === T ? void 0 : T.call(U, "script[nonce]");
            (S = V ? V.nonce || V.getAttribute("nonce") || "" : "") && R.setAttribute("nonce", S);
            R.type = "text/javascript";
            Q && (R.onload = Q);
            document.getElementsByTagName("head")[0].appendChild(R);
            if (M()) {
                document.getElementsByTagName("head")[0].appendChild(N(opts_.cselibVersion ? E(K, {
                    versionDir: opts_.cselibVersion,
                    versionSlash: L,
                    experiment: "",
                    lang: opts_.language
                }) : E(K, {
                    versionDir: "",
                    versionSlash: "",
                    experiment: "",
                    lang: opts_.language
                })));
                var W, X = opts_.uiOptions.cssThemeVersion || 2,
                    Y = opts_.theme.toLowerCase(),
                    Z = X ? "v" + X : Y.match(/v2_/g) ? "v2" : "",
                    da = Y.replace("v2_", "");
                W = E(ba, {
                    versionDir: Z,
                    versionSlash: Z ? L : "",
                    theme: da
                });
                document.getElementsByTagName("head")[0].appendChild(N(W))
            };
        })({
            "cx": "f00c5c082137a423c",
            "language": "vi",
            "theme": "V2_DEFAULT",
            "uiOptions": {
                "resultsUrl": "",
                "enableAutoComplete": true,
                "enableImageSearch": true,
                "imageSearchLayout": "popup",
                "resultSetSize": "filtered_cse",
                "enableOrderBy": true,
                "orderByOptions": [{
                    "label": "Relevance",
                    "key": ""
                }, {
                    "label": "Date",
                    "key": "date"
                }],
                "overlayResults": true,
                "queryParameterName": "q",
                "numTopRefinements": -1,
                "hideElementBranding": false,
                "cssThemeVersion": 4,
                "isSafeSearchActive": true
            },
            "protocol": "https",
            "rawCss": ".gsc-control-cse{font-family:arial, sans-serif}.gsc-control-cse .gsc-table-result{font-family:arial, sans-serif}.gsc-refinementsGradient{background:linear-gradient(to left,rgba(255,255,255,1),rgba(255,255,255,0))}",
            "cse_token": "AJvRUv0xOZ1oWQuL5KsPGQ1M_jdF:1641123449393",
            "isHostedPage": false,
            "exp": ["csqr", "cc"],
            "cselibVersion": "ff97a008b4153450",
            "usqp": "CAM\u003d"
        });
    </script>
</body>

</html>
