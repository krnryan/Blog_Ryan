<?php
	require_once '../backend/post_functions.php';
	include_once 'admin_header.php'; 
	$posts = get_post();
?>

                        <h1 class="page-header">
                            List
                            <small>of postings</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin_index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> list of postings
                            </li>
                        </ol>
                        <table class="table table-striped">
                        	<tr>
                        		<td>Post ID</td>
                        		<td>Title</td>
                        		<td>Posted on</td>
                        		<td>Options</td>
                        	</tr>
                        	<?php foreach($posts as $post) { ?>
                        	<tr>
 								<td><?php echo $post['post_id']; ?></td>
 								<td><a href="../post.php?id=<?php echo $post['post_id']; ?>"><?php echo $post['title']; ?></a></td>
 								<td><?php echo date('Y-m-d h:ia', $post['created_ts']); ?></td>
 								<td><i class="fa fa-trash-o"></i>Delete | <i class="fa fa-pencil-square-o"></i>EDIT</td>
                        	<?php } ?>
						</table>

<?php include_once ('admin_footer.php'); ?>