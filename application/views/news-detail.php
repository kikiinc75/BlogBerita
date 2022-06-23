<?php $this->load->view('layouts/head'); ?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
	<section class="page-heading">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="text-content">
						<h2>Post Details</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<section class="blog-posts grid-system">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="all-blog-posts">
					<div class="row">
						<div class="col-lg-12">
							<div class="blog-post">
								<div class="blog-thumb">
									<img src="<?= base_url() . '/uploads/' . $data->image_2 ?>" alt="">
								</div>
								<div class="down-content">
									<a href="<?= base_url() . 'article/' . $data->category_slug ?>" target="_blank">
										<span><?= $data->category_name ?></span>
									</a>
									<h4><?= $data->title ?></h4>
									<ul class="post-info">
										<li><a href="#"><?= $data->user_name ?></a></li>
										<li><a href="#"><?= date("M d, Y", strtotime($data->created_at)); ?></a></li>
									</ul>
									<?= $data->description ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<div class="row">
						<div class="col-lg-12">
							<?php $this->load->view('layouts/sidebar-categories') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('layouts/footer'); ?>
