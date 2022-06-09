<?php $this->load->view('admin/layouts/header'); ?>
	
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		
		<?php $this->load->view('admin/layouts/content_header'); ?>

	    <!-- Main content -->
	    <section class="content">
			<?php $this->load->view('admin/layouts/session'); ?>
	        
	        <!-- form start -->
        	<form class="form-horizontal" action="<?= base_url().'admin/user/store' ?>" method="POST">
	      	
		      	<!-- Default box -->
		      	<div class="box">
		        	<div class="box-header with-border">
		          		<h3 class="box-title">General Info</h3>
		        	</div>
              		<div class="box-body">
                		<div class="form-group">
                  			<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
	                  		<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="inputEmail3" placeholder="Name" value="<?= set_value("name")?>" name="name">
	                    		<span class="text-danger"><?php echo form_error('name'); ?></span>
	                  		</div>
       		 			</div>
            			<div class="form-group">
                  			<label for="inputEmail3" class="col-sm-2 control-label">Position</label>
	                  		<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="inputEmail3" placeholder="Position" value="<?= set_value("position")?>" name="position">
	                    		<span class="text-danger"><?php echo form_error('name'); ?></span>
	                  		</div>
       		 			</div>
           			 	<div class="form-group">
                  			<label for="inputEmail3" class="col-sm-2 control-label">Phone</label>
	                  		<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="inputEmail3" placeholder="Phone" value="<?= set_value("phone")?>" name="phone">
	                    		<span class="text-danger"><?php echo form_error('phone'); ?></span>
	                  		</div>
       		 			</div>
       		 			<div class="form-group">
                  			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
	                  		<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="inputEmail3" placeholder="Email" value="<?= set_value("email")?>" name="email">
	                    		<span class="text-danger"><?php echo form_error('email'); ?></span>
	                  		</div>
       		 			</div>
       		 			<div class="form-group">
                  			<label for="inputEmail3" class="col-sm-2 control-label">Username</label>
	                  		<div class="col-sm-10">
	                    		<input type="text" class="form-control" id="inputEmail3" placeholder="Username" value="<?= set_value("username")?>" name="username">
	                    		<span class="text-danger"><?php echo form_error('username'); ?></span>
	                  		</div>
       		 			</div>
       		 			<div class="form-group">
                  			<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
	                  		<div class="col-sm-10">
	                    		<input type="password" class="form-control" id="inputEmail3" placeholder="Password" value="<?= set_value("password")?>" name="password">
	                    		<span class="text-danger"><?php echo form_error('password'); ?></span>
	                  		</div>
       		 			</div>
              		</div>
              		<!-- /.box-body -->

		      	</div>
		      	<!-- /.box -->

	      		<!-- Default box -->
		      	<div class="box">              		
              		<div class="box-footer">
                		<button type="submit" class="btn btn-info pull-right">Create</button>
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
	
	<!-- iCheck for checkboxes and radio inputs -->
 	<link rel="stylesheet" href="<?php echo base_url();?>assets/AdminLTE/plugins/iCheck/all.css">
 	<!-- iCheck 1.0.1 -->
	<script src="<?php echo base_url();?>assets/AdminLTE/plugins/iCheck/icheck.min.js"></script>

	<!-- CK Editor -->
	<script src="<?php echo base_url();?>assets/AdminLTE/bower_components/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
	 	$(function () {
	    	// Replace the <textarea id="editor1"> with a CKEditor
		    // instance, using default configuration.
		    CKEDITOR.replace('editor1')

		    //iCheck for checkbox and radio inputs
		    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		      checkboxClass: 'icheckbox_minimal-blue',
		      radioClass   : 'iradio_minimal-blue'
		    })
	  	});
	</script>
	</body>
</html>
