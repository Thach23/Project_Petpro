const s=document.querySelector("#menuTop"),h=document.querySelector("#btnMenuMobile"),o=document.querySelectorAll(".js-menu-item"),L=document.querySelectorAll(".js-submenu"),a=document.querySelectorAll(".js-btn-expand-menu"),E=1024;let u=!1;function r(e=!0){const t=document.querySelector("#menuTop");u=e,e?(t.classList.remove("hidden"),document.getElementsByTagName("html")[0].style.overflowY="hidden"):(t.classList.add("hidden"),document.getElementsByTagName("html")[0].style.overflowY="auto")}function w(){Array.from(L).forEach(e=>{e.classList.add("hidden")}),Array.from(a).forEach(e=>{e.classList.remove("chevron-up"),e.classList.add("chevron-down")}),Array.from(o).forEach(e=>{const t=e.querySelector("a");t.classList.add("text-blue-200"),t.classList.remove("text-blue-300")})}function d({target:e}){e.classList.add("active")}function l({target:e}){e.classList.remove("active")}function m(){Array.from(o).forEach(e=>{e.addEventListener("mouseenter",d),e.addEventListener("mouseleave",l)})}function y(){Array.from(o).forEach(e=>{e.removeEventListener("mouseenter",d),e.removeEventListener("mouseleave",l)})}(function(){window.addEventListener("resize",t=>{window.innerWidth>=1024?m():y()}),window.innerWidth>=E&&m(),h.addEventListener("click",()=>{s.classList.contains("hidden")?r():r(!1);const t=function(n){n.target===s&&r(!1)};u?window.addEventListener("click",t):window.removeEventListener("click",t)}),Array.from(a).forEach(t=>{t.addEventListener("click",n=>{const v=n.target.classList.contains("chevron-down");if(w(),n.preventDefault(),v){const c=n.target.closest(".js-menu-item"),f=c.querySelector(".js-submenu"),i=c.querySelector("a");i.classList.add("text-blue-300"),i.classList.remove("text-blue-200"),f.classList.remove("hidden"),n.target.classList.remove("chevron-down"),n.target.classList.add("chevron-up"),s.scroll({top:0,behavior:"smooth"})}})})})();
