import { S as i, N as a, P as e } from "./vendor.95a61fa3.js";
const r = { direction: "horizontal", loop: !0, element: ".swiper", slidesPerView: 1, spaceBetween: 0, breakpoints: {}, pagination: {}, navigation: {}, scrollbar: { el: ".swiper-scrollbar" } };
class g { constructor() { this.options = {} }
    init(n) { var t, s, o; return this.options = Object.assign({}, r, n), ((t = this.options.pagination) == null ? void 0 : t.el) && this.usePagination(), (((s = this.options.navigation) == null ? void 0 : s.nextEl) || ((o = this.options.navigation) == null ? void 0 : o.prevEl)) && this.useNavigation(), new i(this.options.element, this.options) }
    useNavigation() { i.use([a]) }
    usePagination() { i.use([e]) } }
export { g as C };