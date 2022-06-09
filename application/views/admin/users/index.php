<?php $this->load->view('admin/layouts/header'); ?>
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		
		<?php $this->load->view('admin/layouts/content_header'); ?>

		<!-- Main content -->
		<section class="content">

		  	<!-- Default box -->
		  	<div class="box">
				<div class="box-header with-border">
			  		<h3 class="box-title">User List</h3>
			  		<p style="float: right;">
	                    <a class="btn btn-primary" href="<?= base_url() ?>admin/user/create/">Create New</a>
	                </p>
				</div>
				<div class="box-body">
					<table class="table table-bordered table-hover" id="table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Username</th>
								<th>Email</th>
								<th>Position</th>
								<th>Status</th>
								<th>Admin Since</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody></tbody>
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
  	<link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
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
                    "url": '<?php echo base_url('admin/user/datatable'); ?>',
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "columns": [
                    {"data": "name", "name": "name"},
                    {"data": "username", "name": "username"},
                    {"data": "email", "name": "email"},
                    {"data": "position", "name": "position"},
                    {"data": "status", "name": "status"},
                    {"data": "created_at", "name": "created_at"},
                    {"data": "action", "name": "action"},
                ]
            });

        });
    </script>
</body>
</html>
