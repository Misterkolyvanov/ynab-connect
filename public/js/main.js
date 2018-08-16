function load_system_stats(){
    $("#system_status_details").html('<progress max="100"></progress>');
    $.get("/get-async/system-content", function (result) {
        $("#system_status_details").html(result);
    });
}

function load_settings_content(){
    $.get("/get-async/settings-content", function(result){
        $("#setting_content").html(result);
    });
}

function save_configuration(reload){
    var data = $("#save_user_configuration").serializeArray();
    $.post("/user/configuration", data, function(result){
        if(result.response == "SUCCESS"){
            load_settings_content();
            if(reload){
                window.location.reload();
            }
        }else{
            alert("There was an issue in saving this config. Either try again or contact us.");
        }
    });
}

$(function(){

   load_system_stats();

    $(document).on('change', ".my-budget-selector", function(){
        save_configuration(false);
    });

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href") // activated tab
        if(target == "#settings"){
            load_settings_content();
        }
    });

    $(document).on("submit", "#save_user_configuration", function(e){
        e.preventDefault();
          save_configuration(true);
          $.get("/run-program");
        return false;
    });


    $(document).on("click", "#ynab-pa-token-test-btn", function(){
        var t  = $("#ynab-pa-token").val();
        var $r = $("#ynab-pa-test-result");

        if(!t){
            $r.html("Please input a token, you can get this here: <a href='https://ynab.com/api' target='_blank'>https://ynab.com/api</a>");
        }else{
            $.get("/api-test/ynab/"+t, function (response) {
                if(response.result == "SUCCESS"){
                    $r.html("Connection Successful!");
                    $r.addClass("alert-success");
                    $r.removeClass("alert-warning");
                    $r.removeClass("alert-danger");
                    save_configuration(false);
                }else{
                    $r.addClass("alert-danger");
                    $r.removeClass("alert-warning");
                    $r.removeClass("alert-success");
                    $r.html("Connection Failed!");
                }
            });
        }
    });

    $(document).on("click", "#habitica-access-test-btn", function(){
        var u  = $("#habitica_user_id").val();
        var k  = $("#habitica_user_key").val();
        var $r = $("#habitica-access-test-result");

        if(!u || !k){
            $r.html("Please input a user id and user key, you can get this here: <a href='https://habitica.com/api' target='_blank'>https://habitica.com/api</a>");
        }else{
            $.get("/api-test/habitica/"+u+','+k, function (response) {
                if(response.result == "SUCCESS"){
                    $r.html("Connection Successful!");
                    $r.addClass("alert-success");
                    $r.removeClass("alert-warning");
                    $r.removeClass("alert-danger");
                    save_configuration(false);
                }else{
                    $r.addClass("alert-danger");
                    $r.removeClass("alert-warning");
                    $r.removeClass("alert-success");
                    $r.html("Connection Failed!");
                }
            });
        }
    });

    $(document).on("click", "#run-program", function(){
        var $btn = $(this);
        $btn.replaceWith("<span>Now Running ...</span>");
        $.get("/run-program", function(done){
             $btn.replaceWith('<button type="button" class="btn btn-primary" id="run-program">Manually Run Program</button>');
        });
    });


});