<div class="sidebar">
	<div class="row">
		<div class="col-lg-12">
			<div class="sidebar-item categories">
				<div class="sidebar-heading">
					<h2>Categories</h2>
				</div>
				<div class="content">
					<ul>
						<?php foreach ($news_categories as $key => $category) { ?>
							<li><a href=" <?= base_url() . 'article/' . $category->slug ?>"> - <?= $category->name ?></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
