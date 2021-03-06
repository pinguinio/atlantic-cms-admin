<?= $this->partial('breadcrumb', [ 'crumbs' => [
	[ 'name'=> 'Pages', 'url' => '/pages' ],
	[ 'name'=> 'Contents', 'url' => "/pages/update/{$this->page['id']}" ],
	[ 'name'=> 'Update Version', 'active' => 'true' ],
]]); ?>

<div class="card">
	<div class="card-header">
		Update Version
	</div>
	<div class="card-block">
		<form method="POST" accept-charset="UTF-8" data-form-ajax="">
			<input name="id" type="hidden" value="<?= $this->page_version['id'] ?>">
			<input name="author_user_id" type="hidden" value="<?= $_SESSION['user']['id'] ?>">

			<div class="form-group">
				<label>Title</label>
				<input placeholder="Name" class="form-control required" name="title" type="text" value="<?= $this->page_version['title'] ?>">
			</div>
			<div class="form-group">
				<label>Page Layout</label>
				<select class="form-control required" name="page_layout_id">
					<?php foreach( $this->page_layouts as $layout ): ?>
						<?php $selected = '' ?>
						<?php if( $this->page_version['page_layout_id'] == $layout['id'] ){
							$selected = 'selected';
						} ?>
						<option <?= $selected ?> value="<?= $layout['id'] ?>"><?= $layout['name'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group">
				<label>Split Percentage</label>
				<p class="form-control"><?= $this->page_version['percentage'] ?></p>
			</div>
			<div class="form-group">
				<label>Comments</label>
				<input class="form-control required" name="comments" type="text" value="<?= $this->page_version['comments'] ?>">
			</div>

			<label class="float-xs-left">Content <?= $this->partial('datahelper') ?></label>
			<a target="_blank" href="/page-preview/<?= $this->page_version['id'] ?>" class="btn btn-sm btn-secondary float-xs-right">
				<i class="fa fa-eye"></i> Preview
			</a>
			<div id="editor" class="form-control"><?= htmlentities($this->page_version['contents']) ?></div>
			<input type="hidden" name="contents" id="content">
			<br />

			<button type="submit" class="btn btn-primary">Save</button>
			<a class="btn btn-secondary" href="/pages/update/<?= $this->page['id'] ?>">Cancel</a>
		</form>
	</div>
</div>

<?php echo $this->partial('pages/ace') ?>
