<?php use puffin\transformer; ?>

<?= $this->partial('breadcrumb', [ 'crumbs' => [
	[ 'name'=> 'Blog', 'url' => '/blog'  ],
	[ 'name'=> 'Create', 'active' => 'true'  ],
]]); ?>

<div class="card">
	<div class="card-header">
		Create Blog Post
	</div>
	<div class="card-block">
		<form method="POST" accept-charset="UTF-8" data-form-ajax="">
			<input name="author_user_id" type="hidden" value="<?= $_SESSION['user']['id'] ?>">

			<div class="form-group">
				<label>Title</label>
				<input placeholder="Title" class="form-control required" name="title" type="text">
			</div>
			<div class="form-group">
				<label>Author</label>
				<input placeholder="Author" class="form-control required" name="author" type="text" value="<?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'] ?>">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Next</button>
				<a class="btn btn-secondary" href="/helpers">Cancel</a>
			</div>
		</form>
	</div>
</div>
