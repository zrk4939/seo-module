/**
 * Created by developer on 12.04.2017.
 */

$(document).ready(function () {
    $('.manual-meta').hide();

    $('#seo-manual').on('change', function () {
        toggleForm($(this));
    });

    var toggleForm = function ($el) {
        if ($el.is(":checked")) {
            $('.manual-meta').show();
            return;
        }
        $('.manual-meta').hide();
    }

    toggleForm($('#seo-manual'));
});