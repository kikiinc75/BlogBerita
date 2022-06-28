<?php $this->load->view('admin/layouts/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<?php $this->load->view('admin/layouts/content_header'); ?>

	<!-- Main content -->
	<section class="content">
		<?php $this->load->view('admin/layouts/session'); ?>

		<!-- form start -->
		<form action="<?= base_url() . 'admin/news/store' ?>" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">

			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">General Info</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Category</label>
						<div class="col-sm-10">
							<select class="form-control" name="category_id">
								<?php foreach ($categories as $category) : ?>
									<option value="<?= $category->id ?>"><?= $category->name ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Title</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Title" value="<?= set_value('title') ?>" name="title">
							<span class="text-danger"><?php echo form_error('title'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							<select class="form-control" name="status">
								<option value="inactive" <?= set_value('status') == 'inactive' ? 'selected' : '' ?>>Draft</option>
								<option value="active" <?= set_value('status') == 'active' ? 'selected' : '' ?>>Publish</option>
							</select>
							<span class="text-danger"><?php echo form_error('status'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Featured</label>
						<div class="col-sm-10">
							<select class="form-control" name="featured">
								<option value="0" <?= set_value('featured') == 0 ? 'selected' : '' ?>>Inactive</option>
								<option value="1" <?= set_value('featured') == 1 ? 'selected' : '' ?>>Active</option>
							</select>
							<span class="text-danger"><?php echo form_error('featured'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Subtitle</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Subtitle" value="<?= set_value('subtitle') ?>" name="subtitle">
							<span class="text-danger"><?php echo form_error('subtitle'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Excerpt</label>
						<div class="col-sm-10">
							<textarea id="editor0" name="excerpt" rows="10" cols="80" class="form-control"><?= set_value('excerpt') ?></textarea>
							<span class="text-danger"><?php echo form_error('Excerpt'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Description</label>
						<div class="col-sm-10">
							<textarea id="editor2" name="description" rows="10" cols="80"><?= set_value('description') ?></textarea>
							<span class="text-danger"><?php echo form_error('description'); ?></span>
						</div>
					</div>


					<div class="form-group">
						<label for="exampleInputFile" class="col-sm-2 control-label">Cover Image</label>
						<div class="col-sm-5">
							<input type="file" name="image_1">
							<p class="help-block">Image dimension 900 * 500</p>
							<span class="text-danger"><?php echo form_error('image_1'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="exampleInputFile" class="col-sm-2 control-label">Content Image</label>
						<div class="col-sm-5">
							<input type="file" name="image_2">
							<p class="help-block">Image dimension 900 * 500</p>
							<span class="text-danger"><?php echo form_error('image_2'); ?></span>
						</div>
					</div>

				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">SEO Metadata</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Meta Title</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Meta Title" value="<?= set_value('meta_title') ?>" name="meta_title">
							<span class="text-danger"><?php echo form_error('meta_title'); ?></span>
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Meta Keyword</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Meta Keyword" value="<?= set_value('meta_keyword') ?>" name="meta_keyword">
							<span class="text-danger"><?php echo form_error('meta_keyword'); ?></span>
						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Meta Description</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="inputEmail3" placeholder="Meta Description" name="meta_description"><?= set_value('meta_description') ?></textarea>
							<span class="text-danger"><?php echo form_error('meta_description'); ?></span>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->

			<!-- Default box -->
			<div class="box">
				<div class="box-footer">
					<button type="submit" class="btn btn-success pull-right create" style="margin-left: 15px">Create</button>
					<a href="<?= base_url() . 'admin/news' ?>" class="btn btn-info pull-right create">Back to list</a>
				</div>
				<!-- /.box-footer -->
			</div>
			<!-- /.box -->
		</form>
		<!-- /.box-body -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/layouts/footer'); ?>
<?php $this->load->view('admin/layouts/footer_script'); ?>

<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- CK Editor -->
<script src="<?php echo base_url(); ?>assets/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	$(function() {
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace('editor1', {
			extraPlugins: ["colorbutton", "image"],
			filebrowserUploadMethod: 'form',
			filebrowserUploadUrl: "<?php echo base_url(); ?>admin/upload-ckeditor"
		});

		CKEDITOR.replace('editor2', {
			extraPlugins: ["colorbutton", "image"],
			filebrowserUploadMethod: 'form',
			filebrowserUploadUrl: "<?php echo base_url(); ?>admin/upload-ckeditor"
		});

		CKEDITOR.replace('editor3', {
			extraPlugins: ["colorbutton", "image"],
			filebrowserUploadMethod: 'form',
			filebrowserUploadUrl: "<?php echo base_url(); ?>admin/upload-ckeditor"
		});

		//Date picker
		$('#start_date').datepicker({
			autoclose: true,
			dateFormat: 'yy-mm-dd'
		});

		//Date picker
		$('#end_date').datepicker({
			autoclose: true,
			dateFormat: 'yy-mm-dd'
		});
	});
</script>

</body>

</html>
