<?php $this->load->view('layouts/head'); ?>

<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner header-text">
	<div class="container-fluid">
		<div class="owl-banner owl-carousel">
			<?php for ($i = 0; $i < 5; $i++) { ?>
				<div class="item">
					<img src="assets/images/banner-item-01.jpg" alt="">
					<div class="item-content">
						<div class="main-content">
							<div class="meta-category">
								<span>Fashion</span>
							</div>
							<a href="post-details.html">
								<h4>Morbi dapibus condimentum</h4>
							</a>
							<ul class="post-info">
								<li><a href="#">Admin</a></li>
								<li><a href="#">May 12, 2020</a></li>
							</ul>
						</div>
					</div>
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
						<?php for ($i = 0; $i < 5; $i++) { ?>
							<div class="col-lg-12">
								<div class="blog-post">
									<div class="blog-thumb">
										<img src="assets/images/blog-post-01.jpg" alt="">
									</div>
									<div class="down-content">
										<span>Lifestyle</span>
										<a href="post-details.html">
											<h4>Best Template Website for HTML CSS</h4>
										</a>
										<ul class="post-info">
											<li><a href="#">Admin</a></li>
											<li><a href="#">May 31, 2020</a></li>
											<li><a href="#">12 Comments</a></li>
										</ul>
										<p>Stand Blog is a free HTML CSS template for your CMS theme. You can easily adapt or customize it for any kind of CMS or website builder. You are allowed to use it for your business. You are NOT allowed to re-distribute the template ZIP file on any template collection site for the download purpose. <a rel="nofollow" href="https://templatemo.com/contact" target="_parent">Contact TemplateMo</a> for more info. Thank you.</p>
										<div class="post-options">
											<div class="row">
												<div class="col-6">
													<ul class="post-tags">
														<li><i class="fa fa-tags"></i></li>
														<li><a href="#">Beauty</a>,</li>
														<li><a href="#">Nature</a></li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php } ?>
						<div class="col-lg-12">
							<div class="main-button">
								<a href="blog.html">View All Posts</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar">
					<div class="row">
						<!-- <div class="col-lg-12">
							<div class="sidebar-item search">
								<form id="search_form" name="gs" method="GET" action="#">
									<input type="text" name="q" class="searchText" placeholder="type to search..." autocomplete="on">
								</form>
							</div>
						</div> -->
						<div class="col-lg-12">
							<div class="sidebar-item recent-posts">
								<div class="sidebar-heading">
									<h2>Recent Posts</h2>
								</div>
								<div class="content">
									<ul>
										<li>
											<a href="post-details.html">
												<h5>Vestibulum id turpis porttitor sapien facilisis scelerisque</h5>
												<span>May 31, 2020</span>
											</a>
										</li>
										<li>
											<a href="post-details.html">
												<h5>Suspendisse et metus nec libero ultrices varius eget in risus</h5>
												<span>May 28, 2020</span>
											</a>
										</li>
										<li>
											<a href="post-details.html">
												<h5>Swag hella echo park leggings, shaman cornhole ethical coloring</h5>
												<span>May 14, 2020</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="sidebar-item categories">
								<div class="sidebar-heading">
									<h2>Categories</h2>
								</div>
								<div class="content">
									<ul>
										<?php foreach ($news_categories as $key => $category) { ?>
											<li><a href="#"> - <?= $category->name ?></a></li>
										<?php } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?php $this->load->view('layouts/footer'); ?>
