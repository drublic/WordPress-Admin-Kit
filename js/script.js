/**
 *  JS-Functions for WordPress admin-panel
 *
 *  Created 2011 by /gebruederheitz - Freiburg/Germany
 *  kontakt@gebruederheitz.de - @gebruederheitz
 *
 *  Developed by
 *  Hans Christian Reinl
 *  h@ghdev.de - @drublic 
 */

! function ($, window, document, undefined) {

  $(document).ready( function () {

    // Click on Tab: show right content
    $('.big-tabs a').click( function( e ) {
      e.preventDefault();

      var $el = $(this),
          tab = $el.attr('href'),
          oldtab = $('.big-tabs .current').find('a').attr('href');

      window.location.hash = tab;
      
      $( oldtab ).hide();
      $('.tabs .current').removeClass('current');

      $el.parent().addClass('current');
      $( tab ).show();
    });


    // Check if hash is set and trigger click
    if ( hash = window.location.hash ) {
      $('.big-tabs').find('a[href="' + hash + '"]').trigger('click');
    }

  });

} (jQuery, window, document);