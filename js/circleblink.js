(function ($) {
  "use strict"; // Start of use strict
  function circleBlink () {
    var circles = $('.circles');
    // circles.css('opacity', '0');

    $(circles[5]).fadeTo(400, 1, function () {
      $(circles[4]).fadeTo(400, 1, function () {
        $(circles[3]).fadeTo(400, 1, function () {
         $(circles[2]).fadeTo(400, 1, function () {
           $(circles[1]).fadeTo(400, 1, function () {
              $(circles[0]).fadeTo(400, 1, function() {
                circles.css('opacity', '0');
              });
             });
           });
          });
        });
      });  
  	};
  
  setInterval(circleBlink, 3000);
})(jQuery);
