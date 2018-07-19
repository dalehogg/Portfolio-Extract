(function($){
  $add.version.Radios = "2.0.1";
  $add.RadioObj = Obj.create(function(radio_set, settings){
    this.defMember("radio_set");
    this.defSettings({
      id: "",
      name: "",
      class: "",
      selected: false,
      label: "",
      value: null
    });
    this.defMethod("select", function(){
      this.radio_set.unselectAll();
      this.settings = {
        selected: true
      };
      this.radio_set.refresh("value");
    });
    Object.defineProperty(this, "value", {
      get: function(){
        if(this._settings.value != null) return this._settings.value;
        else return this._settings.label;
      },
      set: function(){}
    })

    this.renderer = function(){
      var self = this;
      var $radio = $("<div class='addui-radios-radio'></div>");
      var $icon = $("<div class='addui-radios-icon material-icons'></div>").appendTo($radio);
      if(this._settings.selected){
        $icon.html("&#xE837");
      } else {
        $icon.html("&#xE836;");
      }
      var $label = $("<div class='addui-radios-label'>"+this._settings.label+"</div>").appendTo($radio);
      $radio.on("click", function(){
        self.select();
      });
      return $radio;
    };

    this.defMethod("init", function(radio_set, settings){
      this.radio_set = radio_set;
      this.settings = settings;
    });
    this.init.apply(this, arguments);
  });
  $add.RadioSetObj = Obj.create(function(radios){
    this.defMember("radios", []);
    this.defMethod("addRadio", function(radio){
      if(radio instanceof Array){
        for(var i=0; i<radio.length; i++){
          this.addRadio(radio[i]);
        }
        return;
      }
      var radio = new $add.RadioObj(this, radio);
      this.radios.push(radio);
      this.refresh();
    });

    this.defMethod("unselectAll", function(){
      for(var i=0; i<this.radios.length; i++){
        this.radios[i].settings = {
          selected: false
        };
      }
    });
    Object.defineProperty(this, "value", {
      get: function(){
        for(var i=0; i<this._radios.length; i++){
          if(this._radios[i]._settings.selected){
            return this._radios[i].value;
          }
        }
        return null;
      },
      set: function(val){
        for(var i=0; i<this._radios.length; i++){
          if(this._radios[i].value == val){
            this._radios[i].select();
          }
        }
        this.refresh();
      }
    });

    this.renderer = function(){
      var $radio_set = $("<div class='addui-radios'></div>");
      for(var i=0; i<this.radios.length; i++){
        this.radios[i].render($radio_set, "append");
      }
      var $input = $("<input type='hidden' class='addui-radios-input' name='"+this._radios[0]._settings.name+"' value='"+this.value+"'>").appendTo($radio_set);
      return $radio_set;
    };
    this.refresher = function($el, changed){
      if(changed == "value"){
        $el.find(".addui-radios-input").val(this.value);
      } else return this.renderer();
    };
    this.defMethod("init", function(radios){
      this.addRadio(radios);
    });
    this.init.apply(this, arguments);
  });
  $add.Radios = function(selector){
    var names = [];
    $(selector).each(function(i,el){
      var $el = $(el);
      if(names.indexOf($el.attr("name")) == -1){
        names.push($el.attr("name"));
      }
    });
    var r = [];
    for(var i=0; i<names.length;i++){
      var radios = $("input[name="+names[i]+"]").map(function(i,el){
        var $el = $(el);
        var radio = {
          name: $el.attr("name")
        };
        if($el.attr("id")) radio.id = $el.attr("id");
        if($el.attr("placeholder")) radio.label = $el.attr("placeholder");
        if($el.attr("class")) radio.class = $el.attr("class");
        if($el.attr("value")) radio.value = $el.attr("value");
        if($el.attr("selected")||$el.attr("checked")) radio.selected = true;
        return radio;
      });
      radios = radios.toArray();
      var RS = new $add.RadioSetObj(radios);
      RS.render($("input[name="+names[i]+"]").first(), "replace");
      $("input[name="+names[i]+"]:not(.addui-radios-input)").remove();
      r.push(RS);
    }
    return (r.length==0)?null:(r.length==1)?r[0]:r;
  };
  $.fn.addRadios = function(){
    $add.Radios(this);
  };
  $add.auto.Radios = function(){
    if(!$add.auto.disabled){
      $("input[data-addui=radios]").addRadios();
    }
  };
})(jQuery);
