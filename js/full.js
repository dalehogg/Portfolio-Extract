window.addEventListener("load",function(){$("#preloader").delay(1e3).fadeOut("slow"),$(".container").delay().css({overflow:"visible"})});var mySkillsButton=document.querySelector(".mySkillsButton"),aboutMeButton=document.querySelector(".aboutMeButton"),myWorkButton=document.querySelector(".myWorkButton"),placerholderCity=document.querySelector("#placeholderCity"),skillsSection=document.querySelector("#skillsSection"),aboutSection=document.querySelector("#aboutSection"),workSection=document.querySelector("#workSection"),sectionTwo=document.querySelector(".section-two");aboutMeButton.addEventListener("click",function(){aboutSection.classList.remove("deactive"),skillsSection.classList.add("deactive"),workSection.classList.add("deactive")}),mySkillsButton.addEventListener("click",function(){skillsSection.classList.remove("deactive"),aboutSection.classList.add("deactive"),workSection.classList.add("deactive")}),myWorkButton.addEventListener("click",function(){workSection.classList.remove("deactive"),skillsSection.classList.add("deactive"),aboutSection.classList.add("deactive")}),$(".navButton").click(function(){$("#placeholderCity").addClass("hide"),$("html,body").animate({scrollTop:750},700)});var canvas=document.getElementById("space");canvas.width=window.innerWidth,canvas.height=window.innerHeight;for(var c=canvas.getContext("2d"),cx=canvas.width/2,cy=canvas.height/2,circleArray=[],amount=65,colors=["#5022FF","#1D69FF","#0067CA","#ffffff","#ffffff"],sunColors=["#000000"],mouseClick={x:void 0,y:void 0},i=0;i<amount;i++){var circleRadius=1*Math.random()+.08,x=Math.random()*(innerWidth-2*circleRadius)+circleRadius,y=Math.random()*(innerHeight-2*circleRadius)+circleRadius,dx=.5*(Math.random()-.5),dy=.5*(Math.random()-.5),counterOutput=document.querySelector(".counter");circleArray.push(new Circle(x,y,dx,dy,circleRadius,counterOutput))}function animate(){for(requestAnimationFrame(animate),c.clearRect(0,0,innerWidth,innerHeight),i=0;i<circleArray.length;i++)circleArray[i].update()}function Circle(t,e,i,o,s,n){this.x=t,this.y=e,this.dx=i,this.dy=o,this.circleRadius=s,this.colors=colors[~~(Math.random()*colors.length)],this.sunColors=sunColors,this.counterOutput=n,this.draw=function(){c.fillStyle=this.colors,c.beginPath(),c.arc(this.x,this.y,this.circleRadius,0,2*Math.PI,!1),c.fill(),c.lineWidth="1.5",c.strokeStyle=this.colors,c.stroke()},this.update=function(){(this.x+this.circleRadius>innerWidth||this.x-this.circleRadius<0)&&(this.dx=-this.dx),(this.y+this.circleRadius>innerHeight||this.y-this.circleRadius<0)&&(this.dy=-this.dy),this.x+=this.dx,this.y+=this.dy,mouseClick.x-this.x<=30&&-30<=mouseClick.x-this.x&&mouseClick.y-this.y<=30&&-30<=mouseClick.y-this.y?this.circleRadius+=7:7.1<this.circleRadius&&(this.circleRadius-=7),this.draw()}}function resize(){$("#space").outerHeight($(window).height()-$("#space").offset().top-Math.abs($("#space").outerHeight(!0)-$("#space").outerHeight()))}console.log(circleArray.length),animate(),console.log(mouseClick.x),$(document).ready(function(){resize(),$(window).on("resize",function(){resize()})});var planetColor="#000000",can=document.getElementById("planets"),ctx=can.getContext("2d"),width=10,height=10,planets=[];function planetOptions(t,e,i){ctx.fillStyle=planetColor,ctx.beginPath(),ctx.arc(e,e,t/2.009,0,2*Math.PI,!1),ctx.fill(),ctx.closePath(),ctx.fillStyle="rgba(0,110,250,0.6)";for(var o=-t;o<t;o++){var c=parseInt(Math.sqrt(t*t/4-o*o));for(x=-c;x<c;x++){var s=parseInt(Math.random()*c)/1.5;c+x<s&&ctx.fillRect(x+e,o+e,.75,.75)}}}function draw(){for(var t=0;t<planets.length;t++){var e=planets[t];planetOptions(e.rad,e.x,e.y)}}width=can.width=window.innerWidth,height=can.height=document.body.offsetHeight,planets.push({rad:height/6,x:width/4,y:height/2}),draw();var toBottom="to bottom",space=document.querySelector("#space");sectionTwo=document.querySelector(".section-two");$(window).scroll(function(){var t=$(window).scrollTop();400<t?(sectionTwo.classList.add("grad"),sectionTwo.style.background="linear-gradient("+toBottom+", #020111 5%,#353549 100%)",space.style.opacity=".15",sectionTwo.style.opacity="1"):t<325&&(sectionTwo.classList.remove("grad"),space.style.opacity="1",sectionTwo.style.opacity="0")});var sectionTwoLight=document.querySelector(".section-two-light"),interpersonalButton=document.querySelector(".interpersonalButton"),technicalButton=document.querySelector(".technicalButton"),galaxy=document.querySelector(".galaxy-center"),body=document.querySelector("body"),interpersonalList=document.querySelector(".interpersonalList"),technicalList=document.querySelector(".technicalList"),moon=document.querySelector(".moon"),cloudsLightOne=document.querySelector(".cloudsLightOne"),cloudsLightTwo=document.querySelector(".cloudsLightTwo"),clouds=document.querySelector(".clouds"),inSun=document.querySelector(".in"),citySilouhute=document.querySelector(".citySilouhute");technicalButton.addEventListener("click",function(){this.classList.remove("faded"),interpersonalButton.classList.add("faded"),canvas.style.display="none",sectionTwoLight.style.background="linear-gradient(to bottom, #82addb 0%,#ebb2b1 100%)",body.classList.add("backLight"),sectionTwoLight.style.opacity="1",sectionTwoLight.style.display="block",galaxy.style.display="none",technicalList.classList.remove("hide"),interpersonalList.classList.add("hide"),moon.style.display="none",cloudsLightOne.style.opacity=".50",cloudsLightTwo.style.opacity=".45",$(clouds).addClass("hide"),citySilouhute.classList.add("cityWhite"),citySilouhute.classList.remove("city"),inSun.style.background="radial-gradient(rgba(255, 255, 255, .75) 1%, rgba(243, 206, 205, .05) 40%, rgba(88, 88, 88, .075) 55%, rgba(0, 0, 0, 0) 70%)"}),interpersonalButton.addEventListener("click",function(){this.classList.remove("faded"),technicalButton.classList.add("faded"),sectionTwoLight.style.opacity="0",canvas.style.display="block",body.classList.remove("backLight"),galaxy.style.display="block",interpersonalList.classList.remove("hide"),technicalList.classList.add("hide"),moon.style.display="block",cloudsLightOne.style.opacity="0",cloudsLightTwo.style.opacity="0",$(clouds).removeClass("hide"),citySilouhute.classList.add("city"),citySilouhute.classList.remove("cityWhite")});