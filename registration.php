<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coding &lt;span&gt; | REGISTRATION</title>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
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
                        <a href="login.php">Login/Sign up</a>
                    </li>
                    <li>
	                    <a href="index.php">Home</a>
	                </li>
                    <li>
                        <a href="about.php">About me</a>
                    </li>
                    <li>
                        <a href="post.php">Postings</a>
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
                        <h1>Welcome!</h1>
                        <hr class="small">
                        <span class="subheading">Sign up and get more info!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="message-container" style="text-align: center;"></div>

    <div class="container">
        <div id="box">
			<form id="reg_form" method="POST">
				<label for="username">Username</label>
				<input class="form-control" type="text" name="user_id" id="username"/><br/>
				<label for="userpw">Password</label>
				<input class="form-control" type="password" name="user_password" id="userpw"/><br/>
				<label for="useremail">Email</label>
				<input class="form-control" type="text" name="user_email" id="useremail"/><br/>
				<button class="btn btn-primary" type="submit">REGISTER</button>
			</form><br/>
				<button class="btn btn-primary" onclick="location.href = 'login.php'">Already signed up?</button>
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
	
	<script>
		$(function(){
			
			$('#username').blur(function(){
				var user_field = $(this);
				var data = {
					'user_id': $(this).val()
				}
				$.post('ajax/unique_check.php', data,
					function(response){
						if(response == 1) {
							user_field.removeClass('alert-danger').addClass('alert-success');
							$('#message-container').removeClass('alert alert-danger').html('');
						} else {
							user_field.removeClass('alert-success').addClass('alert-danger');
							$('#message-container').addClass('alert alert-danger').html('Already in use! Please try another username!');
						}
					}
				);
			});
			
			$('#useremail').blur(function(){
				var user_field = $(this);
				var data = {
					'user_email': $(this).val()
				}
				$.post('ajax/unique_check.php', data,
					function(response){
						if(response == 1) {
							user_field.removeClass('alert-danger').addClass('alert-success');
							$('#message-container').removeClass('alert alert-danger').html('');
						} else {
							user_field.removeClass('alert-success').addClass('alert-danger');
							$('#message-container').addClass('alert alert-danger').html('Already in use! Please try another email!');
							
						}
					}
				);
			});
			
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
				
				//AJAX call
				var data = {
					'user_id': username,
					'user_password': password,
					'user_email': email
				}
				
				$.post('/ajax/registration.php', data, 
					function(response){
						if (response == 1) {
						var div = $('<div>')
							.addClass('alert alert-success')
							.html('Account registration successful');
						} else {
							var div = $('<div>')
							.addClass('alert alert-danger')
							.html(response);
						}
						
						$('#message-container').html(div);
					}
				);
				
				return false;
			});
		});
	</script>
</body>

</html>
