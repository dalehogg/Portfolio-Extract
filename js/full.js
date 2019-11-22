window.addEventListener("load",function(){!function(a){"use strict";a.loadCSS||(a.loadCSS=function(){});var s=loadCSS.relpreload={};if(s.support=function(){var t;try{t=a.document.createElement("link").relList.supports("preload")}catch(e){t=!1}return function(){return t}}(),s.bindMediaToggle=function(e){var t=e.media||"all";function i(){e.media=t}e.addEventListener?e.addEventListener("load",i):e.attachEvent&&e.attachEvent("onload",i),setTimeout(function(){e.rel="stylesheet",e.media="only x"}),setTimeout(i,3e3)},s.poly=function(){if(!s.support())for(var e=a.document.getElementsByTagName("link"),t=0;t<e.length;t++){var i=e[t];"preload"!==i.rel||"style"!==i.getAttribute("as")||i.getAttribute("data-loadcss")||(i.setAttribute("data-loadcss",!0),s.bindMediaToggle(i))}},!s.support()){s.poly();var e=a.setInterval(s.poly,500);a.addEventListener?a.addEventListener("load",function(){s.poly(),a.clearInterval(e)}):a.attachEvent&&a.attachEvent("onload",function(){s.poly(),a.clearInterval(e)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:a.loadCSS=loadCSS}("undefined"!=typeof global?global:this),$(".blackPreLoad").delay(1e3).fadeOut("slow"),$(".container").delay().css({overflow:"visible"});var e=document.querySelector(".mySkillsButton"),t=document.querySelector(".aboutMeButton"),i=document.querySelector(".myWorkButton"),a=document.querySelector("#skillsSection"),s=document.querySelector("#aboutSection"),o=document.querySelector("#workSection"),n=document.querySelector(".section-two");t.addEventListener("click",function(){s.classList.remove("deactive"),a.classList.add("deactive"),o.classList.add("deactive")}),e.addEventListener("click",function(){a.classList.remove("deactive"),s.classList.add("deactive"),o.classList.add("deactive"),$(".interpersonalList li").each(function(e,t){var i=$(this).closest("ul");i.delay(500).queue(function(){$(t).addClass("fullOpac"),i.dequeue()})})}),i.addEventListener("click",function(){o.classList.remove("deactive"),a.classList.add("deactive"),s.classList.add("deactive")}),$(".navButton").click(function(){$(n).removeClass("hide"),$("#placeholderCity").addClass("hide"),$("html").animate({scrollTop:$(n).offset().top},800)});var d=document.getElementById("space");d.width=window.innerWidth,d.height=window.innerHeight;var c=d.getContext("2d"),l=(d.width,d.height,[]),r=null;window.innerWidth<=641?r=50:641<window.innerWidth&&window.innerWidth<=961?r=75:961<window.innerWidth&&(r=125);for(var u=["#5022FF","#1D69FF","#0067CA","#ffffff","#ffffff"],y=["#000000"],h={x:void 0,y:void 0},m=0;m<r;m++){var v=.2*Math.random()+.08,f=Math.random()*(innerWidth-2*v)+v,p=Math.random()*(innerHeight-2*v)+v,g=.19*(Math.random()-.5),L=.19*(Math.random()-.5),S=document.querySelector(".counter");l.push(new b(f,p,g,L,v,S))}function b(e,t,i,a,s,o){this.x=e,this.y=t,this.dx=i,this.dy=a,this.circleRadius=s,this.colors=u[~~(Math.random()*u.length)],this.sunColors=y,this.counterOutput=o,this.draw=function(){c.fillStyle=this.colors,c.beginPath(),c.arc(this.x,this.y,this.circleRadius,0,2*Math.PI,!1),c.fill(),c.lineWidth="1.5",c.strokeStyle=this.colors,c.stroke()},this.update=function(){(this.x+this.circleRadius>innerWidth||this.x-this.circleRadius<0)&&(this.dx=-this.dx),(this.y+this.circleRadius>innerHeight||this.y-this.circleRadius<0)&&(this.dy=-this.dy),this.x+=this.dx,this.y+=this.dy,h.x-this.x<=30&&-30<=h.x-this.x&&h.y-this.y<=30&&-30<=h.y-this.y?this.circleRadius+=7:7.1<this.circleRadius&&(this.circleRadius-=7),this.draw()}}!function e(){for(requestAnimationFrame(e),c.clearRect(0,0,innerWidth,innerHeight),m=0;m<l.length;m++)l[m].update()}();var w=document.querySelector("#space");n=document.querySelector(".section-two");$(window).scroll(function(){var e=$(window).scrollTop();400<e?(n.classList.add("grad"),n.style.background="linear-gradient(to bottom, #020111 5%,#353549 100%)",w.style.opacity=".15",n.style.opacity="1"):e<325&&(n.classList.remove("grad"),w.style.opacity="1",n.style.opacity="0")});var q=document.querySelector(".section-two-light"),k=document.querySelector(".interpersonalButton"),x=document.querySelector(".technicalButton"),C=document.querySelector(".galaxy-center"),E=document.querySelector("body"),W=document.querySelector(".interpersonalList"),M=document.querySelector(".technicalList"),R=document.querySelector(".realMoon-container"),B=document.querySelector(".cloudsLightOne"),T=document.querySelector(".cloudsLightTwo"),O=document.querySelector(".clouds"),A=document.querySelector(".in"),F=document.querySelector(".citySilouhute");document.querySelector(".blackPreLoad");x.addEventListener("click",function(){this.classList.remove("faded"),k.classList.add("faded"),d.style.display="none",q.style.background="linear-gradient(to bottom, #82addb 0%,#ebb2b1 100%)",E.classList.add("backLight"),q.style.opacity="1",q.style.display="block",C.style.display="none",M.classList.remove("hide"),W.classList.add("hide"),R.style.display="none",B.style.opacity=".20",T.style.opacity=".45",$(O).addClass("noOpac"),F.classList.add("cityWhite"),F.classList.remove("city"),A.style.background="radial-gradient(rgba(255, 255, 255, .75) 1%, rgba(243, 206, 205, .05) 40%, rgba(88, 88, 88, .075) 55%, rgba(0, 0, 0, 0) 70%)",$(".technicalList li").each(function(e,t){var i=$(this).closest("ul");i.delay(500).queue(function(){$(t).addClass("fullOpac"),i.dequeue()})})}),k.addEventListener("click",function(){this.classList.remove("faded"),x.classList.add("faded"),q.style.opacity="0",d.style.display="block",E.classList.remove("backLight"),C.style.display="block",W.classList.remove("hide"),M.classList.add("hide"),R.style.display="block",B.style.opacity="0",T.style.opacity="0",$(O).removeClass("noOpac"),F.classList.add("city"),F.classList.remove("cityWhite"),A.style.background="radial-gradient(rgba(255, 255, 255, 1) 1%, rgba(243, 206, 205, .4) 30%, rgba(88, 88, 88, .3) 55%, rgba(0, 0, 0, 0) 70%)"})});