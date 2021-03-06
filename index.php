<?php require_once 'backend/user_functions.php'; 
	require_once 'backend/post_functions.php';
	/*if(!isset($_GET['page'])){
		header('Location: index.php?page=1');
	}*/
	$posts = get_post(NULL, 0, 3);
	$post_numbers = get_post();
	$pages = ceil(get_post_count() / 3);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coding &lt;span&gt; | HOME</title>
	<script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/clean-blog.min.css" rel="stylesheet">
	<link href="css/mystyle.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<style>
		.page-navigation {
			cursor: pointer;
		}
		.post-preview {
    		text-align: center;
    	}
	</style>
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
                	<?php 
						if ($_SESSION['user']['username'] === 'admin'){
							echo ('<li><a href="admin/admin_index.php">Admin</a></li>');
						}
					?>
                    <li>
						<?php
							if(!isset($_SESSION['user'])) {
								echo ('<a href="login.php">Login/Sign up</a>');
							} else {
								echo ('<a id="logout" href="logout.php">Logout</a>');
							}
						?>
                    </li>
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
                        <h1>Coding &lt;span&gt;</h1>
                        <hr class="small">
                        <span class="subheading">My coding &lt;span&gt; began at LearningFuze</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            	<div id="ajax-post-preview">
	            	<?php foreach($posts as $post) { ?>
	                <div class="post-preview">
	                    <a href="post.php?id=<?php echo $post['post_id']; ?>">
	                        <h2 class="post-title">
	                            <?php echo $post['title']; ?>
	                        </h2>
	                        <h3 class="post-subtitle">
	                            <?php echo $post['subtitle']; ?>
	                        </h3>
	                    </a>
	                    <p class="post-meta">Posted by <a href="#"><?php echo $post['username']; ?></a> on <?php echo date('m/d/Y', $post['created_ts']); ?></p>
	                </div>
	                <hr>
	                <?php } ?>
                </div>
			    <div class="post-preview page-nav">
			    	<div class="row">
			        	<div>
							<ul class="pagination">
								<?php 
								$index = 0;
								for($i = 0; $i < $pages; $i++) { ?>
									<li class="buttons">
										<a data-id="<?php echo $index++; ?>" class="page-navigation"><?php echo $i+1 ?></a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
                <ul class="pager">
                    <li class="next">
                        <a href="#">Older Posts &rarr;</a>
                    </li>
                </ul>
            </div>
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
    
    <div id="json-template" style="display: none">
		<div class="post-preview">
            <a href="post.php?id=%ID%">
                <h2 class="post-title">%TITLE%</h2>
                <h3 class="post-subtitle">%SUBTITLE%</h3>
            </a>
            <p class="post-meta">Posted by <a href="#">%USERNAME%</a> on %DATE%</p>
        </div>
        <hr>
    </div>
    
	<script>
		var first_button = $( "li.buttons" )[ 0 ];
		$('.pagination').find(first_button).addClass('active');
		$(function(){
			$('.page-navigation').click(function() {
				var current = $(this);
				var data = {page: current.attr('data-id'), limit: 3};
				$.post('/ajax/pagination.php', data,
					function(response) {
						if(response.length > 0){
							$('#ajax-post-preview').empty();
							response.forEach(function(post){
								var template = $('#json-template').html();
								function timeConverter(){
									  var a = new Date(post['created_ts']*1000);
									  var months = ['1','2','3','4','5','6','7','8','9','10','11','12'];
									  var year = a.getFullYear();
									  var month = months[a.getMonth()];
									  var date = a.getDate();
									  var time = month + '/' + date + '/' + year;
									  return time;
								}
								
								template = template
									.replace('%ID%', post['post_id'])
									.replace('%TITLE%', post['title'])
									.replace('%SUBTITLE%', post['subtitle'])
									.replace('%USERNAME%', post['username'])
									.replace('%DATE%', timeConverter());
							
							$('#ajax-post-preview').append(template);
							});
						}
						/*$('#ajax-post-preview').html(response);*/
						$('.buttons').removeClass('active');
						current.parent().addClass('active');
					}
				);
			});
		});
	</script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/clean-blog.js"></script>

</body>

</html>
