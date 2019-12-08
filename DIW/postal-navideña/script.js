

$.fn.christmas = function () {
    $(this).each(function () {
        $(this).html($(this).text().split("").map(function (v, i) {
            return '<span class="christmas-' + (i % 2 == 0 ? 'gold' : 'red') + '">' + v + '</span>';
        }).join(""));
    });
};
$(function () { // don't forget $(document).ready!
    $('h1.christmas').christmas();
});
