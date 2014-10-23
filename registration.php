<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registration</title>
	<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	<style>			
		#box {
			background-color: #F7F7F7;
			width: 400px;
			margin: 10px auto;
			border: 1px solid #B3B3B3;
			border-radius: 20px;
			padding: 20px 30px;
			text-align: center;
		}
		
		#message {
			text-align: center;
			color: red;
		}
	</style>
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Ryan Mingyu Choi BLOG</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="post.html">Sample Post</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Welcome!</h1>
                        <hr class="small">
                        <span class="subheading">Sign up and get more info!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
		<div id="message">
			<?php
				require_once 'backend/user_functions.php';
				
				if(isset($_POST['user_id']) AND 
					isset($_POST['user_password']) AND 
					isset($_POST['user_email']))
				{
					$result = add_user($_POST['user_email'], $_POST['user_id'], $_POST['user_password']);
					if($result === true) {
						echo 'Successfully registered!';
					} else {
						echo 'ID and/or password is alreay in use!';
					}
				}
			?>
		</div>
        <div id="box">
			<form id="reg_form" method="POST">
				<label for="username">Username</label>
				<input class="form-control" type="text" name="user_id" id="username"/><br/>
				<label for="userpw">Password</label>
				<input class="form-control" type="password" name="user_password" id="userpw"/><br/>
				<label for="useremail">Email</label>
				<input class="form-control" type="text" name="user_email" id="useremail"/><br/>
				<button class="btn btn-primary" type="submit">REGISTER</button>
			</form>
		</div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                    <p class="copyright text-muted">Copyright &copy; Ryan Mingyu Choi BLOG 2014</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/clean-blog.js"></script>
	
	<script>
		$(function(){
			// Handle the submit event by validating our fields first
			$('#reg_form').submit(function(){
				var patt_username = /^[a-zA-Z0-9]{6,20}$/;
				var patt_password = /^[a-zA-Z0-9]{6,12}$/;
				var patt_password2 = /[A-Z]+/;
				var patt_password3 = /[0-9]+/;
				var patt_email = /^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-z]{2,4}$/;
				var username = $('#username').val();
				var password = $('#userpw').val();
				var email = $('#useremail').val();
				
				if (!patt_username.test(username)){
					alert('Username is invalid!');
					return false;
				}
				
				if (!patt_password.test(password)){
					alert('Password requires min 6, max 12 length!');
					return false;
				}
				
				if (!patt_password2.test(password)){
					alert('Password requires capitalized letter at least once!');
					return false;
				}
				
				if (!patt_password3.test(password)){
					alert('Password requires one number at least once!');
					return false;
				}
				
				if (!patt_email.test(email)){
					alert('Email is invalid!');
					return false;
				}
			});
		});
	</script>
</body>

</html>
