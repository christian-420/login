
$(document).ready(function() {
    $(".inscription").hide();
    $(".reset").hide();
    $(".loader").hide();
    $(".login__li").addClass("active");
    
    $(".inscription__li").click(function(){
        $(this).addClass("active").fadeIn(1000);
        $(".login__li").removeClass("active");
        $(".reset__li").removeClass("active");
        $(".inscription").fadeIn(1000);
        $(".login").hide();
        $(".reset").hide();
    });
    
    $(".login__li").click(function(){
        $(this).addClass("active");
        $(".inscription__li").removeClass("active");
        $(".reset__li").removeClass("active");
        $(".login").fadeIn(1000);
        $(".inscription").hide();
        $(".reset").hide();
    
    });
    
    $(".form__link").click(function(){
        $(".login__li").removeClass("active");
        $(".inscription__li").removeClass("active");
        $(".reset").fadeIn(1000);
        $(".inscription").hide();
        $(".login").hide();
        
    });
    
});