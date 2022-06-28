<?php $this->load->view('layouts/head'); ?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="heading-page header-text">
	<section class="page-heading">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="text-content">
						<h4>Recent Posts</h4>
						<h2>Our Recent Blog Entries</h2>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<!-- Banner Ends Here -->


<section class="blog-posts grid-system">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="all-blog-posts">
					<div class="row">
						<?php if (!empty($datas)) { ?>
							<?php foreach ($datas as $key => $value) { ?>
								<div class="col-lg-6">
									<div class="blog-post">
										<div class="blog-thumb">
											<img src="<?= base_url() . '/uploads/' . $value->image_1 ?>" alt="">
										</div>
										<div class="down-content">
											<a href="<?= base_url() . 'article/' . $value->category_slug ?>" target="_blank">
												<span><?= $value->category_name ?></span>
											</a>
											<a href="<?= base_url() . 'article/' . $value->category_slug . '/' . $value->slug ?>">
												<h4><?= $value->title ?></h4>
											</a>
											<ul class="post-info">
												<li><a href="#"><?= $value->user_name ?></a></li>
												<li><a href="#"><?= date("M d, Y", strtotime($value->created_at)); ?></a></li>
											</ul>
											<p><?= $value->excerpt ?></p>
										</div>
									</div>
								</div>
							<?php } ?>
							<div class="col-lg-12">
								<?= $this->pagination->create_links(); ?>
							</div>

						<?php } else { ?>
							<div class="col-lg-12">
								<h2 class="mt-5 text-center"> Tidak ada artikel di kategori ini</h2>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<?php $this->load->view('layouts/sidebar-categories'); ?>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('layouts/footer'); ?>
