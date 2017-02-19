$(function(){
  $('.scrollspy').scrollSpy();

  $('.collapsible').collapsible();

  $('.toc-wrapper').pushpin({
    top: $('header').height(),
  });

  $('input.autocomplete').autocomplete({
    limit: 1, // The max amount of results that can be shown at once. Default: Infinity.
  });
});
