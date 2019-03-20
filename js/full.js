window.addEventListener("load",function(){!function(o){"use strict";o.loadCSS||(o.loadCSS=function(){});var c=loadCSS.relpreload={};if(c.support=function(){var e;try{e=o.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),c.bindMediaToggle=function(t){var e=t.media||"all";function i(){t.media=e}t.addEventListener?t.addEventListener("load",i):t.attachEvent&&t.attachEvent("onload",i),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(i,3e3)},c.poly=function(){if(!c.support())for(var t=o.document.getElementsByTagName("link"),e=0;e<t.length;e++){var i=t[e];"preload"!==i.rel||"style"!==i.getAttribute("as")||i.getAttribute("data-loadcss")||(i.setAttribute("data-loadcss",!0),c.bindMediaToggle(i))}},!c.support()){c.poly();var t=o.setInterval(c.poly,500);o.addEventListener?o.addEventListener("load",function(){c.poly(),o.clearInterval(t)}):o.attachEvent&&o.attachEvent("onload",function(){c.poly(),o.clearInterval(t)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:o.loadCSS=loadCSS}("undefined"!=typeof global?global:this),$("#preloader").delay(575).fadeOut("slow"),$(".container").delay().css({overflow:"visible"})});var mySkillsButton=document.querySelector(".mySkillsButton"),aboutMeButton=document.querySelector(".aboutMeButton"),myWorkButton=document.querySelector(".myWorkButton"),skillsSection=document.querySelector("#skillsSection"),aboutSection=document.querySelector("#aboutSection"),workSection=document.querySelector("#workSection"),sectionTwo=document.querySelector(".section-two");aboutMeButton.addEventListener("click",function(){aboutSection.classList.remove("deactive"),skillsSection.classList.add("deactive"),workSection.classList.add("deactive")}),mySkillsButton.addEventListener("click",function(){skillsSection.classList.remove("deactive"),aboutSection.classList.add("deactive"),workSection.classList.add("deactive")}),myWorkButton.addEventListener("click",function(){workSection.classList.remove("deactive"),skillsSection.classList.add("deactive"),aboutSection.classList.add("deactive")}),$(".navButton").click(function(){$("#placeholderCity").addClass("hide"),$("html,body").animate({scrollTop:750},700)});var canvas=document.getElementById("space");canvas.width=window.innerWidth,canvas.height=window.innerHeight;var c=canvas.getContext("2d"),cx=canvas.width/2,cy=canvas.height/2,circleArray=[],amount=null;window.innerWidth<=641?amount=50:641<window.innerWidth&&window.innerWidth<=961?amount=75:961<window.innerWidth&&(amount=125);for(var colors=["#5022FF","#1D69FF","#0067CA","#ffffff","#ffffff"],sunColors=["#000000"],mouseClick={x:void 0,y:void 0},i=0;i<amount;i++){var circleRadius=.2*Math.random()+.08,x=Math.random()*(innerWidth-2*circleRadius)+circleRadius,y=Math.random()*(innerHeight-2*circleRadius)+circleRadius,dx=.19*(Math.random()-.5),dy=.19*(Math.random()-.5),counterOutput=document.querySelector(".counter");circleArray.push(new Circle(x,y,dx,dy,circleRadius,counterOutput))}function animate(){for(requestAnimationFrame(animate),c.clearRect(0,0,innerWidth,innerHeight),i=0;i<circleArray.length;i++)circleArray[i].update()}function Circle(t,e,i,o,s,n){this.x=t,this.y=e,this.dx=i,this.dy=o,this.circleRadius=s,this.colors=colors[~~(Math.random()*colors.length)],this.sunColors=sunColors,this.counterOutput=n,this.draw=function(){c.fillStyle=this.colors,c.beginPath(),c.arc(this.x,this.y,this.circleRadius,0,2*Math.PI,!1),c.fill(),c.lineWidth="1.5",c.strokeStyle=this.colors,c.stroke()},this.update=function(){(this.x+this.circleRadius>innerWidth||this.x-this.circleRadius<0)&&(this.dx=-this.dx),(this.y+this.circleRadius>innerHeight||this.y-this.circleRadius<0)&&(this.dy=-this.dy),this.x+=this.dx,this.y+=this.dy,mouseClick.x-this.x<=30&&-30<=mouseClick.x-this.x&&mouseClick.y-this.y<=30&&-30<=mouseClick.y-this.y?this.circleRadius+=7:7.1<this.circleRadius&&(this.circleRadius-=7),this.draw()}}animate();var toBottom="to bottom",space=document.querySelector("#space");sectionTwo=document.querySelector(".section-two");$(window).scroll(function(){var t=$(window).scrollTop();400<t?(sectionTwo.classList.add("grad"),sectionTwo.style.background="linear-gradient("+toBottom+", #020111 5%,#353549 100%)",space.style.opacity=".15",sectionTwo.style.opacity="1"):t<325&&(sectionTwo.classList.remove("grad"),space.style.opacity="1",sectionTwo.style.opacity="0")});var sectionTwoLight=document.querySelector(".section-two-light"),interpersonalButton=document.querySelector(".interpersonalButton"),technicalButton=document.querySelector(".technicalButton"),galaxy=document.querySelector(".galaxy-center"),body=document.querySelector("body"),interpersonalList=document.querySelector(".interpersonalList"),technicalList=document.querySelector(".technicalList"),cloudsLightOne=document.querySelector(".cloudsLightOne"),cloudsLightTwo=document.querySelector(".cloudsLightTwo"),clouds=document.querySelector(".clouds"),inSun=document.querySelector(".in"),citySilouhute=document.querySelector(".citySilouhute");technicalButton.addEventListener("click",function(){this.classList.remove("faded"),interpersonalButton.classList.add("faded"),canvas.style.display="none",sectionTwoLight.style.background="linear-gradient(to bottom, #82addb 0%,#ebb2b1 100%)",body.classList.add("backLight"),sectionTwoLight.style.opacity="1",sectionTwoLight.style.display="block",galaxy.style.display="none",technicalList.classList.remove("hide"),interpersonalList.classList.add("hide"),cloudsLightOne.style.opacity=".20",cloudsLightTwo.style.opacity=".45",$(clouds).addClass("noOpac"),citySilouhute.classList.add("cityWhite"),citySilouhute.classList.remove("city"),inSun.style.background="radial-gradient(rgba(255, 255, 255, .75) 1%, rgba(243, 206, 205, .05) 40%, rgba(88, 88, 88, .075) 55%, rgba(0, 0, 0, 0) 70%)"}),interpersonalButton.addEventListener("click",function(){this.classList.remove("faded"),technicalButton.classList.add("faded"),sectionTwoLight.style.opacity="0",canvas.style.display="block",body.classList.remove("backLight"),galaxy.style.display="block",interpersonalList.classList.remove("hide"),technicalList.classList.add("hide"),cloudsLightOne.style.opacity="0",cloudsLightTwo.style.opacity="0",$(clouds).removeClass("noOpac"),citySilouhute.classList.add("city"),citySilouhute.classList.remove("cityWhite")});