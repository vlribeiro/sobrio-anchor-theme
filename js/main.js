( function( window ) {

'use strict';

//private content

var menuHidden = false;

function headerConfig() {
  var header = $('header');
  var content = $('.content');
  var searchButton = $('header button');
  var closeSearchButton = $('.close-button');

  //adjust content padding
  content.css('padding-top', header.height());

  $(document).on('scroll', documentScroll);
  searchButton.on('click', clickSearch);
  closeSearchButton.on('click', clickCloseSearch);
}

function documentScroll(e) {
  if ($('body').scrollTop() <= 100) {
    menuHidden = false;

    $('header nav').removeClass('nav-hidden');
  }
  else if (!menuHidden) {
    menuHidden = true;

    $('header nav').addClass('nav-hidden');
  }
}

function clickSearch(e) {
  $('.search-form').addClass('active');
}

function clickCloseSearch(e) {
  $('.search-form').removeClass('active');
}

function responsiveYoutubeConfig() {
  var contentParagraphs = document.querySelectorAll('.post-content p');

  for (var i = 0; i < contentParagraphs.length; i++) {
    var currParagraph = contentParagraphs[i];

    if (currParagraph.querySelector('iframe')) {
      classie.add(currParagraph, 'video-wrapper');
    }
  }
}

//public content

var init;

init = function() {
  headerConfig();
  responsiveYoutubeConfig();
}

var ba = {
  init: init,
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( ba );
} else if ( typeof exports === 'object' ) {
  // CommonJS
  module.exports = ba;
} else {
  // browser global
  window.ba = ba;
}

})( window );