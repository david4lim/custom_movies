/**
 * @file
 * Custom Movies Challenge behaviors.
 */
(function ($, Drupal, once) {

  'use strict';

  Drupal.behaviors.moviesAdminForm = {
    attach(context, settings) {
      once('moviesAdminFormBehavior', '#edit-release-date-0-value-date', context).forEach(
        function (element) {
          const $element = $(element);
          $element.on('input', function () {
            if (new Date($element.val()) > new Date()) {
              $element.addClass('error');
              $('#edit-release-date-wrapper .form-item__label', context).addClass('has-error');
            } else {
              $element.removeClass('error');
              $('#edit-release-date-wrapper .form-item__label', context).removeClass('has-error');
            }
          });
        },
      );
    },
  };

}(jQuery, Drupal, once));
