import $ from 'jquery'
import 'slick-carousel'

// var $status = $('.pagingInfo');
// var $slickElement = $('.slider');
var $el = $('.slider');
var $slide = $('.slide');
$(document).ready(function() {
    // slick carousel
    $('.slider').slick({
      arrows: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      verticalSwiping: true,
      fade: true,
      infinite: true,
    });
  });



//   $slickElement.on('init reInit afterChange', function (event, slick, currentSlide, nextSlide) {
//     //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
//     var i = (currentSlide ? currentSlide : 1) + 0;
//     $status.text(i + '/' + slick.slideCount);
// });
// $slickElement.slick({
//     slide: '.slide',
// });