/*SLIDER index.php*/
var myIndex = 0;
slajd_change();


function slajd_hide() {
    $(".slajd-img").fadeOut(500);
}

function slajd_change() {
    var slideChange = 5000;
    var i;
    var x = document.getElementsByClassName("slajd-img");    
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none"; 
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";
    setTimeout(slajd_change, slideChange);
    // Change image 
}


function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("slajd-img");
  var dots = document.getElementsByClassName("btn");
  if (n > x.length) {myIndex = 1}    
  if (n < 1) {myIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[myIndex-1].style.display = "block"; 
}

/* */