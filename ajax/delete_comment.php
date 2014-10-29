<?php
require_once '../backend/sessions.php';
require_once '../backend/post_functions.php';

$result = FALSE;

if(isset($_POST['id']) AND !empty($_POST['id'])) {
	$result = delete_comment($_POST['id']);
}

echo (int)$result;
?>
