<?php
	require_once '../backend/post_functions.php';
	include_once 'admin_header.php'; 
	$posts = get_post();
?>

<style>
	.fa-trash-o {
		color: red;
	}
</style>
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
 								<td><a data-id="<?php echo $post['post_id']; ?>" href="#" class="fa fa-trash-o remove-post"> Delete</a> | <a href="#" class="fa fa-pencil-square-o"> EDIT</a></td>
                        	<?php } ?>
						</table>

<script>
	$('.remove-post').click(function() {
		var confirm_result = confirm ('Are you sure you want to delete this posting?');
		if(confirm_result) {
			var current = $(this);
			var data = {id: current.attr('data-id')};
			$.post('/ajax/delete_post.php', data,
				function(response) {
					if (response == 1){
					current.parent().parent().animate(
						{
							opacity: 0
						}, 500, function() {
							current.parent().parent().remove()
						})
					}
				}
			);
		}
	});
</script>

<?php include_once ('admin_footer.php'); ?>