<?php require_once 'backend/user_functions.php';
	require_once 'backend/post_functions.php';
	
	if (isset($_GET["id"]) && $_GET["id"]!="") {
		$post_id = $_GET["id"];
	} else {
		die("No page specified!");
	}
	$post_numbers = get_post();
	$posts = get_post($post_id);

	$comments = get_post_comments($post_id);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Coding &lt;span&gt; | POSTS</title>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/clean-blog.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <style>
    	.page-nav {
    		text-align: center;
    	}
    	
    	.remove-comment {
    		cursor: pointer;
    	}
    </style>
</head>

<body>

    <?php require_once ('header.php'); ?>
	<?php foreach($posts as $post) { ?>
    <header class="intro-header" style="background-image: url('img/<?php echo $post['picture']; ?>')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="post-heading">
                        <h1><?php echo $post['title'] ?></h1>
                        <h2 class="subheading"><?php echo $post['subtitle'] ?></h2>
                        <span class="meta">Posted by <a href="#"><?php echo $post['username'] ?></a> on <?php echo date('m/d/Y', $post['created_ts']); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                     <?php echo $post['body']; };?>
                </div>
            </div>
        </div>
    </article>
    <div class="container">
    	<div class="row">
        	<div class="page-nav">
				<ul class="pagination">
					<li class="disabled"><a href="#">&laquo;</a></li>
					<?php 
					$index = 1;
					foreach($post_numbers as $post_num) { ?>
					<li class="<?php if($_GET["id"] == $post_num['post_id']) {?>active<?php }; ?>"><a href="post.php?id=<?php echo $post_num['post_id']?>"><?php echo $index++; ?> <span class="sr-only">(current)</span></a></li>
					<?php }; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="container" id="comments-container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<ul id="comments-list">
					<?php foreach($comments as $comment) { ?>
						<li style="list-style-type: none;">
							<p><?php echo $comment['body']; ?></p>
							<em>By <?php echo $comment['username']; ?> on <?php echo date('F d, Y h:iA', $comment['created_ts']); ?></em><br/>
							<a data-id="<?php echo $comment['comment_id']; ?>" class="fa fa-trash-o remove-comment"> Delete</a> | <a href="#" class="fa fa-pencil-square-o"> EDIT</a>
							<hr>
						</li>
					<?php }; ?>
				</ul>
				<div id="comment-form-container">
			        <form role="form" id="comment-form">
			        	<div class="form-group">
			        		<label for="comment">Comment</label>
			        		<textarea class="form-control" id="comment" placeholder="Comment"></textarea>
			        	</div>
			        	<button type="submit" class="btn btn-default">Submit</button>
			        </form>
			    </div>
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
	<script>
		var post_id = <?php echo $_GET['id']; ?>;
		var user_id = <?php echo $_SESSION['user']['user_id']; ?>;
		var comment;
		$(function(){
			$('#comment-form').submit(function(){
				comment = $('#comment').val();
				
				var data = {
					'post_id': post_id,
					'user_id': user_id,
					'comment': comment
				};
				
				$.post('ajax/add_comment.php', data,
					function(response){
						if(response !== 0) {
							var li = $('<li>').html(response).attr('style','list-style-type: none');
							$('#comments-list').append(li);
							console.log(response);
						}
					});
				return false;
			});
		});
		
	$('.remove-comment').click(function() {
		var confirm_result = confirm ('Are you sure you want to delete this comment?');
		if(confirm_result) {
			var current = $(this);
			var data = {id: current.attr('data-id')};
			$.post('/ajax/delete_comment.php', data,
				function(response) {
					if (response == 1){
					current.parent().animate(
						{
							opacity: 0
						}, 500, function() {
							current.parent().remove()
						})
					}
				}
			);
		}
	});
	</script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/clean-blog.js"></script>

</body>

</html>
