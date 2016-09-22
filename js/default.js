$( document ).ready(function() {

  // MenuToggle function to show and hide Menu
  (function() {
    var button = $('#nav-button'),
    menuContainer = $('#menu-container');

    $(button).on('click', function(el){
      el.preventDefault();
      $(menuContainer).toggleClass('open');
      if ( menuContainer.hasClass('open') ) {
        $('body').css({'overflow': 'hidden'});
      } else {
        $('body').css({'overflow': 'initial'});
      }
    });
  })();

  // Video Hero auto margin top calc();
  (function() {

    var header = $('header'),
    headerHeight = header.innerHeight(),
    videoContainer = $('.video-hero');

    $(videoContainer).css({'margin-top': headerHeight });
  })();

});
