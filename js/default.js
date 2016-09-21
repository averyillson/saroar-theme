$( document ).ready(function() {

  // MenuToggle function to show and hide Menu
  var menuToggle = function() {
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
  };

  // Video Hero auto margin top calc();
  var VideoHeroTopMargin = function() {

    var header = $('header'),
    headerHeight = header.innerHeight(),
    videoContainer = $('.video-hero'),
    heroGeneral = $('.hero'),
    heroArchive = $('.archive-hero');

    $(videoContainer).css({'margin-top': headerHeight });
    $(heroGeneral).css({'margin-top': headerHeight });
    $(heroArchive).css({'margin-top': headerHeight });

  };

  // Hero auto margin top calc();
  var HeroTopMargin = function() {

    var header = $('header'),
    headerHeight = header.innerHeight(),
    heroGeneral = $('.hero'),
    heroArchive = $('.archive-hero');

    $(heroGeneral).css({'margin-top': headerHeight });
    $(heroArchive).css({'margin-top': headerHeight });
  };

  menuToggle();
  VideoHeroTopMargin();
  HeroTopMargin();

});
