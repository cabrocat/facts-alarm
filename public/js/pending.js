$(document).ready(function () {
    $('.approve-pending').on('click', function () {
        $(this).closest("tr").fadeOut();
        var id = $(this).data("id");

        $.ajax({
            url: "pending/approve/" + id + "",
        }).fail(function () {
            console.log('Failed');
        });
    });

    $('.delete-pending').on('click', function () {
        $(this).closest("tr").fadeOut();
        var id = $(this).data("id");

        $.ajax({
            url: "pending/delete/" + id + "",
        }).fail(function () {
            console.log('Failed');
        });
    });
});

(function ($) {
    $.fn.flash_message = function (options) {

        options = $.extend({
            text: 'Done',
            time: 3000,
            how: 'before',
            class_name: ''
        }, options);

        return $(this).each(function () {
            if ($(this).parent().find('.flash_message').get(0))
                return;

            var message = $('<span />', {
                'class': 'flash_message ' + options.class_name,
                text: options.text
            }).hide().fadeIn('fast');

            $(this)[options.how](message);

            message.delay(options.time).fadeOut('normal', function () {
                $(this).remove();
            });

        });
    };
})(jQuery);