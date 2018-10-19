$(function() {
    var logInUser          = $("#name");
    var logInPassword      = $("#pass");
    var logInButton        = $("#inbutton");
    var registerUser       = $("#regname");
    var registerPassword   = $("#regpass");
    var reRegisterPassword = $("#reregpass");
    var registerButton     = $("#nextbutton");

    // Evento en logInButton cada vez que el ratón pasa encima.
    logInButton.mouseover(function() {
        // Si el valor de ambos campos tienen valores, habilita el botón.
        // De otro modo, deshabilita el botón.
        if(logInUser.val() && logInPassword.val()) {
            logInButton.prop('disabled', false);
        } else {
            logInButton.prop('disabled', true);
        }
    });
    
    // Evento en nextButton cada vez que el ratón pasa encima.
    registerButton.mouseover(function() {
        // Si hay un valor en el campo del usuario y el valor de ambas 
        // contraseñas es igual, habilita el botón.
        // De otro modo, deshabilita el botón.
        if((registerPassword.val() == reRegisterPassword.val()) && registerPassword.val().length > 8 && reRegisterPassword.val().length > 8) {
            registerButton.prop('disabled', false);
        } else {
            registerButton.prop('disabled', true);
        }
    });

    reRegisterPassword.blur(function() {
        if(!(registerPassword.val() == reRegisterPassword.val())) {
            alert("Las contraseñas no coinciden.");
        }
    });

    $(".input input").focus(function() {
        $(this).parent(".input").each(function() {
            $("label", this).css({
                "line-height": "18px",
                "font-size": "18px",
                "font-weight": "100",
                "top": "0px"
            })
            $(".spin", this).css({
                "width": "100%"
            })
        });
    }).blur(function() {
        $(".spin").css({
            "width": "0px"
        })
        if($(this).val() == "") {
            $(this).parent(".input").each(function() {
                $("label", this).css({
                "line-height": "60px",
                "font-size": "24px",
                "font-weight": "300",
                "top": "10px"
                })
            });
        }
    });

    $(".button").click(function(e) {
        var pX = e.pageX,
            pY = e.pageY,
            oX = parseInt($(this).offset().left),
            oY = parseInt($(this).offset().top);
        $(this).append('<span class="click-efect x-' + oX + ' y-' + oY + '" style="margin-left:' + (pX - oX) + 'px;margin-top:' + (pY - oY) + 'px;"></span>')
        $('.x-' + oX + '.y-' + oY + '').animate({
            "width": "500px",
            "height": "500px",
            "top": "-250px",
            "left": "-250px",
        }, 600);
        $("button", this).addClass('active');
    })

    $(".alt-2").click(function() {
        if(!$(this).hasClass('material-button')) {
            $(".shape").css({
                "width": "100%",
                "height": "100%",
                "transform": "rotate(0deg)"
            })
            setTimeout(function() {
                $(".overbox").css({
                "overflow": "initial"
                })
            }, 600)
            $(this).animate({
                "width": "140px",
                "height": "140px"
            }, 500, function() {
                $(".box").removeClass("back");
                $(this).removeClass('active')
            });
            $(".overbox .title").fadeOut(300);
            $(".overbox .input").fadeOut(300);
            $(".overbox .button").fadeOut(300);
            $(".alt-2").addClass('material-buton');
        }
    })

    $(".material-button").click(function() {
        if($(this).hasClass('material-button')) {
            setTimeout(function() {
                $(".overbox").css({
                "overflow": "hidden"
                })
                $(".box").addClass("back");
            }, 200)
            $(this).addClass('active').animate({
                "width": "700px",
                "height": "700px"
            });
            setTimeout(function() {
                $(".shape").css({
                "width": "50%",
                "height": "50%",
                "transform": "rotate(45deg)"
                })
                $(".overbox .title").fadeIn(300);
                $(".overbox .input").fadeIn(300);
                $(".overbox .button").fadeIn(300);
            }, 700)
            $(this).removeClass('material-button');
        }
        if($(".alt-2").hasClass('material-buton')) {
           $(".alt-2").removeClass('material-buton');
           $(".alt-2").addClass('material-button');
        }
    });
});