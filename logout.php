<?php
	require_once ('backend/user_functions.php');
	logout_session();
	header('Location: index.php');
?>