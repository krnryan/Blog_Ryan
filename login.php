<?php require_once 'backend/user_functions.php';
	require_once 'backend/post_functions.php';

	$posts = get_post($post_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coding &lt;span&gt; | LOGIN</title>
	<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/clean-blog.min.css" rel="stylesheet">
	<link href="css/mystyle.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Ryan Mingyu Choi</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
	                    <a href="index.php">Home</a>
	                </li>
                    <li>
                        <a href="about.php">About me</a>
                    </li>
                    <li>
                        <a href="post.php?id=<?php echo $posts[0]['post_id']; ?>">Postings</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="site-heading">
                        <h1>Welcome back!</h1>
                        <hr class="small">
                        <span class="subheading">More info is waiting!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
			<?php				
				if(isset($_POST['user_id']) AND 
					isset($_POST['user_password']))
				{
					$result = login_user($_POST['user_id'], $_POST['user_password']);
					if(is_array($result)) {
							if ($_SESSION['user']['username'] === 'admin'){
								header('Location: /admin/admin_index.php');
							} else {
								header('Location: '.$_GET['url']);
								?>
								<div class="alert alert-success" role="alert">Successfully logged in!</div>
								<?php
							}
						}
						else {
							?>
							<div class="alert alert-danger" role="alert">Please check your username / password!</div>
							<?php
						}
				}
			?>
	<div class="container">
        <div id="box">
			<form id="reg_form" method="POST">
				<label for="username">Username</label>
				<input class="form-control" type="text" name="user_id" id="username"/><br/>
				<label for="userpw">Password</label>
				<input class="form-control" type="password" name="user_password" id="userpw"/><br/>
				<button class="btn btn-primary" type="submit">LOGIN</button>
			</form><br/>
				<button class="btn btn-primary" onclick="location.href = 'registration.php'">Create new account</button>
		</div>
    </div>

    <hr>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
                        <li>
                            <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
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

    <script src="js/clean-blog.js"></script>
</body>

</html>
