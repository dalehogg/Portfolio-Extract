var GUID=function(){function e(){do var t="xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(e){var t=16*Math.random()|0,r="x"==e?t:3&t|8;return r.toString(16)});while(!e.register(t));return t}return e.create=function(){return e()},e.version="1.2.0",e.list=[],e.exists=function(t){return e.list.indexOf(t)>-1},e.register=function(t){return!e.exists(t)&&(e.list.push(t),!0)},e}(),Obj=function(){function toFunc(e){if("function"==typeof e)return e;if("string"==typeof e){if(void 0!=window[e]&&"function"==typeof window[e])return window[e];try{return new Function(e)}catch(e){}}return function(){return e}}function Obj(){this._guid=GUID(),Object.defineProperty(this,"guid",{get:function(){return this._guid},set:function(){}}),this._handlers=[],this.on=function(e,t,r){for(var i="all",n=null,s=0,o=0;o<arguments.length;o++)"string"==typeof arguments[o]?i=arguments[o].toLowerCase().split(" "):arguments[o]instanceof Array?i=$.map(arguments[o],function(e,t){return e.toLowerCase()}):"function"==typeof arguments[o]?n=arguments[o]:"number"==typeof arguments[o]&&(s=arguments[o]);if(!n)return this;for(var o=0;o<i.length;o++)this._handlers.push({event:i[o],handler:n,max_count:s,trigger_count:0});return this},this.off=function(e,t){if(void 0===t&&"function"==typeof e)for(var t=e,r=0;r<this._handlers.length;r++)this._handlers[r].handler==t&&this._handlers.splice(r--,1);else if(void 0===t&&"string"==typeof e){e=e.toLowerCase().split(" ");for(var r=0;r<this._handlers.length;r++)e.indexOf(this._handlers[r].event)>-1&&this._handlers.splice(r--,1)}else{e=e.toLowerCase().split(" ");for(var r=0;r<this._handlers.length;r++)e.indexOf(this._handlers[r].event)>-1&&this._handlers[r].handler==t&&this._handlers.splice(r--,1)}return this},this.trigger=function(e,t){e=e.toLowerCase().split(" ");for(var r=0;r<this._handlers.length;r++)(e.indexOf(this._handlers[r].event)>-1||"all"==this._handlers[r].event)&&toFunc(this._handlers[r].handler).call(this,"all"!=this._handlers[r].event?this._handlers[r].event:e.join(" "),t);return this},this._elements=$(),this.renderer=function(){var e=$("<div class='Obj'></div>");for(var t in this)0==t.indexOf("_")&&"function"!=typeof this[t]&&["_handlers","_elements","_guid"].indexOf(t)==-1&&e.append("<div class='Obj-member'><div class='Obj-member-key'>"+t.substr(1)+"</div><div class='Obj-member-value'>"+this[t]+"</div></div>");return e},this.refresher=function(e){return this.renderer.apply(this)},this.destroyer=function(e){},this.render=function(e,t){var r=this;if(void 0===e)var e="body";if(void 0===t)var t="append";else t=t.toLowerCase();var i=[].slice.call(arguments,2),n=this;return $(e).each(function(e,s){s=$(s);var o=$(r.renderer.apply(r,i));o.attr("guid",r.guid),r._elements=r._elements.add(o),"append"==t?s.append(o):"prepend"==t?s.prepend(o):"after"==t?s.after(o):"before"==t?s.before(o):"return"==t?n=o:"replace"==t&&(s.after(o),s.remove())}),this.trigger("render"),n},this.refresh=function(e){for(var t=$(),r=0;r<this._elements.length;r++){var i=this._elements.eq(r),n=this.refresher.call(this,i,e);n?(n.attr("guid",this.guid),this._elements=this._elements.not(i),i.after(n),i.remove(),t=t.add(n)):t=t.add(i)}return this._elements=t,this},this.destroy=function(){var e=this;return this._elements.each(function(t,r){var i=$(r);i.off(),i.find("*").off(),e.destroyer.call(e,i)}),this._elements.remove(),this._elements=$(),delete Obj.directory[this.guid],this},this.defMember=function(e,t,r,i){for(var n=this,s=["handlers","on","off","trigger","elements","render","renderer","refresh","refresher","destroy","destroyer","defMember","defSettings","defMethod","guid"],o=0;o<s;o++)if(s[o]==e||"_"+s[o]==e)return!1;this["_"+e]=void 0===t?null:t,Object.defineProperty(this,e,{get:function(){var t=this["_"+e];return i&&(t=i.call(n,t)),this.trigger("get"+e+" "+e,t),t},set:function(t){if(r){var i=r.call(n,t);void 0!==i&&(t=i)}this["_"+e]=t,this.trigger("set"+e+" "+e,t),this.refresh(e)}})},this.defSettings=function(e){if(void 0===e)var e={};this._settings=e,Object.defineProperty(this,"settings",{get:function(){return this.trigger("getsettings settings",this._settings),this._settings},set:function(e){this._settings=$.extend(this._settings,e),this.trigger("setsettings settings",this._settings),this.refresh("settings")}})},this.defMethod=function(e,t){var r=this;this["_"+e]=t,this[e]=function(){var t=r["_"+e].apply(r,arguments);return r.trigger(e,arguments),void 0!=t?t:r}},Obj.directory[this.guid]=this}return Obj.version="2.1.3",Obj.directory={},Obj.extend=function(e,t){t||(t=Obj);var r=function(){t.apply(this,arguments),e.apply(this,arguments)};return e.prototypoe=Object.create(t.prototype),r.prototype=Object.create(e.prototype),r},Obj.create=function(o){function Proto(){Obj.apply(this)}if("function"==typeof o)return Obj.extend(o);if("object"==typeof o){var cc="function Proto(){Obj.apply(this);";for(var k in o){var v=o[k];"function"==typeof v?cc+=["init","renderer","refresher","destroyer"].indexOf(k)>-1?"this."+k+"="+v+";":"this.defMethod('"+k+"',"+v+");":("string"==typeof v&&(v='"'+v+'"'),cc+="this.defMember('"+k+"', "+v+");")}return o.init&&(cc+="this.init.apply(this,arguments);"),cc+="};Proto.prototype = Object.create(Obj.prototype);",eval(cc),Proto}return Proto.prototype=Object.create(Obj.prototype),Proto},Obj}();if(typeof($add)=="undefined")var $add={version:{},auto:{disabled:false}};!function(t){$add.version.Radios="2.0.1",$add.RadioObj=Obj.create(function(e,i){this.defMember("radio_set"),this.defSettings({id:"",name:"",class:"",selected:!1,label:"",value:null}),this.defMethod("select",function(){this.radio_set.unselectAll(),this.settings={selected:!0},this.radio_set.refresh("value")}),Object.defineProperty(this,"value",{get:function(){return null!=this._settings.value?this._settings.value:this._settings.label},set:function(){}}),this.renderer=function(){var e=this,i=t("<div class='addui-radios-radio'></div>"),a=t("<div class='addui-radios-icon material-icons'></div>").appendTo(i);this._settings.selected?a.html("&#xE837"):a.html("&#xE836;");t("<div class='addui-radios-label'>"+this._settings.label+"</div>").appendTo(i);return i.on("click",function(){e.select()}),i},this.defMethod("init",function(t,e){this.radio_set=t,this.settings=e}),this.init.apply(this,arguments)}),$add.RadioSetObj=Obj.create(function(e){this.defMember("radios",[]),this.defMethod("addRadio",function(t){if(t instanceof Array)for(var e=0;e<t.length;e++)this.addRadio(t[e]);else{var t=new $add.RadioObj(this,t);this.radios.push(t),this.refresh()}}),this.defMethod("unselectAll",function(){for(var t=0;t<this.radios.length;t++)this.radios[t].settings={selected:!1}}),Object.defineProperty(this,"value",{get:function(){for(var t=0;t<this._radios.length;t++)if(this._radios[t]._settings.selected)return this._radios[t].value;return null},set:function(t){for(var e=0;e<this._radios.length;e++)this._radios[e].value==t&&this._radios[e].select();this.refresh()}}),this.renderer=function(){for(var e=t("<div class='addui-radios'></div>"),i=0;i<this.radios.length;i++)this.radios[i].render(e,"append");t("<input type='hidden' class='addui-radios-input' name='"+this._radios[0]._settings.name+"' value='"+this.value+"'>").appendTo(e);return e},this.refresher=function(t,e){return"value"!=e?this.renderer():void t.find(".addui-radios-input").val(this.value)},this.defMethod("init",function(t){this.addRadio(t)}),this.init.apply(this,arguments)}),$add.Radios=function(e){var i=[];t(e).each(function(e,a){var s=t(a);i.indexOf(s.attr("name"))==-1&&i.push(s.attr("name"))});for(var a=[],s=0;s<i.length;s++){var d=t("input[name="+i[s]+"]").map(function(e,i){var a=t(i),s={name:a.attr("name")};return a.attr("id")&&(s.id=a.attr("id")),a.attr("placeholder")&&(s.label=a.attr("placeholder")),a.attr("class")&&(s.class=a.attr("class")),a.attr("value")&&(s.value=a.attr("value")),(a.attr("selected")||a.attr("checked"))&&(s.selected=!0),s});d=d.toArray();var n=new $add.RadioSetObj(d);n.render(t("input[name="+i[s]+"]").first(),"replace"),t("input[name="+i[s]+"]:not(.addui-radios-input)").remove(),a.push(n)}return 0==a.length?null:1==a.length?a[0]:a},t.fn.addRadios=function(){$add.Radios(this)},$add.auto.Radios=function(){$add.auto.disabled||t("input[data-addui=radios]").addRadios()}}(jQuery);$(function(){for(var k in $add.auto){if(typeof($add.auto[k])=="function"){$add.auto[k]();}}});