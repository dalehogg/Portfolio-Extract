var containSlider = document.getElementById("slider");
var sliderWidth = containSlider.offsetWidth;
var SliderList = document.getElementById("slideList");
var SliderCount = 1;
var items = SliderList.querySelectorAll("li").length;
var PreviousSlide = document.getElementById("PreviousHidden");
var NextSlide = document.getElementById("NextHidden");
var cards = document.querySelectorAll(".card");
var intervalSpeed = 10000;

function sizeIncrease () {
    for (var i = 0; i < cards.length; i++) {
    var card = cards[i];
    card.onclick = function () {
      if (this.classList.contains("one")) {
        this.classList.add("widthIncrease");
        this.classList.remove("one");
        this.classList.remove("widthDecrease");
      }
      else if(this.classList.contains("widthIncrease")){
        this.classList.add("one");
        this.classList.add("widthDecrease");
        this.classList.remove("widthIncrease");
      }
    };
  }
}

function mouseOverArrow () {
    PreviousSlide.removeAttribute('id');
    NextSlide.removeAttribute('id');
    PreviousSlide.classList.add("Prev");
    NextSlide.classList.add("Next");
}
function mouseOutArrow () {
    PreviousSlide.setAttribute("id", "PreviousHidden");
    NextSlide.setAttribute("id", "NextHidden");
    PreviousSlide.removeAttribute('class');
    NextSlide.removeAttribute('class');
}

var Slider = function() {

function minusSlide () {
    SliderList.style.left = -SliderCount * sliderWidth + "px";    // Subtract by the slider width (100%)
}
  var Previous = function() {
    if(SliderCount > 1) {
      SliderCount = SliderCount - 2;
      minusSlide();
      SliderCount++;
    }else if (SliderCount = 1){   // From first slide, if backbutton pressed, minus 1 which send the selected to the last one
      SliderCount = items - 1;
      minusSlide();
      SliderCount++;
    }
  };

  var Next = function() {
    if(SliderCount < items) {
      minusSlide();
      SliderCount++;
    }else if (SliderCount = items){   // From last slide, if forward button pressed, go back to the start
      SliderList.style.left = "0px";
      SliderCount = 1;
    }
  };

  function leftArrowKey (e) {
    var keydown = e.keyCode;
    if(keydown == 39){
        Next();
    }else if(keydown == 37){
        Previous();
    }
  }
  
  document.addEventListener("keydown", leftArrowKey);
  
  containSlider.addEventListener('mouseover', mouseOverArrow);

  containSlider.addEventListener('mouseout', mouseOutArrow);
  NextSlide.addEventListener("click", function() {
    Next();
  });
  PreviousSlide.addEventListener("click", function() {
    Previous();
  });
  
  setInterval(function() {
    Next();
  }, 10000);
};
  Slider();
  sizeIncrease();









