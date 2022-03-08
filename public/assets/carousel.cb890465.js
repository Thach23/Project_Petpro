import { S as a, N as s, P as r } from "./vendor.95a61fa3.js";
const l = { direction: "horizontal", loop: !0, element: ".swiper", slidesPerView: 1, spaceBetween: 0, breakpoints: {}, pagination: {}, navigation: {}, scrollbar: { el: ".swiper-scrollbar" } };
class u { constructor() { this.options = {} }
    init(o) { var n, e, t; const i = Object.assign({}, l, o); return ((n = i.pagination) == null ? void 0 : n.el) && this.usePagination(), (((e = i.navigation) == null ? void 0 : e.nextEl) || ((t = i.navigation) == null ? void 0 : t.prevEl)) && this.useNavigation(), new a(i.element, i) }
    useNavigation() { a.use([s]) }
    usePagination() { a.use([r]) } }
export { u as C };