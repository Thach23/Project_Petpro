import "./custom.f5eea7dd.js";
import "./menu.f7029f46.js";
import "./hover.38850bf6.js";
import "./collapse.6f9ad156.js";
import "./number-counter.bef92eb7.js";
import "./main.accd4bf9.js";
import { C as o } from "./carousel.b54df7cb.js";
import "./vendor.ba27c039.js";
const a = document.querySelectorAll("[data-trigger='modal']"),
    s = "active";

function c(e, t, r) {!t.classList.contains(s) && r ? t.classList.add(s) : t.classList.remove(s), e.setAttribute("aria-open", r) }
a.forEach(e => {
    const t = document.querySelector(e.getAttribute("data-target")),
        r = e.getAttribute("aria-open") === "true";
    c(e, t, r), e.addEventListener("click", () => { c(e, t, !r) }), t.querySelector("[aria-close]").addEventListener("click", () => { c(e, t, !r) })
});
const n = new o,
    u = n.init({ element: "#thumbsCarousel", loop: !1, spaceBetween: 8, slidesPerView: "auto" });
u.on("click", e => {
    const { clickedSlide: t } = e, r = t.querySelector("img");
    if (!r) return;
    const i = r.getAttribute("src") || "";
    document.getElementById("imgPreview").setAttribute("src", i)
});