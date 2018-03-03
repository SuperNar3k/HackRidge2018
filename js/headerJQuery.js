//<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

// ^^^ use this line to call this script
// This code is to be implemented in all pages as a script that makes header.php works

$(document).ready(function(){
    //Sticky Nav (initial - prevents jump)
    $("#navBarWrapper").css("height", $("#navBar").height());
    $(window).scroll(function(){
        if ($(window).scrollTop() > $("#banner").height()) {
            $('#navBar').addClass('navBar-fixed');
        }
        else{
            $('#navBar').removeClass('navBar-fixed');
        }
    });

    //Fade-out for #LPLogo img (initial and on resize)
    var dist = $("#LPNHS").position().left - $("#LPLogo").position().left;
    if(dist>0){
        $("#LPLogo").css("opacity", (dist-180)/70);    
    }
    $(window).resize(function(){
        var dist = $("#LPNHS").position().left - $("#LPLogo").position().left;
        if(dist>0){
            $("#LPLogo").css("opacity", (dist-180)/70);    
        }
    });

    //Log in button
    $("#headerLoginButton").click(function () {
        window.location = "login.php";
    });
    //Log out button
    $("#headerLogoutButton").click(function () {
        window.location = "logout.php";
    });
});