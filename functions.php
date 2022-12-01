<?php
    require 'api/auth.php';
    require 'api/article.php';

    $auth = new Auth();
    $article = new Article();

    // login
    if(!empty($_GET['action'] == 'login'))
    {   
        $email = strip_tags($_POST['email']);
        $pass = strip_tags($_POST['password']);

        $result = $auth->login($email,$pass);
        
        if($result->message != 'Login success')
        {
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            session_start();
            $_SESSION['token'] = $result->access_token;
            $_SESSION['username'] = $result->data->name;
            $_SESSION['role'] = $result->data->role;
            
            echo "<script>window.location='../home.php';</script>";
        }
    }

    // login
    if(!empty($_GET['action'] == 'register'))
    {   
        $email = strip_tags($_POST['email']);
        $pass = strip_tags($_POST['password']);
        $name = strip_tags($_POST['name']);
        $avatar = strip_tags($_POST['avpath']); 
        $role  = strip_tags($_POST['role']);
        
        $result = $auth->register($email,$pass, $name, $role, $avatar);
        if($result->message != 'Register success')
        {
            echo "<script>window.location='../register.php?get=gagal';</script>";
        }else{
            session_start();
            $_SESSION['token'] = $result->access_token;
            $_SESSION['username'] = $result->data->name;
            $_SESSION['role'] = $result->data->role;
            
            echo "<script>window.location='../home.php';</script>";
        }
    }
    
    // hapus data
    if(!empty($_GET['action'] == 'delete'))
    {
        
        $id = strip_tags($_GET['id']);
        $token = strip_tags($_GET['token']);
        $res =$article->deleteArticle($id,$token);
        // echo '<script>alert("'.$res->message.'");window.location="../home.php"</script>';
        if ($res->message == 'Article deleted')
        {
            echo '<script>alert("'.$res->message.'");window.location="../home.php"</script>';
        } else {
            echo '<script>alert("'.$res->message.'");window.location="../index.php"</script>';
        }
    }

    
    
    

    
?>