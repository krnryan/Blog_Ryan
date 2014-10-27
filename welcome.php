<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RMC - Welcome</title>
	<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <?php require_once ('header.php'); ?>
	
	<header class="intro-header" style="background-image: url('img/home-bg.jpg')">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
					<div class="site-heading">
						<h1>Welcome page!</h1>
						<hr class="small">
						<span class="subheading">This is the welcome page!</span>
					</div>
				</div>
			</div>
		</div>
	</header>

    <div class="container">
		<h1>Welcome to my blog, <?php echo $_SESSION['user']['username']; ?>!</h1>
		<?php 
			if ($_SESSION['user']['username'] === 'admin'){
				header('Location: admin/admin_index.php');
			}
		?>
    </div>

    <hr>

    <?php require_once ('footer.php'); ?>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/clean-blog.js"></script>

</body>

</html>
