$(function(){
  $('.scrollspy').scrollSpy();

  $('.collapsible').collapsible();

  $('.toc-wrapper').pushpin({
    top: $('header').height(),
  });

  $('input.autocomplete').autocomplete({
    data: {
      "Apple": null,
      "Aqlskjdlkqjsd": null,
      "Alexandre": null,
      "Alqsd": null,
      "Apour": null,
      "Alex": null,
      "Microsoft": null,
      "Google": null
    },
    limit: 1, // The max amount of results that can be shown at once. Default: Infinity.
  });
});
