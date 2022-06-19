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
				<a href="<?= base_url() . 'admin/news/create' ?>" class="btn btn-xs btn-success pull-right">Create Content</a>
			</div>
			<div class="box-body">
				<table class="table table-bordered table-hover" id="table">
					<thead>
						<tr>
							<th>Title</th>
							<th>Status</th>
							<th>Created At</th>
							<th>Updated At</th>
							<th width="300px">Action</th>
						</tr>
					</thead>
					<tbody>

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

<!-- Sweetalert -->
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

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	var save_method; //for save method string
	var table;

	$(document).ready(function() {
		//datatables
		table = $('#table').DataTable({
			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.
			// Load data for the table's content from an Ajax source
			"ajax": {
				"url": '<?php echo base_url("admin/news/datatable"); ?>',
				"type": "POST"
			},
			//Set column definition initialisation properties.
			"columns": [{
					"data": "title",
					"name": "title"
				},
				{
					"data": "status",
					"name": "status",
					render: function(data, type, row) {
						if (data == 'active')
							return 'Publish';
						else
							return 'Draft';
					}
				},
				{
					"data": "created_at",
					"name": "created_at"
				},
				{
					"data": "updated_at",
					"name": "updated_at"
				},
				{
					"data": "action",
					"name": "action"
				},
			]
		});

	});
</script>
</body>

</html>
