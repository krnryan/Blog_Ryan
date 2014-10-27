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
 								<td><i class="fa fa-trash-o"></i>Delete | <i class="fa fa-pencil-square-o"></i>EDIT</td>
                        	<?php } ?>
						</table>
<?php include_once ('admin_footer.php'); ?>