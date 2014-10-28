<?php
	require_once '../backend/user_functions.php';
	include_once 'admin_header.php'; 
	$users = get_user();
?>

                        <h1 class="page-header">
                            List
                            <small>of users</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="admin_index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> list of users
                            </li>
                        </ol>
                        <table class="table table-striped">
                        	<tr>
                        		<td>User ID</td>
                        		<td>Username</td>
                        		<td>Email</td>
                        		<td>Options</td>
                        	</tr>
                        	<?php foreach($users as $user) { ?>
                        	<tr>
 								<td><?php echo $user['user_id']; ?></td>
 								<td><?php echo $user['username']; ?></td>
 								<td><?php echo $user['email']; ?></td>
 								<td><a data-id="<?php echo $user['user_id']; ?>" href="#" class="fa fa-trash-o remove-post"> Delete</a> | <a href="#" class="fa fa-pencil-square-o"> EDIT</a></td>
                        	<?php } ?>
						</table>

<script>
	$('.remove-post').click(function() {
		var confirm_result = confirm ('Are you sure you want to delete this user?');
		if(confirm_result) {
			var current = $(this);
			var data = {id: current.attr('data-id')};
			$.post('/ajax/delete_user.php', data,
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