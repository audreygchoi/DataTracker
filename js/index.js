$(document).ready(function() {
  $("#send").click(function() {
    $.ajax({
      url: 'contact.php',
      data: {name: $( "#name" ).val(), email: $("#email").val(), message: $("#message").val()},
      success: function(data){
        $('#results').html(data);
      }
    });
  });
});

$(document).ready(function () {
  $('a[href^="#"]').on('click',function (e) {
    e.preventDefault();
    var target = this.hash,
    $target = $(target);
    $('html, body').stop().animate({
      'scrollTop': $target.offset().top
    }, 500, 'swing', function () {
      window.location.hash = target;
    });
  });

});
$(window).scroll(function() {
  if ($(".navbar").offset().top > 20) {
    $(".custom-transparent").addClass("custom");
    $(this).after('<div id="details">Loading</div>');
  } else {
    $(".custom-transparent").removeClass("custom");
  }
});

// var circleChart = function (){
//     $('.circle-chart').find('.item-progress').each(function(){
//         var item = $(this),
//         maxHeight = 108,
//         newHeight = maxHeight * ($(this).data('percent') / 100);
//
//         // Only animate elements when using non-mobile devices
//         if (jQuery.browser.mobile === false){
//             item.one('inview', function(isInView) {
//                 if (isInView){
//                     // Animate item
//                     item.animate({
//                         height: newHeight
//                     },1500);
//                 }
//             });
//         }
//         else{
//             item.css('height', newHeight);
//         }
//     });
// };
//
// // Call circleChart() when window is loaded.
// $(window).smartload(function(){
//     circleChart();
// });
