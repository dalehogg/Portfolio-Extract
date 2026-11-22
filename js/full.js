window.addEventListener('load',function(){!function(s){"use strict";s.loadCSS||(s.loadCSS=function(){});var a=loadCSS.relpreload={};if(a.support=function(){var e;try{e=s.document.createElement("link").relList.supports("preload")}catch(t){e=!1}return function(){return e}}(),a.bindMediaToggle=function(t){var e=t.media||"all";function i(){t.media=e}t.addEventListener?t.addEventListener("load",i):t.attachEvent&&t.attachEvent("onload",i),setTimeout(function(){t.rel="stylesheet",t.media="only x"}),setTimeout(i,3e3)},a.poly=function(){if(!a.support())for(var t=s.document.getElementsByTagName("link"),e=0;e<t.length;e++){var i=t[e];"preload"!==i.rel||"style"!==i.getAttribute("as")||i.getAttribute("data-loadcss")||(i.setAttribute("data-loadcss",!0),a.bindMediaToggle(i))}},!a.support()){a.poly();var t=s.setInterval(a.poly,500);s.addEventListener?s.addEventListener("load",function(){a.poly(),s.clearInterval(t)}):s.attachEvent&&s.attachEvent("onload",function(){a.poly(),s.clearInterval(t)})}"undefined"!=typeof exports?exports.loadCSS=loadCSS:s.loadCSS=loadCSS}("undefined"!=typeof global?global:this);
function C(t,e){return Math.floor(Math.random()*(e-t+1))+t}
window.requestAnimFrame=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(t){window.setTimeout(t,1e3/60)};
function soffitStarDpr(){var n=window.devicePixelRatio||1;return n>3?3:n}
function soffitStarBox(){
  var track=document.querySelector("#nightSky .star-track");
  var sky=document.getElementById("nightSky");
  var w=(track&&track.clientWidth)||(sky&&sky.clientWidth)||window.innerWidth||1;
  var h=(track&&track.clientHeight)||0;
  if(h<2){var skyH=(sky&&sky.clientHeight)||window.innerHeight||800;h=Math.round(skyH*2.6)}
  if(w<2)w=window.innerWidth||1280;
  return {w:w,h:h};
}
function soffitFitCanvas(canvas,cssW,cssH){
  if(!canvas)return null;
  var r=soffitStarDpr();
  var bw=Math.max(1,Math.round(cssW*r));
  var bh=Math.max(1,Math.round(cssH*r));
  if(canvas.width!==bw||canvas.height!==bh){canvas.width=bw;canvas.height=bh}
  canvas.style.width=cssW+"px";
  canvas.style.height=cssH+"px";
  var ctx=canvas.getContext("2d");
  ctx.setTransform(r,0,0,r,0,0);
  return ctx;
}
var sz=soffitStarBox();
var O={w:sz.w,h:sz.h,stars:980,twinklers:.16,shooters:.08,
  starfield:{buffer:[],canvas:document.getElementById("starfield"),ctx:null},
  twinklefield:{buffer:[],canvas:document.getElementById("twinklefield"),ctx:null},
  shooting:{buffer:[],canvas:document.getElementById("shooting"),ctx:null},
  planet:{canvas:document.getElementById("planet"),ctx:null},
  setup:function(){
    var s=soffitStarBox();
    this.w=s.w;this.h=s.h;
    this.starfield.ctx=soffitFitCanvas(this.starfield.canvas,this.w,this.h);
    this.twinklefield.ctx=soffitFitCanvas(this.twinklefield.canvas,this.w,this.h);
    this.shooting.ctx=soffitFitCanvas(this.shooting.canvas,this.w,this.h);
    this.planet.ctx=soffitFitCanvas(this.planet.canvas,this.w,this.h);
  }
};
O.starfield.generate=function(){
  var t=O.stars,e=0;
  this.buffer=[];
  for(;e<t;e++)this.buffer[e]={position:{x:C(0,O.w),y:C(0,O.h)},hue:C(0,360),size:0.7,opacity:C(0,70),saturation:C(0,30)+"%"};
};
O.twinklefield.generate=function(){
  var t=O.stars*O.twinklers,e=0;
  this.buffer=[];
  for(;e<t;e++)this.buffer[e]={position:{x:C(0,O.w),y:C(0,O.h)},hue:C(0,360),size:0.45+1.05*Math.random(),opacity:C(60,100),saturation:C(70,100)+"%"};
};
O.shooting.generate=function(){
  if(C(0,O.stars)<O.stars*O.shooters){
    var t={position:{x:C(0,O.w),y:C(0,O.h/3)},delta:{x:20*Math.random()-10,y:C(1,3)},size:1*Math.random(),decay:2*Math.random()+.5,opacity:.2,color:"255,235,255"};
    O.shooting.buffer.push(t);
  }
};
O.starfield.render=function(){
  var ctx=this.ctx;if(!ctx)return;
  ctx.clearRect(0,0,O.w,O.h);
  for(var t=this.buffer.length,e=0;e<t;e++){
    var i=this.buffer[e];
    ctx.beginPath();
    ctx.shadowBlur=0;
    ctx.fillStyle="hsla("+i.hue+", "+i.saturation+", 80%, ."+i.opacity+")";
    ctx.arc(i.position.x,i.position.y,i.size,0,2*Math.PI);
    ctx.fill();
  }
};
O.twinklefield.render=function(){
  var ctx=this.ctx;if(!ctx)return;
  ctx.clearRect(0,0,O.w,O.h);
  for(var t=this.buffer.length,e=0;e<t;e++){
    this.buffer[e].hue+=C(-30,30);
    var i=this.buffer[e].opacity-C(1,30),s=this.buffer[e];
    ctx.beginPath();
    ctx.shadowBlur=0;
    ctx.fillStyle="hsla("+s.hue+", "+s.saturation+", 85%, ."+i+")";
    ctx.arc(s.position.x,s.position.y,s.size,0,2*Math.PI);
    ctx.fill();
  }
};
O.shooting.render=function(){
  var ctx=this.ctx;if(!ctx)return;
  ctx.clearRect(0,0,O.w,O.h);
  for(var t=this.buffer.length,e=0;e<t-1;e++){
    var i=this.buffer[e];
    if(void 0!==i&&0<i.decay){
      if(i.delta.x<2&&-2<i.delta.x){i.delta.x<0?i.delta.x=-8:i.delta.x=8;i.color="255,200,220"}
      ctx.beginPath();
      ctx.fillStyle="rgba("+i.color+","+i.opacity+")";
      ctx.arc(i.position.x,i.position.y,1,0,2*Math.PI);
      ctx.fill();
      ctx.beginPath();
      ctx.fillStyle="rgba("+i.color+","+.6*i.opacity+")";
      ctx.arc(i.position.x-i.delta.x,i.position.y-i.delta.y,1,0,2*Math.PI);
      ctx.fill();
      ctx.beginPath();
      ctx.fillStyle="rgba("+i.color+","+.3*i.opacity+")";
      ctx.arc(i.position.x-2*i.delta.x,i.position.y-2*i.delta.y,1,0,2*Math.PI);
      ctx.fill();
      O.shooting.buffer[e].decay-=.01;
      O.shooting.buffer[e].position.x+=O.shooting.buffer[e].delta.x;
      O.shooting.buffer[e].position.y+=O.shooting.buffer[e].delta.y;
    } else this.buffer.splice(e,1);
    if(void 0!==i&&i.decay<1)O.shooting.buffer[e]&&(O.shooting.buffer[e].opacity-=.01);
    else if(void 0!==i&&i.opacity<1)O.shooting.buffer[e]&&(O.shooting.buffer[e].opacity+=.05);
  }
};
O.planet.render=function(){
  var ctx=this.ctx;if(!ctx)return;
  ctx.clearRect(0,0,O.w,O.h);
  ctx.beginPath();
  ctx.fillStyle="#0f0f0f";
  ctx.shadowColor="rgba(233,233,255,0.9)";
  ctx.shadowBlur=50;
  ctx.arc(O.w/2,7.2*O.h,2*O.w,1.3*Math.PI,2.7*Math.PI,!1);
  ctx.fill();
  ctx.shadowBlur=0;
};
O.setup();
O.starfield.generate();
O.starfield.render();
O.twinklefield.generate();
O.planet.render();
window.soffitFullStarsResize=function(){
  var s=soffitStarBox();
  var wChanged=O.w>0&&Math.abs(s.w-O.w)/O.w>0.02;
  if(s.w===O.w&&s.h===O.h){
    var r=soffitStarDpr();
    if(O.starfield.canvas&&O.starfield.canvas.width===Math.round(O.w*r))return;
  }
  O.setup();
  if(wChanged||!O.starfield.buffer.length){
    O.starfield.generate();
    O.twinklefield.generate();
  }
  O.starfield.render();
  O.planet.render();
};
var M=0;
(function t(){
  M++;
  requestAnimFrame(t);
  if(M%12==0){O.twinklefield.render();O.shooting.generate();if(M%5==0)M=0}
  O.shooting.render();
})();
});
