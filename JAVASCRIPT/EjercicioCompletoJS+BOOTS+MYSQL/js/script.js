$(document).ready(() => {
    CambiaVista("login");
})


CambiaVista = (objetivo) => {
    $(".vista").hide();
    $(".vista").each(
        function () {
            if ($(this).attr("id") == objetivo) {
                $(this).show();
            }
        }

    );

}