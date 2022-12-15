$("document").ready(function () {
    var loaded = $(".loaded");
    var $window = $(window);

    $window.on("load", function () {
        loaded.addClass("out");
        $(".container").fadeIn();
    });
});