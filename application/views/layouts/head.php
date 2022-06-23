<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="TemplateMo">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

	<title>Stand CSS Blog by TemplateMo</title>

	<!-- Bootstrap core CSS -->
	<link href="<?= base_url(); ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


	<!-- Additional CSS Files -->
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/fontawesome.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/templatemo-stand-blog.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.css">
	<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
</head>

<body>

	<!-- ***** Preloader Start ***** -->
	<div id="preloader">
		<div class="jumper">
			<div></div>
			<div></div>
			<div></div>
		</div>
	</div>
	<!-- ***** Preloader End ***** -->

	<!-- Header -->
	<header class="">
		<nav class="navbar navbar-expand-lg">
			<div class="container">
				<a class="navbar-brand" href="<?= base_url(); ?>">
					<h2>Personal Blog<em>.</em></h2>
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarResponsive">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item <?= $this->uri->segment(1) == 'home' ? 'active' : '' ?>">
							<a class="nav-link" href="<?= base_url(); ?>home">
								Home
							</a>
						</li>
						<?php foreach ($news_categories as $key => $category) { ?>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url() . 'article/' . $category->slug ?>"><?= $category->name ?></a>
							</li>
							<?php if ($key === 2) break; ?>
						<?php } ?>
					</ul>
				</div>
			</div>
		</nav>
	</header>
