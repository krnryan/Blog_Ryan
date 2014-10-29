<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
	<div class="form-group">
	<label for="new_title" class="col-sm-2 control-label">Title</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="new_title" name="title" value="<?php echo $post['title']; ?>">
		</div>
	</div>
	<div class="form-group">
	<label for="new_subtitle" class="col-sm-2 control-label">Subtitle</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="new_subtitle" name="subtitle" value="<?php echo $post['subtitle']; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="new_content" class="col-sm-2 control-label">Content</label>
		<div class="col-sm-10">
			<textarea class="form-control" id="new_content" rows="10" name="content"><?php echo $post['body']; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		<input type="hidden" name="original_picture" value="<?php echo $post['picture']; ?>">
		<?php
			if(!empty($post['picture'])) {
		?>
			<a href="/img/headers/<?php echo $post['picture']; ?>" target="_new">Current Cover Picture</a><br/>
		<?php }; ?>
			<label for="pic_attachment">Cover picture</label>
			<input type="file" id="pic_attachment" name="picture">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">Done</button>
		</div>
	</div>
</form>