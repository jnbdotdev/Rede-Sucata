document.addEventListener('scroll', roll);
var lastPosition = 0;

function roll() {
var fB = document.getElementById("floatButton");
    var position = window.scrollY;
    if(position > 900){
        fB.style = "bottom: 20px";
    }else{
        fB.style = "bottom: -80px"
    }
}