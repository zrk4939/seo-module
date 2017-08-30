/**
 * Created by developer on 12.04.2017.
 */

$(document).ready(function () {
    $('.manual-meta').hide();

    $('#seo-manual').on('change', function () {
        if ($(this).is(":checked")) {
            $('.manual-meta').show();
            return;
        }
        $('.manual-meta').hide();
    });
});