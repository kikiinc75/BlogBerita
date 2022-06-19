<?php $this->load->view('admin/layouts/header'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<?php $this->load->view('admin/layouts/content_header'); ?>

	<!-- Main content -->
	<section class="content">
		<?php $this->load->view('admin/layouts/session'); ?>

		<!-- Default box -->
		<div class="box">
			<div class="box-header with-border">
				<a href="<?= base_url('admin/news/category/create') ?>" class="btn btn-xs btn-success pull-right">Create Category</a>
			</div>
			<div class="box-body">
				<table class="table table-bordered table-hover" id="table">
					<thead>
						<tr>
							<th>Name</th>
							<th width="300px">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if (sizeof($categories) > 0) : ?>
							<?php foreach ($categories as $key => $category) : ?>
								<tr>
									<td><?= $category->name ?></td>
									<td>
										<a href="<?= base_url() . 'admin/news/category/edit/' . $category->id  ?>" class="btn btn-primary btn-xs" title="Edit">Edit</a>

										<?php if ($category->id > 2) : ?>
											<a href="<?= base_url() . 'admin/news/category/delete/' . $category->id ?>" class="btn btn-danger btn-xs delete-button" title="Edit">Delete</a>
										<?php endif; ?>
									</td>

								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="4" style="text-align: center">Data is empty. Create a new one <a href="<?= base_url() . 'admin/news/category/create' ?>" class="btn btn-xs btn-success">Create Content</a>

								</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('admin/layouts/footer'); ?>
<?php $this->load->view('admin/layouts/footer_script'); ?>

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(document).on('click', '.delete-button', function(e) {
			let link = $(this);
			e.preventDefault();
			swal({
				title: "Are you sure?",
				text: "You will not be able to recover this action!",
				icon: "warning",
				buttons: true,
				dangerMode: true
			}).then(function(isConfirm) {
				if (isConfirm)
					window.location.href = link.attr('href');
			});
		});
	});
</script>
</body>

</html>
