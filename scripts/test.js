var slideIndex = [1, 1];
var slideId = ["mySlides1"]
$(document).ready(function () {
    for (i = 0; i < slideId.length; i++) {
        var containerWidth = $("#slider").width();
        var containerHeight = $("#slider").height();
        console.log($("#slider").position());
        for (var j = 0; j < document.getElementsByClassName("slideshow-container")[0].getElementsByTagName("div").length; j++) {
            dataOnLoad(document.getElementsByClassName(slideId[i])[j].querySelectorAll("img")[0]);
        }
        function dataOnLoad(x) {
            const img = new Image();
            img.src = x.src;
            img.onload = function () {

                var porcentaje;
                porcentaje = (containerWidth * 100) / (this.width);
                var alto = this.height * porcentaje / 100;
                if (alto < containerHeight) {

/*                     console.log("alto<container");
                    console.log(x); */
                    x.style.paddingTop = ((containerHeight - alto) / 2).toString() + "px";
                } else {
/*                     console.log("alto>container");
                    console.log(x); */
                    x.style.maxHeight = containerHeight.toString() + "px";
                }
            }
        }
    }
}
);



function plusSlides(n, no) {
    showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
    var i;
    var x = document.getElementsByClassName(slideId[no]);
    var containerWidth = $("#slider").width();
    var containerHeight = $("#slider").height();

    if (n > x.length) { slideIndex[no] = 1 }
    if (n < 1) { slideIndex[no] = x.length }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex[no] - 1].style.display = "block";

    const img = new Image();
    img.src = (x[slideIndex[no] - 1].querySelectorAll("img")[0].src);

    /* console.log(document.getElementsByClassName("slideshow-container")[0]); */
    img.onload = function () {
        var porcentaje;

        porcentaje = (containerWidth * 100) / (this.width);
        var alto = this.height * porcentaje / 100;

        if (alto < containerHeight) {
            x[slideIndex[no] - 1].querySelectorAll("img")[0].style.paddingTop = ((containerHeight - alto) / 2).toString() + "px";
        } else {
            x[slideIndex[no] - 1].querySelectorAll("img")[0].style.maxHeight = containerHeight.toString() + "px";
        }


    }




}