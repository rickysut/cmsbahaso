<?php
    ini_set('display_errors', false);
    error_reporting(E_ERROR);
    // session start
    if(!empty($_SESSION)){ 
    }else{ session_start(); }
    require 'api/article.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>CMS Bahaso</title>
		<!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- jQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <!-- DATATABLES BS 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- BOOTSTRAP 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	</head>
    <body style="background:#586df5;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
                    <br/>
                    <span style="color:#fff">CMS Bahaso</span>
                    <a href="login.php" class="btn btn-info btn-md float-right"><span class="fa fa-sign-in"></span> Login</a>
                    <br/>
                    <br/>
                    <div class="card" >
                        <div class="card-header">
                            <h4 class="card-title">Daftar Artikel</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered" id="articletable" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                        <th>Publish date</th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $article =  new Article();
                                    $hasil = $article->getArticles();
                                    foreach($hasil->data as $isi){ ?>
                                    <tr>
                                        <td><img src="<?php echo 'http://bahasoweb.test/'.$isi->picture; ?>" style="width:40px; height:40px;"></td>
                                        <td><?php echo $isi->title; ?></td>
                                        <td><?php echo $isi->author->name;?></td>
                                        <td><?php echo $isi->body;?></td>
                                        <td><?php echo date('d/m/Y',strtotime($isi->created_at));?></td>
                                        
                                        <td style="text-align: center;">
                                            <a href="view.php?id=<?php echo $isi->id;?>" class="btn btn-success btn-md">
                                            <span class="fa fa-eye"></span></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
			    </div>
			</div>
		</div>
        <script>
            $('#articletable').dataTable();
        </script>
	</body>
</html>
