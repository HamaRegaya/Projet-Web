$(document).ready(function(){
    $("#register").click(function(){
        var username = $("#username").val();
        var age = $("#age").val();
        var password = $("#pass").val();
        
        $("#usernameError").html("");
        $("#ageError").html("");
        $("#passError").html("");

        $.ajax(
            {
                url: 'registration.php',
                method: 'POST',
                data: {
                    login :1,
                    unesrnamePHP: username,
                    agePHP: age,
                    passwordPHP: password
                },
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    if(response.status == 'success'){
                        window.location.href="login.php";
                    }else{
                        for (var key in response[0]) {
                            if (response[0].hasOwnProperty(key)) {
                                if(key == 'emptyUser' || key == 'userValid' || key =='noneUniqeUser'){
                                    $("#usernameError").html(response[0][key]);
                                }
                                if(key == 'emptyAge' || key == 'ageValid'){
                                    $("#ageError").html(response[0][key]);
    
                                }
                                if(key == 'emptyPass' || key == 'passValid'){
                                    $("#passError").html(response[0][key]);
                                }
                            }
                        }                      
                    }
                }
            }
        );
        

    });
    $("#login").click(function(){
        var user = $("#user").val();
        var pass = $("#password").val();
        var flag = false;
        if(user == "" ){
            $("#userErr").html("Pls enter ur username!");
            flag = true;
        }else{
            $("#userErr").html("");
            flag = false;
        } 
        if(pass == ""){
            $("#passErr").html("Pls enter ur password!");
            flag = true;
        }else{
            $("#passErr").html("");
            flag = false;
        }   

        if(flag == false){
            $.post("login.php",{sign :1, username: user, password: pass},function(){}, "json").
            done(function(response){
                if(response.status == 'success'){
                    window.location.href="index.php";
                }else{
                  $("#userErr").html(response.loginValid);
                }
            });
            /*$.ajax(
                {
                    url: 'login.php',
                    method: 'POST',
                    data: {
                        sign :1,
                        username: user,
                        password: pass
                    },
                    dataType:"json",
                    success: function(response){
                      if(response.status == 'success'){
                          window.location.href="index.php";
                      }else{
                          console.log(response.loginValid);
                        $("#userErr").html(response.loginValid);
                      }
                    }
                }

            );*/
    }
    });

});