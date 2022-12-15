$(document).ready(function() {

    //Login

    $(".login").submit(function() {

        var nom = $(".nom").val();
        var mdp = $(".mdp").val();

        $.post("login.php",{nom:nom, mdp:mdp},function(donnees) {
            $('.message').html(donnees).slideDown(function(){
                var temps = 3;
                var interval = setInterval(function(){
                    temps = temps-1;
                    if(temps == 0) {
                        setInterval(interval);
                        $('.message').html(donnees).slideUp();
                    }
                },1000);
            });

            if(donnees.indexOf("success") >=0) {
                var temps = 2;
                var interval = setInterval(function(){
                    temps = temps-1;
                    if(temps == 0) {
                        setInterval(interval);
                        window.location = "welcome.php";
                    }
                },1000);
            }
            $('.nom').val('');
            $('.mdp').val('');
        });
        return false;

        
    });
});

    //Inscription

$(document).ready(function(){
    $(".inscription").submit(function() {

        var name = $(".nom__inscription").val();
        var password = $(".mdp__inscription").val();
        var confirme = $(".confirme__inscription").val();

        $.post("inscription.php", {nom:name, mdp:password, confirme:confirme},function(donnees){
            $('.message').html(donnees).slideDown(function(){
                var temps = 3;
                var interval = setInterval(function(){
                    temps = temps-1;
                    if(temps == 0) {
                        setInterval(interval);
                        $('.message').html(donnees).slideUp();
                    }
                },1000);
            });
            if(donnees.indexOf("success") >=0) {
                var temps = 2;
                var interval = setInterval(function(){
                    temps = temps-1;
                    if(temps == 0) {
                        setInterval(interval);
                        window.location = "welcome.php";
                    }
                },1000);
            }
            $('.nom__inscription').val('');
            $('.mdp__inscription').val('');
            $('.confirme__inscription').val('');
        });
        return false;
    });
});
    // Reset password
$(document).ready(function(){
    $(".reset").submit(function() {

        var nom = $(".nom__reset").val();
        var mdp = $(".mdp__reset").val();
        var confirme = $(".confirme__reset").val();

        $.post("reset.php", {nom:nom, mdp:mdp, confirme:confirme},function(donnees){
            $('.message').html(donnees).slideDown(function(){
                var temps = 3;
                var interval = setInterval(function(){
                    temps = temps-1;
                    if(temps == 0) {
                        setInterval(interval);
                        $('.message').html(donnees).slideUp();
                    }
                },1000);
            });

            if(donnees.indexOf("success") >=0) {
                var temps = 2;
                var interval = setInterval(function(){
                    temps = temps-1;
                    if(temps == 0) {
                        setInterval(interval);
                        window.location = "welcome.php";
                    }
                },1000);
            }
            $('.nom__reset').val('');
            $('.mdp__reset').val('');
            $('.confirme__reset').val('');
        });
    return false;
    });

});