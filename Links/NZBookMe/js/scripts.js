
// REQUIRED FOR PLUGINS

// Fullpage.js Plugin
$(document).ready(function() {    
  "use strict";
  $('#fullpage').fullpage();
});
$(document).ready(function() {

// Swiper-4.0.7 Plugin  
var swiper = new Swiper('.swiper-container', {      
      slidesPerView: 5,
      spaceBetween: -20,
      slidesPerGroup: 1,
      centeredSlides: true,
      slideToClickedSlide: true,
      loop: true,
      loopFillGroupWithBlank: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
////////////////////////
var Arrival = document.querySelectorAll(".A");
var Depature = document.querySelectorAll(".D");
var partyPeople = document.querySelectorAll(".fa-male");
var days = document.querySelector(".daySum");
var people = document.querySelector(".partySum");
var error = document.querySelector(".error");
var priceOutputEdit = document.querySelector(".priceOutputEdit");
var accommodationOutputEdit = document.querySelector(".accommodationOutputEdit");
var partyOutputEdit = document.querySelector(".partyOutputEdit");
var durationOutputEdit = document.querySelector(".durationOutputEdit");
var mealOutputEdit = document.querySelector(".mealOutputEdit");
// Price ranges
var lowPrice = document.querySelectorAll('.lowPrice');
var middlePrice = document.querySelectorAll('.middlePrice');
var highPrice = document.querySelectorAll('.highPrice');

var breakfastOption = document.querySelectorAll('.breakfast');
var lunchOption = document.querySelectorAll('.lunch');
var dinnerOption = document.querySelectorAll('.dinner'); 

// Hotel
var hotel = document.querySelectorAll('.Hotel');
// Hostel
var hostel = document.querySelectorAll('.Hostel');

var twoToFourHostel = document.querySelector('.twoToFourHostel');
// Motel
var motel = document.querySelectorAll('.Motel');
var twoToFour = document.querySelector('.twoToFour');         // Party Number
var fourToSixMotel = document.querySelector('.fourToSixMotel');
var twoToSix = document.querySelector('.twoToSix');
// House
var house = document.querySelectorAll('.House');
var threeToSixHouse = document.querySelector('.threeToSixHouse');
var twoToFive = document.querySelector('.twoToFive');
// Arrrays
var sleepingOptionFinal = [''];
var priceRange = [''];
var partyLength = [''];
var kiwiMeals = [''];
var selectionArrival = [' '];
var selectionDepature = [' '];
var sleepingOption = [' '];
var pricingOption = [' '];
var mealOptionsArray = [' '];
var partyNumArray = [' '];
//
var AsConversion;
var AiConversion;
var DsConversion;
var DiConversion;
var SsConversion;
var PsConversion;      
var MsConversion;
var PartySConversion;

for (i = 0; i < Arrival.length; i++){
    Arrival[i].addEventListener('click', ArrivalNumber);
    $(Arrival[i]).on('click', Arrival, overlayArrival);
}
for (i = 0; i < Depature.length; i++){
    Depature[i].addEventListener('click', DepatureNumber);
    $(Depature[i]).on('click', Depature, overlayDepature);
}
for (i = 0; i < partyPeople.length; i++){
    partyPeople[i].addEventListener('click', partyNumber);
}

// ADDING SELECTED LOOK TO THE ACTIVE CLASS IF THE DATES
function overlayArrival () {
  "use strict";
   $(this).addClass('arrivalOverlay');
   if ($(this).hasClass('swiper-slide-active')){
      $(this).siblings().removeClass('arrivalOverlay');
   }
}
// ADDING SELECTED LOOK TO THE ACTIVE CLASS IF THE DATES
function overlayDepature () {
  "use strict";
   $(this).addClass('depatureOverlay');
   if ($(this).hasClass('swiper-slide-active')){
      $(this).siblings().removeClass('depatureOverlay');
   }
}

////////////////////////////////////// DEPATURE OPTIONS //////////////////////////////////////

function DepatureNumber () {
    "use strict";
    var result = this.innerHTML;
    selectionDepature.push(result + 'th' + '-' + 'Depature');
    selectionDepature.shift();
    DsConversion = selectionDepature.toString();
    DiConversion = parseInt(DsConversion);
    var daysConversion = Math.abs(AiConversion - DiConversion);
    $('.durationFadePlaceholder').removeClass('fadeSuggest');
    durationOutputEdit.innerHTML = daysConversion + ' days';
    if (daysConversion == 1){
        days.innerHTML = daysConversion + ' day';

        $(error).removeClass();
    }
    else if (daysConversion > 1){
        days.innerHTML = daysConversion + ' days';
        $(error).removeClass();
    }
    else if (daysConversion < 1){
        days.innerHTML = daysConversion + ' days';
        
        error.innerHTML = 'Please enter the duration of your stay';
    }

    function Dchecker (value){
        return value <= daysConversion;
    }
    // FILTERING THE daysConversion BY THESE NUMBERS
    var depatureTotal = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18].filter(Dchecker);

    if (depatureTotal.length < 2){
        $('.otherThan').addClass('hide');
        $('.oneFiveSeven').removeClass('hide');
     }
     if ((depatureTotal.length > 5) && (depatureTotal.length < 7)){
        $('.oneFiveSeven').addClass('hide');
        $('.OneEighty').removeClass('hide');
        $('.twoFourty').removeClass('hide');
        $('.twoHundred').removeClass('hide');
        $('.OneSeventy').removeClass('hide');
        $('.oneHundred').removeClass('hide');
        $('.oneFifteen').removeClass('hide');
        $('.ThirtyHostel').removeClass('hide');
        $('.SixtySix').removeClass('hide');
        $('.oneSixty').removeClass('hide');
        $('.FiftyThree').removeClass('hide');
        $('.Ninety').removeClass('hide');
     }
     if (depatureTotal.length > 7){
        $('.oneFiveSeven').addClass('hide');
     }
     if (depatureTotal.length > 8){
        $('.OneSeventy').addClass('hide');
        $('.oneHundred').addClass('hide');
        $('.oneToFourHotel').addClass('hide');
        $('.oneFifteen').addClass('hide');
     }
     if (depatureTotal.length > 9){
       $('.OneSeventy').addClass('hide');
       $('.oneHundred').addClass('hide');
       $('.oneFifteen').addClass('hide');
     }
     if (depatureTotal.length > 10) {
        $('.SixtySix').addClass('hide');
        $('.Ninety').addClass('hide');
        $('.OneSeventy').addClass('hide');
        $('.oneHundred').addClass('hide');
        $('.oneFifteen').addClass('hide');
        $('.ThirtyHostel').addClass('hide');
     }
     if (depatureTotal.length > 12) {
        $('.twoHundred').addClass('hide');
        $('.OneSeventy').addClass('hide');
        $('.oneHundred').addClass('hide');
        $('.oneFifteen').addClass('hide');
        $('.ThirtyHostel').addClass('hide');
        $('.SixtySix').addClass('hide');
        $('.FiftyThree').addClass('hide');
        $('.Ninety').addClass('hide');
        $('.ThirtyHostel').addClass('hide');
     }
     if (depatureTotal.length > 15) {
        // $('.twoFourty').addClass('none');
        $('.twoHundred').addClass('hide');
        $('.OneSeventy').addClass('hide');
        $('.oneHundred').addClass('hide');
        $('.oneFifteen').addClass('hide');
        $('.ThirtyHostel').addClass('hide');
        $('.SixtySix').addClass('hide');
        $('.FiftyThree').addClass('hide');
        $('.Ninety').addClass('hide');
        $('.ThirtyHostel').addClass('hide');
     }
     if (depatureTotal.length > 16) {
        $('.ThirtyHostel').addClass('hide');
        $('.twoFourty').addClass('hide');
        $('.twoHundred').addClass('hide');
        $('.OneSeventy').addClass('hide');
        $('.oneHundred').addClass('hide');
        $('.oneFifteen').addClass('hide');
        $('.ThirtyHostel').addClass('hide');
        $('.SixtySix').addClass('hide');
        $('.FiftyThree').addClass('hide');
        $('.Ninety').addClass('hide');
        $('.OneEighty').addClass('hide');
     }
    // console.log(dates);
}

////////////////////////////////////// ARRIVAL OPTIONS //////////////////////////////////////
function ArrivalNumber () {
    "use strict";
    var result = this.innerHTML;
    selectionArrival.push(result + 'th' + '-' + 'Arrival');
    selectionArrival.shift();
    AsConversion = selectionArrival.toString();
    AiConversion = parseInt(AsConversion);
}

////////////////////////////////////// SLEEPING OPTIONS //////////////////////////////////////
// FUNCTIONS FOR ADDING AND REMOVING CLASSES (REMOVING TO ENABLE THE ABILITY TO RE-SELECT) //
function hideHotel () {
    $(hotel).addClass('hideSleeping');
}
function removeHideHotel () {
    $(hotel).removeClass('hideSleeping');
}
function hideHostel () {
    $(hostel).addClass('hideSleeping');
}
function removeHideHostel () {
    $(hostel).removeClass('hideSleeping');
}
function hideMotel () {
    $(motel).addClass('hideSleeping');
}
function removeHideMotel () {
    $(motel).removeClass('hideSleeping');
}
function hideHouse () {
    $(house).addClass('hideSleeping');
}
function removeHideHouse () {
    $(house).removeClass('hideSleeping');
}

function sleepingOptionClick () {
    "use strict";
    var sleeping = sleepOption.val();
    sleepingOption.push(sleeping);
    sleepingOption.shift();
    SsConversion = sleepingOption.toString();
    accommodationOutputEdit.innerHTML = SsConversion;
    $('.accommodationFadePlaceholder').removeClass('fadeSuggest');

    if (SsConversion === 'Hotel'){              // For loops necessary to avoid having multiple class names for each type of accommodation
        sleepingOptionFinal.push(SsConversion);
        sleepingOptionFinal.shift();
        for (i = 0; i < hotel.length; i++){
            removeHideHotel();
        }
        for (i = 0; i < hostel.length; i++){
            hideHostel();
        }
        for (i = 0; i < motel.length; i++){
            hideMotel();
        }
        for (i = 0; i < house.length; i++){
            hideHouse();
        }
    }else if (SsConversion === 'Hostel'){
        sleepingOptionFinal.push(SsConversion);
        sleepingOptionFinal.shift();
        for (i = 0; i < hostel.length; i++){
            removeHideHostel();
        }
        for (i = 0; i < hotel.length; i++){
            hideHotel();
        }
        for (i = 0; i < motel.length; i++){
            hideMotel();
        }
        for (i = 0; i < house.length; i++){
            hideHouse();
        }
    }else if (SsConversion === 'Motel'){
        sleepingOptionFinal.push(SsConversion);
        sleepingOptionFinal.shift();
        for (i = 0; i < motel.length; i++){
            removeHideMotel();
        }
        for (i = 0; i < hotel.length; i++){
            hideHotel();
        }
        for (i = 0; i< hostel.length; i++){
            hideHostel();
        }
        for (i = 0; i < house.length; i++){
            hideHouse();
        }
    }else if (SsConversion === 'House'){
        sleepingOptionFinal.push(SsConversion);
        sleepingOptionFinal.shift();
        for (i = 0; i < house.length; i++){
            removeHideHouse();
        }
        for (i = 0; i < hotel.length; i++){
            hideHotel();
        }
        for (i = 0; i < hostel.length; i++){
            hideHostel();
        }
        for (i = 0; i < motel.length; i++){
            hideMotel();
        }
    }
}

////////////////////////////////////// PRICING OPTIONS //////////////////////////////////////
// FUNCTIONS FOR ADDING AND REMOVING CLASSES (REMOVING TO ENABLE THE ABILITY TO RE-SELECT) //
function lowCostAdd () {
    $(lowPrice).addClass('hidePricing');
}
function lowCostRemove () {
    $(lowPrice).removeClass('hidePricing');
}
function middleCostAdd () {
    $(middlePrice).addClass('hidePricing');
}
function middleCostRemove () {
    $(middlePrice).removeClass('hidePricing');
}
function highCostAdd () {
    $(highPrice).addClass('hidePricing');
}
function highCostRemove () {
    $(highPrice).removeClass('hidePricing');
}
function pricingOptionClick (){
    "use strict";
    var pricing = priceOption.val();
    pricingOption.push(pricing);
    pricingOption.shift();
    PsConversion = pricingOption.toString();
    priceOutputEdit.innerHTML = PsConversion;
    $('.priceFadePlaceholder').removeClass('fadeSuggest');
    if (PsConversion === 'Less than $100'){
      for (i = 0; i < lowPrice.length; i++){
          lowCostRemove();
      }
      for (i = 0; i < middlePrice.length; i++){
          middleCostAdd();
      }
      for (i = 0; i < highPrice.length; i++){
          highCostAdd();
      }
    }
    if (PsConversion === '$100 - $200'){
      for (i = 0; i < middlePrice.length; i++){
          middleCostRemove();
      }
      for (i = 0; i < lowPrice.length; i++){
          lowCostAdd();
      }
      for (i = 0; i < highPrice.length; i++){
          highCostAdd();
      }
    }
    if (PsConversion === '$200+'){
      for (i = 0; i < highPrice.length; i++){
          highCostRemove();
      }
      for (i = 0; i < middlePrice.length; i++){
          middleCostAdd();
      }
      for (i = 0; i < lowPrice.length; i++){
          lowCostAdd();
      }
      
    }
    console.log(priceRange);
}
////////////////////////////////////// MEAL OPTIONS //////////////////////////////////////
function mealOptionClick () {
    "use strict";
    var meals = mealOption.val();
    mealOptionsArray.push(meals);
    mealOptionsArray.shift(meals);
    console.log(mealOptionsArray);
    MsConversion = mealOptionsArray.toString();
    console.log(MsConversion);
    $('.mealFadePlaceholder').removeClass('fadeSuggest');
    mealOutputEdit.innerHTML = MsConversion;
    if (MsConversion === 'Kiwi Big Breakfast') {
        for (i = 0; i < breakfastOption.length; i++){
            $(breakfastOption).removeClass('hide');
            $(dinnerOption).addClass('hide');
            $(lunchOption).addClass('hide');
        }
    }else if (MsConversion === "Hearty Huge Lunch"){
        for (i = 0; i < lunchOption.length; i++){
            $(lunchOption).removeClass('hide');
            $(dinnerOption).addClass('hide');
            $(breakfastOption).addClass('hide');
        }
    }else if (MsConversion === "The Great Dinner"){
        for (i = 0; i < dinnerOption.length; i++){
            $(dinnerOption).removeClass('hide');
            $(lunchOption).addClass('hide');
            $(breakfastOption).addClass('hide');
        }
    }
    console.log(kiwiMeals);

}
////////////////////////////////////// PARTY OPTIONS //////////////////////////////////////
function partyNumber () {
    "use strict";
    $(this).toggleClass("blueMan");
    var bluePartyPeople = $('.blueMan').length;
    partyNumArray.push(bluePartyPeople);
    partyNumArray.shift();
    PartySConversion = Math.abs(partyNumArray);
    if (bluePartyPeople == 1){
      people.innerHTML = bluePartyPeople + ' Guest';      
    } else{
      people.innerHTML = bluePartyPeople + ' Guests';
    }
    if (PartySConversion == 1){
      partyOutputEdit.innerHTML = PartySConversion + ' Guest';
    }else{
      partyOutputEdit.innerHTML = PartySConversion + ' Guests';
    } if (PartySConversion < 1){
      $('.partyFadePlaceholder').addClass('fadeSuggest');
    }
    $('.partyFadePlaceholder').removeClass('fadeSuggest');


    function Pchecker(value){
            return value <= PartySConversion;
    }

    var party = [1, 1, 2, 1].filter(Pchecker);

    if (party.length == 3){
        partyLength.push(party);
        partyLength.shift();
        //Hostel
        $(twoToFourHostel).addClass('hide');
        //Motel
        $(twoToFour).addClass('hide');
        $(fourToSixMotel).addClass('hide');
        $(twoToSix).addClass('hide');
        //House
        $(threeToSixHouse).addClass('hide');
        $(twoToFive).addClass('hide');
    }
    if (party.length == 4){
        partyLength.push(party);
        partyLength.shift();
        //Hostel
        $(twoToFourHostel).removeClass('hide');
        //Motel
        $(twoToFour).removeClass('hide');
        $(fourToSixMotel).removeClass('hide');
        $(twoToSix).removeClass('hide');
        //House
        $(threeToSixHouse).removeClass('hide');
        $(twoToFive).removeClass('hide');

    }
    console.log(partyLength);

}

////////////////////////////////////// FULL PAGE SCROLL SELECTORS //////////////////////////////////////
$('.oneArrow').click(function(){
  $.fn.fullpage.moveTo(2);
});
$('.twoArrow').click(function(){
  $.fn.fullpage.moveTo(3);
});
$('.threeArrow').click(function(){
  $.fn.fullpage.moveTo(4);
});
$('.fourArrow').click(function(){
  $.fn.fullpage.moveTo(5);
});
$('.fiveArrow').click(function(){
  $.fn.fullpage.moveTo(4);
});
$('.AucklandLocation').click(function(){
  $.fn.fullpage.moveTo(4);
});

////////////////////////////////////// WORKING FOR ANNOYING PLUGIN //////////////////////////////////////

$('.sleeping input').addClass('SleepingOptions');
var sleepOption = $('.SleepingOptions');
$('.sleeping').on('click', sleepOption, sleepingOptionClick);

$('.price input').addClass('PricingOptions');
var priceOption = $('.PricingOptions');
$('.price').on('click', priceOption, pricingOptionClick);

$('.meals input').addClass('MealOptions');
var mealOption = $('.MealOptions');
$('.meals').on('click', mealOption, mealOptionClick);
});