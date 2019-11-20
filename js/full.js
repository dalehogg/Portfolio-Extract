window.addEventListener("load",function(){!function(o){"use strict";o.loadCSS||(o.loadCSS=function(){});var a=loadCSS.relpreload={};if(a.support=function(){var e;try{e=o.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),a.bindMediaToggle=function(t){var e=t.media||"all";function i(){t.media=e}t.addEventListener?t.addEventListener("load",i):t.attachEvent&&t.attachEvent("onload",i),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(i,3e3)},a.poly=function(){if(!a.support())for(var t=o.document.getElementsByTagName("link"),e=0;e<t.length;e++){var i=t[e];"preload"!==i.rel||"style"!==i.getAttribute("as")||i.getAttribute("data-loadcss")||(i.setAttribute("data-loadcss",!0),a.bindMediaToggle(i))}},!a.support()){a.poly();var t=o.setInterval(a.poly,500);o.addEventListener?o.addEventListener("load",function(){a.poly(),o.clearInterval(t)}):o.attachEvent&&o.attachEvent("onload",function(){a.poly(),o.clearInterval(t)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:o.loadCSS=loadCSS}("undefined"!=typeof global?global:this),$("#preloader").delay(575).fadeOut("slow"),$(".container").delay().css({overflow:"visible"});var t=document.querySelector(".mySkillsButton"),e=document.querySelector(".aboutMeButton"),i=document.querySelector(".myWorkButton"),o=document.querySelector("#skillsSection"),a=document.querySelector("#aboutSection"),s=document.querySelector("#workSection"),d=document.querySelector(".section-two");e.addEventListener("click",function(){a.classList.remove("deactive"),o.classList.add("deactive"),s.classList.add("deactive")}),t.addEventListener("click",function(){o.classList.remove("deactive"),a.classList.add("deactive"),s.classList.add("deactive")}),i.addEventListener("click",function(){s.classList.remove("deactive"),o.classList.add("deactive"),a.classList.add("deactive")}),$(".navButton").click(function(){$("#placeholderCity").addClass("hide"),$("html").animate({scrollTop:$(d).offset().top},1e3)});var n=document.getElementById("space");n.width=window.innerWidth,n.height=window.innerHeight;var c=n.getContext("2d"),l=(n.width,n.height,[]),r=null;window.innerWidth<=641?r=50:641<window.innerWidth&&window.innerWidth<=961?r=75:961<window.innerWidth&&(r=125);for(var u=["#5022FF","#1D69FF","#0067CA","#ffffff","#ffffff"],y=["#000000"],h={x:void 0,y:void 0},m=0;m<r;m++){var v=.2*Math.random()+.08,f=Math.random()*(innerWidth-2*v)+v,p=Math.random()*(innerHeight-2*v)+v,g=.19*(Math.random()-.5),S=.19*(Math.random()-.5),L=document.querySelector(".counter");l.push(new b(f,p,g,S,v,L))}function b(t,e,i,o,a,s){this.x=t,this.y=e,this.dx=i,this.dy=o,this.circleRadius=a,this.colors=u[~~(Math.random()*u.length)],this.sunColors=y,this.counterOutput=s,this.draw=function(){c.fillStyle=this.colors,c.beginPath(),c.arc(this.x,this.y,this.circleRadius,0,2*Math.PI,!1),c.fill(),c.lineWidth="1.5",c.strokeStyle=this.colors,c.stroke()},this.update=function(){(this.x+this.circleRadius>innerWidth||this.x-this.circleRadius<0)&&(this.dx=-this.dx),(this.y+this.circleRadius>innerHeight||this.y-this.circleRadius<0)&&(this.dy=-this.dy),this.x+=this.dx,this.y+=this.dy,h.x-this.x<=30&&-30<=h.x-this.x&&h.y-this.y<=30&&-30<=h.y-this.y?this.circleRadius+=7:7.1<this.circleRadius&&(this.circleRadius-=7),this.draw()}}!function t(){for(requestAnimationFrame(t),c.clearRect(0,0,innerWidth,innerHeight),m=0;m<l.length;m++)l[m].update()}();var w=document.querySelector("#space");d=document.querySelector(".section-two");$(window).scroll(function(){var t=$(window).scrollTop();400<t?(d.classList.add("grad"),d.style.background="linear-gradient(to bottom, #020111 5%,#353549 100%)",w.style.opacity=".15",d.style.opacity="1"):t<325&&(d.classList.remove("grad"),w.style.opacity="1",d.style.opacity="0")});var k=document.querySelector(".section-two-light"),q=document.querySelector(".interpersonalButton"),x=document.querySelector(".technicalButton"),E=document.querySelector(".galaxy-center"),C=document.querySelector("body"),W=document.querySelector(".interpersonalList"),M=document.querySelector(".technicalList"),R=document.querySelector(".realMoon-container"),B=document.querySelector(".cloudsLightOne"),T=document.querySelector(".cloudsLightTwo"),A=document.querySelector(".clouds"),F=document.querySelector(".in"),I=document.querySelector(".citySilouhute");x.addEventListener("click",function(){this.classList.remove("faded"),q.classList.add("faded"),n.style.display="none",k.style.background="linear-gradient(to bottom, #82addb 0%,#ebb2b1 100%)",C.classList.add("backLight"),k.style.opacity="1",k.style.display="block",E.style.display="none",M.classList.remove("hide"),W.classList.add("hide"),R.style.display="none",B.style.opacity=".20",T.style.opacity=".45",$(A).addClass("noOpac"),I.classList.add("cityWhite"),I.classList.remove("city"),F.style.background="radial-gradient(rgba(255, 255, 255, .75) 1%, rgba(243, 206, 205, .05) 40%, rgba(88, 88, 88, .075) 55%, rgba(0, 0, 0, 0) 70%)"}),q.addEventListener("click",function(){this.classList.remove("faded"),x.classList.add("faded"),k.style.opacity="0",n.style.display="block",C.classList.remove("backLight"),E.style.display="block",W.classList.remove("hide"),M.classList.add("hide"),R.style.display="block",B.style.opacity="0",T.style.opacity="0",$(A).removeClass("noOpac"),I.classList.add("city"),I.classList.remove("cityWhite"),F.style.background="radial-gradient(rgba(255, 255, 255, 1) 1%, rgba(243, 206, 205, .4) 30%, rgba(88, 88, 88, .3) 55%, rgba(0, 0, 0, 0) 70%)"})});