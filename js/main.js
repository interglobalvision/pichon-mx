/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, jQuery, document, Modernizr */

var Layout = {
  init: function() {
    var _this = this;

    _this.equalizeRowHeights();

  },

  bind: function() {
    var _this = this;

    $(window).resize(function() {
    _this.equalizeRowHeights();
    });

  },

  equalizeRowHeights: function() {
    var $targets = $('.row');

    $targets.each(function(index, item) {
      var $children = $(item).children();
      var maxHeight = 0;

      $children.css('height', 'auto');

      $children.each(function() {
        var height = $(this).height();

        if (height > maxHeight){
          maxHeight = height;
        }
      });

      $children.css('height', maxHeight);

    });
  },
};

jQuery(document).ready(function () {
  'use strict';

});

$(window).on('load', function() {
  Layout.init();
});
