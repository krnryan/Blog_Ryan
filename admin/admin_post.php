<?php include_once 'admin_header.php'; 
	include_once '../backend/post_functions.php';
	
	if (isset($_GET["id"]) && $_GET["id"]!="") {
		$post_id = $_GET["id"];
	} else {
		die("No page specified!");
	}
	
	if(isset($_POST['title']) AND 
	isset($_POST['content'])){
		
		$picture = $_POST['original_picture'];
		
		if(isset($_FILES['picture']) AND $_FILES['picture']['error'] == 0) {
	        move_uploaded_file($_FILES['picture']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/img/headers/'.$_FILES['picture']['name']);
	        $picture = $_FILES['picture']['name'];
		}
		
		if($_POST['title'] == "" OR $_POST['content'] =="") {
			?>
			<div class="alert alert-danger" role="alert">Please fill out everything!</div>
			<?php
		} else {
		
		$result = update_post($post_id, $_POST['title'], $_POST['subtitle'], $_POST['content'], $_SESSION['user']['user_id'], $picture);
		
		if(is_array($result)) {
			?>
			<div class="alert alert-success" role="alert">Successfully updated!</div>
			<?php
		}
		}
	}
	
	$posts = get_post($post_id);
	$post = $posts[0];
?>

<script src="//cdn.ckeditor.com/4.4.5/full/ckeditor.js"></script>
                <h1 class="page-header">
                    Edit
                    <small>post #<?php echo $post_id; ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="admin_index.php">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Edit post
                    </li>
                </ol>
				<?php include_once 'inc/post_form.php'; ?>
<script>
    CKEDITOR.replace( 'content' );
</script>

<?php include_once 'admin_footer.php'; ?>