window.addEventListener("load",function(){!function(a){"use strict";a.loadCSS||(a.loadCSS=function(){});var s=loadCSS.relpreload={};if(s.support=function(){var e;try{e=a.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),s.bindMediaToggle=function(t){var e=t.media||"all";function i(){t.media=e}t.addEventListener?t.addEventListener("load",i):t.attachEvent&&t.attachEvent("onload",i),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(i,3e3)},s.poly=function(){if(!s.support())for(var t=a.document.getElementsByTagName("link"),e=0;e<t.length;e++){var i=t[e];"preload"!==i.rel||"style"!==i.getAttribute("as")||i.getAttribute("data-loadcss")||(i.setAttribute("data-loadcss",!0),s.bindMediaToggle(i))}},!s.support()){s.poly();var t=a.setInterval(s.poly,500);a.addEventListener?a.addEventListener("load",function(){s.poly(),a.clearInterval(t)}):a.attachEvent&&a.attachEvent("onload",function(){s.poly(),a.clearInterval(t)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:a.loadCSS=loadCSS}("undefined"!=typeof global?global:this);var t=document.querySelector(".mySkillsButton"),e=document.querySelector(".aboutMeButton"),i=document.querySelector(".myWorkButton"),a=document.querySelector(".contactButton"),s=document.querySelector("#skillsSection"),o=document.querySelector("#aboutSection"),l=document.querySelector("#workSection"),c=document.querySelector("#contactSection"),n=document.querySelector(".section-two"),r=document.querySelector("#nightSky");e.addEventListener("click",function(){o.classList.remove("deactive"),s.classList.add("deactive"),l.classList.add("deactive"),c.classList.add("deactive"),t.classList.remove("fullOpac"),i.classList.remove("fullOpac"),a.classList.remove("fullOpac"),this.classList.add("fullOpac")}),t.addEventListener("click",function(){s.classList.remove("deactive"),o.classList.add("deactive"),l.classList.add("deactive"),c.classList.add("deactive"),e.classList.remove("fullOpac"),i.classList.remove("fullOpac"),a.classList.remove("fullOpac"),this.classList.add("fullOpac"),$(".interpersonalList li").each(function(t,e){var i=$(this).closest("ul");i.delay(500).queue(function(){$(e).addClass("fullOpac"),i.dequeue()})})}),i.addEventListener("click",function(){l.classList.remove("deactive"),s.classList.add("deactive"),o.classList.add("deactive"),c.classList.add("deactive"),e.classList.remove("fullOpac"),t.classList.remove("fullOpac"),a.classList.remove("fullOpac"),this.classList.add("fullOpac")}),a.addEventListener("click",function(){s.classList.add("deactive"),o.classList.add("deactive"),l.classList.add("deactive"),c.classList.remove("deactive"),e.classList.remove("fullOpac"),t.classList.remove("fullOpac"),i.classList.remove("fullOpac"),this.classList.add("fullOpac")}),$(".navButton").click(function(){$(n).removeClass("hide"),$("#placeholderCity").addClass("hide"),$("html").animate({scrollTop:$(n).offset().top},800)});var d=document.querySelector("#nightSky");n=document.querySelector(".section-two");$(window).scroll(function(){var t=$(window).scrollTop();400<t?(n.classList.add("grad"),n.style.background="linear-gradient(to bottom, #020111 5%,#353549 100%)",d.style.opacity=".3",n.style.opacity="1"):t<475&&(n.classList.remove("grad"),d.style.opacity="1",n.style.opacity="0")});var u=document.querySelector(".section-two-light"),h=document.querySelector(".interpersonalButton"),f=document.querySelector(".technicalButton"),y=document.querySelector(".galaxy-center"),p=document.querySelector("body"),v=document.querySelector(".interpersonalList"),m=document.querySelector(".technicalList"),g=document.querySelector(".realMoon-container"),L=document.querySelector(".cloudsLightOne"),b=document.querySelector(".cloudsLightTwo"),x=document.querySelector(".clouds"),w=document.querySelector(".flare"),S=document.querySelector(".in"),k=document.querySelector(".citySilouhute");document.querySelector(".blackPreLoad");function q(t,e){return Math.floor(Math.random()*(e-t+1))+t}f.addEventListener("click",function(){this.classList.remove("faded"),h.classList.add("faded"),r.style.display="none",u.style.background="linear-gradient(to bottom, #82addb 0%,#ebb2b1 100%)",p.classList.add("backLight"),u.style.opacity="1",u.style.display="block",y.style.display="none",m.classList.remove("hide"),v.classList.add("hide"),g.style.display="none",L.style.opacity=".20",b.style.opacity=".45",$(x).addClass("noOpac"),k.classList.add("cityWhite"),k.classList.remove("city"),S.style.background="radial-gradient(rgba(255, 255, 255, .75) 1%, rgba(243, 206, 205, .05) 40%, rgba(88, 88, 88, .075) 55%, rgba(0, 0, 0, 0) 70%)",$(".technicalList li").each(function(t,e){var i=$(this).closest("ul");w.classList.remove("hide"),i.delay(500).queue(function(){$(e).addClass("fullOpac"),i.dequeue()})})}),h.addEventListener("click",function(){this.classList.remove("faded"),f.classList.add("faded"),u.style.opacity="0",r.style.display="block",p.classList.remove("backLight"),y.style.display="block",v.classList.remove("hide"),m.classList.add("hide"),g.style.display="block",L.style.opacity="0",b.style.opacity="0",$(x).removeClass("noOpac"),k.classList.add("city"),w.classList.add("hide"),k.classList.remove("cityWhite"),S.style.background="radial-gradient(rgba(255, 255, 255, 1) 1%, rgba(243, 206, 205, .4) 30%, rgba(88, 88, 88, .3) 55%, rgba(0, 0, 0, 0) 70%)"}),window.requestAnimFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(t){window.setTimeout(t,1e3/60)};var C={w:$("#nightSky").width(),h:$("#nightSky").height(),stars:2e3,twinklers:.1,shooters:.1,starfield:{buffer:[],canvas:$("#starfield")[0],ctx:$("#starfield")[0].getContext("2d")},twinklefield:{buffer:[],canvas:$("#twinklefield")[0],ctx:$("#twinklefield")[0].getContext("2d")},shooting:{buffer:[],canvas:$("#shooting")[0],ctx:$("#shooting")[0].getContext("2d")},planet:{canvas:$("#planet")[0],ctx:$("#planet")[0].getContext("2d")},setup:function(){this.starfield.canvas.width=this.w,this.starfield.canvas.height=this.h,this.twinklefield.canvas.width=this.w,this.twinklefield.canvas.height=this.h,this.shooting.canvas.width=this.w,this.shooting.canvas.height=this.h,this.planet.canvas.width=this.w,this.planet.canvas.height=this.h}};C.starfield.generate=function(){for(var t=C.stars,e=0;e<t;e++)this.buffer[e]={position:{x:q(0,C.w),y:q(0,C.h)},hue:q(0,360),size:1,opacity:q(0,70),saturation:q(0,30)+"%"}},C.twinklefield.generate=function(){for(var t=C.stars*C.twinklers,e=0;e<t;e++)this.buffer[e]={position:{x:q(0,C.w),y:q(0,C.h)},hue:q(0,360),size:1.5*Math.random(),opacity:q(60,100),saturation:q(70,100)+"%"}},C.shooting.generate=function(){if(q(0,C.stars)<C.stars*C.shooters){var t={position:{x:q(0,C.w),y:q(0,C.h/3)},delta:{x:20*Math.random()-10,y:q(1,3)},size:1*Math.random(),decay:2*Math.random()+.5,opacity:.2,color:"255,235,255"};C.shooting.buffer.push(t)}},C.starfield.render=function(){for(var t=this.buffer.length,e=0;e<t;e++){var i=this.buffer[e];this.ctx.beginPath(),this.ctx.shadowBlur=Math.floor(5*Math.random()+2),this.ctx.shadowColor="white",this.ctx.fillStyle="hsla("+i.hue+", "+i.saturation+", 80%, ."+i.opacity+")",this.ctx.fillRect(i.position.x,i.position.y,i.size,i.size)}},C.twinklefield.render=function(){this.ctx.clearRect(0,0,C.w,C.h);for(var t=this.buffer.length,e=0;e<t;e++){this.buffer[e].hue+=q(-30,30);var i=this.buffer[e].opacity-q(1,30),a=this.buffer[e];this.ctx.beginPath(),this.ctx.shadowBlur=Math.floor(5*Math.random()+5),this.ctx.shadowColor="white",this.ctx.fillStyle="hsla("+a.hue+", "+a.saturation+", 85%, ."+i+")",this.ctx.arc(a.position.x,a.position.y,a.size,0,2*Math.PI),this.ctx.fill()}},C.shooting.render=function(){this.ctx.clearRect(0,0,C.w,C.h);for(var t=this.buffer.length,e=0;e<t-1;e++){var i=this.buffer[e];void 0!==i&&0<i.decay?(i.delta.x<2&&-2<i.delta.x&&(i.delta.x<0?i.delta.x=-8:i.delta.x=8,i.color="255,200,220"),this.ctx.beginPath(),this.ctx.fillStyle="rgba("+i.color+","+i.opacity+")",this.ctx.arc(i.position.x,i.position.y,1,0,2*Math.PI),this.ctx.fill(),this.ctx.fillStyle="rgba("+i.color+","+.6*i.opacity+")",this.ctx.arc(i.position.x-i.delta.x,i.position.y-i.delta.y,1,0,2*Math.PI),this.ctx.fill(),this.ctx.fillStyle="rgba("+i.color+","+.3*i.opacity+")",this.ctx.arc(i.position.x-2*i.delta.x,i.position.y-2*i.delta.y,1,0,2*Math.PI),this.ctx.fill(),C.shooting.buffer[e].decay-=.01,C.shooting.buffer[e].position.x+=C.shooting.buffer[e].delta.x,C.shooting.buffer[e].position.y+=C.shooting.buffer[e].delta.y):this.buffer.splice(e,1),void 0!==i&&i.decay<1?C.shooting.buffer[e].opacity-=.01:void 0!==i&&i.opacity<1&&(C.shooting.buffer[e].opacity+=.05)}},C.planet.render=function(){this.ctx.beginPath(),this.ctx.fillStyle="0f0f0f",this.ctx.shadowColor="rgba(233,233,255,0.9)",this.ctx.shadowBlur=50,this.ctx.arc(C.w/2,7.2*C.h,2*C.w,1.3*Math.PI,2.7*Math.PI,!1),this.ctx.fill()},C.setup(),C.starfield.generate(),C.starfield.render(),C.twinklefield.generate(),C.planet.render();var O=0;!function t(){O++,requestAnimFrame(t),O%12==0&&(C.twinklefield.render(),C.shooting.generate(),O%5==0&&(O=0)),C.shooting.render()}()});