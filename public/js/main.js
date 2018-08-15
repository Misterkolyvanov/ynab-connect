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
        return false;
    });





});