window.addEventListener("load",function(){AOS.init(),$(".HomeLink").click(function(){$("html, body").animate({scrollTop:$("#Home").offset().top},1e3)}),$(".AboutLink").click(function(){$("html, body").animate({scrollTop:$("#About").offset().top-150},1e3)}),$(".GalleryLink").click(function(){$("html, body").animate({scrollTop:$("#Gallery").offset().top-50},1e3)}),$(".ServicesLink").click(function(){$("html, body").animate({scrollTop:$("#Services").offset().top-100},1e3)}),$(".HoursLink").click(function(){$("html, body").animate({scrollTop:$("#Hours").offset().top-100},1e3)}),$(".ContactLink").click(function(){$("html, body").animate({scrollTop:$("#Contact").offset().top-25},1e3)});var t=document.querySelector(".burgerIcon"),e=document.querySelector(".closebtn"),o=document.querySelectorAll(".sideLink");for(t.addEventListener("click",function(){document.getElementById("myNav").style.width="100%"}),e.addEventListener("click",n),i=0;i<o.length;i++)o[i].addEventListener("click",n);function n(){document.getElementById("myNav").style.width="0%"}});