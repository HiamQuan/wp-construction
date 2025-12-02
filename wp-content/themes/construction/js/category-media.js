jQuery(function ($) {
  'use strict';

  // Luôn reset form "Add Category" mỗi lần load trang
  $('.form-field.term-group').each(function () {
    const $wrap = $(this);
    const $input = $wrap.find('#construction_category_image');
    const $preview = $wrap.find('.construction-category-image-preview');

    if ($input.length) {
      $input.val('').trigger('change');
    }

    if ($preview.length) {
      const $img = $preview.find('img');
      if ($img.length) {
        $img.attr('src', '');
      }
      $preview.hide();
    }
  });

  function openMediaFrame($input, $wrap) {
    const frame = wp.media({
      title: 'Select category image',
      button: {
        text: 'Use this image',
      },
      multiple: false,
    });

    frame.on('select', function () {
      const attachment = frame.state().get('selection').first().toJSON();
      if (!attachment || !attachment.url) {
        return;
      }

      const url = attachment.url;
      $input.val(url).trigger('change');

      const $preview = $wrap.find('.construction-category-image-preview');
      if ($preview.length) {
        let $img = $preview.find('img');
        if (!$img.length) {
          $img = $('<img />').appendTo($preview);
        }
        $img.attr('src', url);
        $preview.show();
      }
    });

    frame.open();
  }

  $(document).on('click', '.construction-category-image-upload', function (e) {
    e.preventDefault();

    const $wrap = $(this).closest('.form-field, .term-group-wrap');
    const $input = $wrap.find('#construction_category_image');

    if ($input.length) {
      openMediaFrame($input, $wrap);
    }
  });

  $(document).on('click', '.construction-category-image-remove', function (e) {
    e.preventDefault();

    const $wrap = $(this).closest('.form-field, .term-group-wrap');
    const $input = $wrap.find('#construction_category_image');
    const $preview = $wrap.find('.construction-category-image-preview');

    if ($input.length) {
      $input.val('').trigger('change');
    }

    if ($preview.length) {
      const $img = $preview.find('img');
      if ($img.length) {
        $img.attr('src', '');
      }
      $preview.hide();
    }
  });
});

