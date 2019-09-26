// Switch field for Visual Composer
(function ( $ ) {

  /* Class used in edit form and editor models to save/render shortcode */
  vc.atts.switcher = {
    parse: function(param) {
        var arr, newValue;
        return arr = [], newValue = "", $("input[name=" + param.param_name + "]", this.content()).each(function() {
            var self;
            self = $(this), this.checked && arr.push(self.attr("value"))
        }), 0 < arr.length && (newValue = arr.join(",")), newValue
    },
    defaults: function(param) {
        return ""
    }
  };
})( window.jQuery );