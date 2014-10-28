<?php
	require_once '../backend/post_functions.php';
	include_once 'admin_header.php'; 

	if(isset($_POST['title']) AND 
		isset($_POST['content'])){
			
		$picture = '';
		
		if(isset($_FILES['picture']) AND $_FILES['picture']['error'] == 0) {
	        move_uploaded_file($_FILES['picture']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/img/headers/'.$_FILES['picture']['name']);
	        $picture = $_FILES['picture']['name'];
    	}
		
		if($_POST['title'] == "" OR $_POST['content'] =="") {
			?>
			<div class="alert alert-danger" role="alert">Please fill out everything!</div>
			<?php
		} else {
		
		$result = add_post($_POST['title'], $_POST['subtitle'], $_POST['content'], $_SESSION['user']['user_id'], $picture);
		
		if(is_array($result)) {
			?>
			<div class="alert alert-success" role="alert">Successfully posted!</div>
			<?php
		}
		}
	}
?>
<script src="//cdn.ckeditor.com/4.4.5/full/ckeditor.js"></script>
                        <h1 class="page-header">
                            Create
                            <small>new post</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin_index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Create post
                            </li>
                        </ol>
						<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
							<div class="form-group">
							<label for="new_title" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="new_title" name="title">
								</div>
							</div>
							<div class="form-group">
							<label for="new_subtitle" class="col-sm-2 control-label">Subtitle</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="new_subtitle" name="subtitle">
								</div>
							</div>
							<div class="form-group">
								<label for="new_content" class="col-sm-2 control-label">Content</label>
								<div class="col-sm-10">
									<textarea class="form-control" id="new_content" rows="10" name="content"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<label for="pic_attachment">Picture attachment</label>
									<input type="file" id="pic_attachment" name="picture">
									<p class="pic_help">JPEG file only (maximum 1Mb)</p>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-default">Create</button>
								</div>
							</div>
						</form>
        <script>
            CKEDITOR.replace( 'content' );
        </script>
                        
<?php include_once ('admin_footer.php'); ?>