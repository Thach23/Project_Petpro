function l(){const o=document.querySelectorAll(".js-collapse");Array.from(o).forEach(t=>{const s=t.querySelector(".js-collapse-content"),c=t.querySelector("button"),e=t.querySelector(".js-collapse-title");t.classList.remove("on"),s.classList.add("hidden"),c.innerHTML="+",e.classList.remove("text-blue-200")})}(function(){l();const o=document.querySelectorAll(".js-collapse");Array.from(o).forEach(t=>{const s=t.querySelector("button");s.addEventListener("click",c=>{const e=c.target.closest(".js-collapse"),n=e.querySelector(".js-collapse-title"),r=e.classList.contains("on"),a=e.querySelector(".js-collapse-content");l(),r||(s.innerHTML="-",n.classList.add("text-blue-200"),e.classList.add("on"),a.classList.remove("hidden"))})})})();
