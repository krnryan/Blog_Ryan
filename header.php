 <?php require_once ('backend/sessions.php'); ?>
 
 <link href="css/mystyle.css" rel="stylesheet">
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