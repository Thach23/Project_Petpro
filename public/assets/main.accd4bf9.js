function c(n, o = 30) { let e; return (...t) => { clearTimeout(e), e = setTimeout(() => { n.apply(this, t) }, o) } }
const l = document.getElementById("backToTop");
l && (l.addEventListener("click", () => { window.scrollTo({ top: 0, left: 0, behavior: "smooth" }) }), window.addEventListener("scroll", c(n => { window.scrollY < 200 ? l.classList.add("hidden") : l.classList.remove("hidden") }, 30)));
const i = document.querySelectorAll('input[type="date"]');
Array.from(i).forEach(n => {
    const o = new Date;
    let e = o.getDate(),
        t = o.getMonth() + 1,
        a = o.getFullYear();
    t = (t < 10 ? "0" : "") + t, e = (e < 10 ? "0" : "") + e;
    const d = a + "-" + t + "-" + e;
    n.value = d
});