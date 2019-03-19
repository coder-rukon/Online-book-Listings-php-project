$(document).ready(function() {
     addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    /*dropdown nav */
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop(true, true).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop(true, true).slideUp("fast");
            $(this).toggleClass('open');
        }
    );
    /* password-script */
    window.onload = function() {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
    /*password-script*/ 
    /* stats */
    $('.counter').countUp();

    $(".scroll").click(function(event) {
        event.preventDefault();
        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 900);
    });

    /*------------ preloader ------------*/
    $(window).on('load', function () {
        $(".preloader").fadeOut("slow", function () {
            $(this).remove();
        });
    });
    /*------------ /preloader ------------*/
    $().UItoTop({
        easingType: 'easeOutQuart'
    });
});
