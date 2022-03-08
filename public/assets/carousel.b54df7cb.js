import { S as e, N as o, P as r, A as l } from "./vendor.ba27c039.js";
const p = {
    direction: "horizontal",
    loop: !0,
    element: ".swiper",
    slidesPerView: 1,
    spaceBetween: 0,
    autoplay: {
        delay: 3000,
        pauseOnMouseEnter: true
    },
    breakpoints: {},
    pagination: { el: ".swiper-pagination", clickable: !0 },
    navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
    scrollbar: { el: ".swiper-scrollbar" }
};
class g {
    constructor() { this.options = {} }
    init(s) { var t, a, n; const i = Object.assign({}, p, s); return ((t = i.pagination) == null ? void 0 : t.el) && this.usePagination(), (((a = i.navigation) == null ? void 0 : a.nextEl) || ((n = i.navigation) == null ? void 0 : n.prevEl)) && this.useNavigation(), i.autoplay && this.useAutoPlay(), new e(i.element, i) }
    useNavigation() { e.use([o]) }
    usePagination() { e.use([r]) }
    useAutoPlay() { e.use([l]) }
}
export { g as C };