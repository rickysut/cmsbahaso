<?php
    ini_set('display_errors', false);
    error_reporting(E_ERROR);
    // session start
    if(!empty($_SESSION)){ }else{ session_start(); }
	
    require 'api/article.php';
    
    // get article id
    $id = strip_tags($_GET['id']);
    $article =  new Article();
    if (!empty($_SESSION['token']))
    {
        $allArticle =  $article->authorArticles($_SESSION['token'])->data;
    } else 
        $allArticle =  $article->getArticles()->data;
    $data = $article->getArticle($id)->data[0];
    // var_dump($data[0]);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $data->title ?></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body style="background:#fff;">
		<div class="container">
			<br/>
            <h2 style="color:#000";>View Article</h2>
			<div class="float-right">	
                <?php if (!empty($_SESSION['token'])) { ?>
                    <a href="home.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-arrow-left"></span> Back</a> 
                    <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                        
                <?php }  else { ?>
                    <a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Home</a> 
				    <a href="login.php" class="btn btn-info btn-md float-right"><span class="fa fa-sign-in"></span> Login</a>
                <?php }  ?>
			</div>		
			<br/><br/><br/>
            <div style="width: 280px;float: right;">
                <h3>Read more</h3>
                <ul class="tmo_list">
                    <?php foreach($allArticle as $more){ ?>
                    <li><a href="view.php?id=<?php echo $more->id;?>"><?php echo $more->title; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
			<div class="row">
				
				<div class="col-md-12">
                    <div id="fullpost">
                        <label>Posted at: <?php echo date('d/m/Y',strtotime($data->created_at));?></label> </br><span style="font-size: 12px; color: #512234" >by: <?php echo $data->author->name; ?></span></br>
                        <img src="<?php echo 'http://bahasoweb.test/'.$data->picture; ?>" style="float: left; margin: 3px 30px 0 0; display: inline-block; border: 3px solid #dddddd; width: 220px; height:220px"  alt="Image">
                        <h2 style="font-size: 28px; margin: 0 0 25px; padding: 5px 0"><?php echo $data->title; ?></h2>
                        <p style=""><?php echo $data->body; ?></p>
                    </div>
                </div>
			</div>
            
		</div>
	</body>
</html>