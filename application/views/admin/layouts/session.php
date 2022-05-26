<?php if(!is_null($this->session->flashdata("success"))): ?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <?= $this->session->flashdata("success"); ?>
	</div>				
<?php endif; ?>

<?php if(!is_null($this->session->flashdata("error"))): ?>
	<div class="alert alert-error alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <?= $this->session->flashdata("error"); ?>
	</div>				
<?php endif; ?>

<?php if(!is_null($this->session->flashdata("warning"))): ?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> <?= $this->session->flashdata("warning"); ?>
	</div>				
<?php endif; ?>

<?php if(!is_null($this->session->flashdata("errors"))): ?>
<div class="alert alert-danger alert-dismissible">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	<h4><i class="icon fa fa-ban"></i> Oooppss!</h4>
	<?php foreach ($this->session->flashdata("errors") as $error): ?>
	<li><?= $error ?></li>
	<?php endforeach; ?>
</div>
<?php endif; ?>