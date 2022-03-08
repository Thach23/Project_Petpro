import { S as e, N as s, P as r } from "./vendor.95a61fa3.js";
const l = { direction: "horizontal", loop: !0, element: ".swiper", slidesPerView: 1, spaceBetween: 0, breakpoints: {}, pagination: { el: ".swiper-pagination", clickable: !0 }, navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }, scrollbar: { el: ".swiper-scrollbar" } };
class g { constructor() { this.options = {} }
    init(o) { var n, t, a; const i = Object.assign({}, l, o); return ((n = i.pagination) == null ? void 0 : n.el) && this.usePagination(), (((t = i.navigation) == null ? void 0 : t.nextEl) || ((a = i.navigation) == null ? void 0 : a.prevEl)) && this.useNavigation(), new e(i.element, i) }
    useNavigation() { e.use([s]) }
    usePagination() { e.use([r]) } }
export { g as C };