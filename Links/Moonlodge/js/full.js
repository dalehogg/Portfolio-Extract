! function() {
    var n = $(".parallax");
    window.addEventListener("scroll", function() {
        var e = $(this).scrollTop();
        n.css({
            "background-position": "center calc(1% + " + .125 * e + "px)"
        })
    });
    var r = document.querySelector(".header");
    window.addEventListener("scroll", function() {
        var e = $(this).scrollTop();
        100 <= e ? (console.log(e), r.classList.add("fullOpac")) : e < 100 && r.classList.remove("fullOpac")
    })
}(window, document);
var burgerIcon = document.querySelector(".burgerIcon"),
    overlayFullMenu = document.querySelector(".overlayFullMenu"),
    exitBurgerMenu = document.querySelector(".exitBurgerMenu");
$(".burgerIcon").click(function() {
    $(overlayFullMenu).removeClass("hideMenu"), $(burgerIcon).addClass("hideMenu"), $(".hideMenu").fadeIn()
}), $(".exitBurgerMenu").click(function() {
    $(burgerIcon).removeClass("hideMenu"), $(".hideMenu").fadeIn(), $(overlayFullMenu).addClass("hideMenu")
});