$(document).ready(function(){
    var changeflag = false;

    $.get("settings.php",{settings:1},function(){}, "json").done(function(response){
        console.log(response);
        $("#profileUsername").val(response.username);
        $("#profileAge").val(response.age);
    });

$("#cancel").click(function(){
    window.location.href="index.php";

});
$("#save").click(function(){
    var username = $("#profileUsername").val();
    var age = $("#profileAge").val();
    var password = $("#newPass").val();
    var flag = false;
    if(username == ""){
        $("#profileUsernameErr").html("Enter Your Name");
        flag = true;
    }else{
        $("#profileUsernameErr").html("");
        flag = false;
    }
    if(age == ""){
        $("#profileAgeErr").html("Enter Your Age");
        flag = true;
    }else{
        $("#profileAgeErr").html("");
        flag = false;
    }
    if(changeflag == true){
        if(password == ""){
            $("#profilePassErr").html("Enter New password");
            flag = true;
        }else{
            $("#profilePassErr").html("");
            flag = false;
        }
    } 
    if(flag == false){
        $.post("settings.php",{set :1, username: username, age: age, password: password},function(){}).
        done(function(){
            window.location.href="index.php";
        });
        
    }
    
});
$("#change").click(function(){
    $("#newPass").show();
    changeflag = true;
});
$("#delete").click(function(){
    var username = $("#profileUsername").val();
    $.post("settings.php",{del:1, username:username}).done(function(){
        window.location.href="login.php";
    });
});



});