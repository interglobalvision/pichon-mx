/* jshint browser: true, devel: true, indent: 2, curly: true, eqeqeq: true, futurehostile: true, latedef: true, undef: true, unused: true */
/* global $, document, Swiper */

var Site = {
  init: function() {
    var _this = this;

    _this.bind();

    _this.Layout.init();
  },

  bind: function() {
    var _this = this;

    $(document).ready(function () {

    });

    $(window).resize(function() {
      _this.Layout.resize();
    });

    $(window).imagesLoaded( function() {
      _this.Layout.equalizeRowHeights();
      _this.Slideshow.init();

      $('.loading-overlay').fadeOut();
    });

  },

};

Site.Layout = {
  $header: $('#header'),
  $mainContent: $('#main-content'),
  $footer: $('#footer'),

  init: function() {
    var _this = this;

    _this.fixFooter();
  },

  resize: function() {
    var _this = this;

    _this.equalizeRowHeights();
    _this.fixFooter();
  },

  equalizeRowHeights: function() {
    var $targets = $('.row');

    $targets.each(function(index, item) {
      var $children = $(item).children();
      var maxHeight = 0;

      $children.css('height', 'auto');

      $children.each(function() {
        var height = $(this).innerHeight();

        if (height > maxHeight){
          maxHeight = height;
        }
      });

      $children.css('height', maxHeight);

    });

  },

  fixFooter: function() {
    var _this = this;
    // the +3 is for the boder below the header
    var offset = _this.$header.outerHeight(true) + _this.$footer.outerHeight(true) + 3;

    _this.$mainContent.css({
      'min-height': 'calc(100vh - ' + offset + 'px)',
    });
  },
};

Site.Slideshow = {
  slideshow: undefined,
  init: function() {
    var _this = this;

    _this.slideshow = new Swiper('.swiper-container', {
      loop: true,
      autoplay: 1700,
      effect: 'fade',
      onClick: function(swiper) {
        swiper.slideNext();
      },
    });

  },
};

Site.init();