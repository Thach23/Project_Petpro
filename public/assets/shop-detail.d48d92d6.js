import"./custom.f5eea7dd.js";import"./menu.f7029f46.js";import"./hover.38850bf6.js";import"./collapse.6f9ad156.js";import"./number-counter.3c460b30.js";import"./main.aaa960c7.js";import{C as a}from"./carousel.9c234d21.js";import"./vendor.95a61fa3.js";const c=document.querySelectorAll("[data-trigger='modal']"),r="active";function o(e,t,s){!t.classList.contains(r)&&s?t.classList.add(r):t.classList.remove(r),e.setAttribute("aria-open",s)}c.forEach(e=>{const t=document.querySelector(e.getAttribute("data-target")),s=e.getAttribute("aria-open")==="true";o(e,t,s),e.addEventListener("click",()=>{o(e,t,!s)}),t.querySelector("[aria-close]").addEventListener("click",()=>{o(e,t,!s)})});const i=new a;i.init({element:"#thumbsCarousel",loop:!1,spaceBetween:8,slidesPerView:"auto"});
