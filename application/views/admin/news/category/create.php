<?php $this->load->view('admin/layouts/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<?php $this->load->view('admin/layouts/content_header'); ?>

	<!-- Main content -->
	<section class="content">
		<?php $this->load->view('admin/layouts/session'); ?>

		<!-- form start -->
		<form action="<?= base_url() . 'admin/news/category/store' ?>" class="form-horizontal" method="POST" enctype="multipart/form-data" id="form">

			<!-- Default box -->
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">General Info</h3>
				</div>
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="inputEmail3" placeholder="Name" value="<?= set_value('name') ?>" name="name">
							<span class="text-danger"><?php echo form_error('name'); ?></span>
						</div>
					</div>
				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-success pull-right create" style="margin-left: 15px">Create</button>
					<a href="<?= base_url() . 'admin/news/category' ?>" class="btn btn-info pull-right create">Back to list</a>
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
		CKEDITOR.replace('editor1');
		CKEDITOR.replace('editor2');
		CKEDITOR.replace('editor3');

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
