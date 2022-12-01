<?php
    // session start();
    if(!empty($_SESSION)){ }else{ session_start(); }
?>
<!doctype html>
<html>
    <head>
        <title>CMS Bahaso | Login</title>
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
                <div id="logout">
                    <?php if(isset($_GET['signout'])){?>
                        <div class="alert alert-success">
                            <small>Logout Success</small>
                        </div>
                    <?php }?>
                </div>
                <div id="notif">
                    <div class="alert alert-danger">
                        <small>Login failed, check username and password</small>
                    </div>
                </div>
                <div class="card mt-5">
                    <div class="card-header">
                        <h4 class="card-title text-center">Please login</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="functions.php?action=login" id="formlogin">
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" type="email" required="required" autocomplete="off">
                            </div> 
                            <div class="form-group">
                                <label>Password</label>
                                <input name="password" class="form-control" type="password" required="required" autocomplete="off">
                            </div> 
                            <div class="form-group">
                                <button type="submit" name="btnLogin" class="btn btn-primary btn-block"> Login  </button>
                            </div>   
                            <div class="form-group">
                                <a href="register.php"  class="btn btn-warning btn-block"> Register  </a>
                            </div>                                                         
                        </form>
                        <div class="form-group text-center">
                            <a href="index.php"> Back to Home  </a>
                            <span class="text-center"></span>
                        </div> 
                        <div class="form-group text-center">
                            <a href="forget.php"> Forget Password  </a>
                        </div> 
                </div>
            </div>
            <div class="col-sm-3">
            </div>
        </div> 
    </div>
    <script>
      <?php if(empty($_GET['get'])){?>
        $("#notif").hide();
      <?php }?>
        var logingagal = function(){
            $("#logout").fadeOut('slow');
            $("#notif").fadeOut('slow');
        };
        setTimeout(logingagal, 4000);
    </script> 
    </body>
</html>