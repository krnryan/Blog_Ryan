<?php
//require_once '../backend/sessions.php';
require_once '../backend/post_functions.php';


if(isset($_POST['page']) and isset($_POST['limit'])) {
	$result = get_post(NULL, $_POST['page'], $_POST['limit']);
	if($result !== FALSE) {
		header('content-type: application/json');
		echo json_encode($result);
		exit;
        /*foreach($result as $post_preview) {
            ?><div class="post-preview">
                <a href="post.php?id=<?php echo $post_preview['post_id']; ?>">
                    <h2 class="post-title">
                        <?php echo $post_preview['title']; ?>
                    </h2>
                    <h3 class="post-subtitle">
                        <?php echo $post_preview['subtitle']; ?>
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#"><?php echo $post_preview['username']; ?></a> on <?php echo date('m/d/Y', $post_preview['created_ts']); ?></p>
            </div>
            <hr>
        <?php }*/
	}
}

return $result;
?>