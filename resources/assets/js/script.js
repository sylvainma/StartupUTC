$(document).ready(function(){

  // Bugfix MaterialKitJS & ArriveJS
  // https://github.com/FezVrasta/bootstrap-material-design/issues/391

  $.material.togglebutton = function(selector) {
    // Add fake-checkbox to material checkboxes
    $((selector) ? selector : this.options.togglebuttonElements)
      .filter(":notmdproc")
      .filter(function(){ //added this filter to skip checkboxes that were already initialized
        return $(this).parent().find(".toggle").length === 0;
      })
      .data("mdproc", true)
      .after("<span class=toggle></span>");
  };

  $.material.checkbox = function(selector) {
      // Add fake-checkbox to material checkboxes
      $((selector) ? selector : this.options.checkboxElements)
              .filter(":notmdproc")
              .filter(function(){ //added this filter to skip checkboxes that were already initialized
                  return $(this).parent().find(".check").length === 0;
              })
              .data("mdproc", true)
              .after("<span class=check></span>");
  };


  // Init Material scripts for buttons ripples, inputs animations etc, more info on the next link https://github.com/FezVrasta/bootstrap-material-design#materialjs
  $.material.init();

});
