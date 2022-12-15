$("document").ready(function(){
    var loader = $(".loader");
    var $window = $(window);

    
    $window.on("load", function(){
        loader.addClass("out");
        $(".container").fadeIn();
    });
});

