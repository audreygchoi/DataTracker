/* *************
JQuery Scripts
************* */

// When you click the link it will go to the place in the page smoothly

var navHeight = 61;
$(document).ready(function () {
  $('a[href^="#"]').on('click',function (e) {
    e.preventDefault();
    var target = this.hash,
    $target = $(target);
    $('html, body').stop().animate({
      'scrollTop': $target.offset().top - navHeight
    }, 500, 'swing', function () {
      window.location.hash = target;
    });
  });
});

// Make the Navigation Bar transparent until you scroll past the top
$(window).scroll(function() {
  if ($(".navbar").offset().top > 20) {
    $(".custom-transparent").addClass("custom");
  } else {
    $(".custom-transparent").removeClass("custom");
  }
});
