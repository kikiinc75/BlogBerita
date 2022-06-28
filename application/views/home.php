<?php $this->load->view('layouts/head'); ?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
	<div class="container-fluid">
		<div class="owl-banner owl-carousel">
			<?php foreach ($featured_news as $key => $new) { ?>
				<div class="item">
					<a href="<?= base_url() . 'article/' . $new->category_slug . '/' . $new->slug ?>">
						<img src="<?= base_url() . '/uploads/' . $new->image_1 ?>" alt="">
						<div class="item-content">
							<div class="main-content">
								<div class="meta-category">
									<span><?= $new->category_name ?></span>
								</div>
								<h4><?= $new->title ?></h4>
								<ul class="post-info">
									<li><a href="#"><?= $new->user_name ?></a></li>
									<li><a href="#"><?= date("M d, Y", strtotime($new->created_at)); ?></a></li>
								</ul>
							</div>
						</div>
					</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
<!-- Banner Ends Here -->


<section class="blog-posts">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="all-blog-posts">
					<div class="row">
						<?php if (count($news)) { ?>
							<?php foreach ($news as $key => $new) { ?>
								<div class="col-lg-12">
									<div class="blog-post">
										<div class="blog-thumb">
											<img src="<?= base_url() . '/uploads/' . $new->image_1 ?>" alt="">
										</div>
										<div class="down-content">
											<a href="<?= base_url() . 'article/' . $new->category_slug ?>" target="_blank">
												<span><?= $new->category_name ?></span>
											</a>
											<a href="<?= base_url() . 'article/' . $new->category_slug . '/' . $new->slug ?>">
												<h4><?= $new->title ?></h4>
											</a>
											<ul class="post-info">
												<li><a href="#"><?= $new->user_name ?></a></li>
												<li><a href="#"><?= date("M d, Y", strtotime($new->created_at)); ?></a></li>
											</ul>
											<p><?= $new->excerpt ?></p>
										</div>
									</div>
								</div>
							<?php } ?>

							<div class="col-lg-12">
								<div class="main-button">
									<a href="<?= base_url() . 'article/all' ?>">View All Posts</a>
								</div>
							</div>
						<?php } else { ?>
							<div class="col-lg-12">
								<h2 class="text-center">No Post yet</h2>
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
