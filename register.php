<?php
    // session start();
    if(!empty($_SESSION)){ }else{ session_start(); }
?>
<!doctype html>
<html>
    <head>
        <title>CMS Bahaso | Register</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    </head>
    <body style="background:#586df5;">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6" >
                <br/><br/>
                
                <div id="notif">
                    <div class="alert alert-danger">
                        <small>Registration failed !</small>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-header">
                        <h4 class="card-title text-center">Register</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="functions.php?action=register" id="formregister">
                            <input type="hidden"  id="avpath" name="avpath" >
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <img id="imgavatar" src="img/logo-big.png" class="rounded-circle " alt="" style="width: 90px; height: 90px">
                                <label class="mb-0 fw-700 text-center mt-3 mb-3">
                                    Picture
                                </label>
                                <div class="form-group">
                                    <input type="file"  name="avatar" aria-describedby="imgavatar" onchange="readURL(this);">
                                </div> 
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input name="name" class="form-control" type="text" required="required" >
                            </div> 
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" type="email" required="required" >
                            </div> 
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" type="password" required="required">
                            </div> 
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input name="password_confirmation" class="form-control" type="password" required="required">
                            </div> 
                            <div class="form-group">
                                <label>Type</label>
                                <select name="role" id="role" required>
                                    <option value="1">Author</option>
                                    <option value="2">Visitor</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btnRegister" class="btn btn-primary btn-block"> Register Now  </button>
                            </div>   
                                                                                   
                        </form>
                        <div class="form-group text-center">
                            <a href="login.php"> Back to login  </a>
                            <span class="text-center"></span>
                        </div> 
                        
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div> 
    </div>
    <script>
        function readURL(input) {
        if (input.files && input.files[0]) {
            
            var reader = new FileReader();

            reader.onload = function (e) {
                    $('#imgavatar')
                        .attr('src', e.target.result)
                        .width(90)
                        .height(90);
                    $('#avpath').val(e.target.result)
            
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
      <?php if(empty($_GET['get'])){?>
        $("#notif").hide();
      <?php }?>
        var reggagal = function(){
            $("#notif").fadeOut('slow');
        };
        setTimeout(reggagal, 4000);
    </script> 
    </body>
</html>