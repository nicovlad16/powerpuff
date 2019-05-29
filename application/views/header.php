<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Powerpuff - Conference management</title>
    <link rel="stylesheet" href="<?=base_url()?>application/views/css/bootstrap.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/vendors/linericon/style.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/css/responsive.css">
    <link rel="stylesheet" href="<?=base_url()?>application/views/css/custom.css">
    <?php $login = $this->session->userdata('login'); ?>
</head>
<body>
    <header class="header_area">
        <div class="main_menu">
        	<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container box_1620">
					<!-- <a class="navbar-brand logo_h" href="<?=base_url()?>"><img src="<?=base_url()?>application/views/img/logo.png" alt=""></a> -->
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="<?=base_url()?>">Home</a></li> 
							<li class="nav-item"><a class="nav-link" href="<?=base_url()?>register">Staff register</a>
							<li class="nav-item"><a class="nav-link" href="<?=base_url()?>submitter/register">Submitter register</a>
							<li class="nav-item"><a class="nav-link" href="<?=base_url()?>">Listener register</a>
						<?php if(isset($login) and !empty($login)): ?>
							<li class="nav-item submenu dropdown">
								<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account</a>
								<ul class="dropdown-menu">
									<?php if(isset($login) && $login['type'] >= 1 && $login['type'] <= 3): ?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url()?>conferences">Conferences</a></li>
										<li class="nav-item"><a class="nav-link" href="<?=base_url()?>edit_account?id=<?=$login['id']?>">Edit account</a></li>
									<?php endif; ?>
									<?php if(isset($login) && $login['type'] == 4): ?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url()?>submitter">Conferences</a></li>
										<li class="nav-item"><a class="nav-link" href="<?=base_url()?>edit_account?id=<?=$login['id']?>">Edit account</a></li>
									<?php endif; ?>
									<?php if(isset($login) && $login['type'] == 5): ?>
										<li class="nav-item"><a class="nav-link" href="<?=base_url()?>listener/edit/<?=$login['id']?>">Edit account</a></li>
									<?php endif; ?>
								</ul>
							</li>
						<?php endif; ?>
						<?php if(isset($login) and !empty($login)): ?> 
							<li class="nav-item"><a class="nav-link" href="<?=base_url()?>login/logout">Logout</a></li>
						</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="nav-item"><a href="#" class="tickets_btn">Welcome <?= $login['username'] ?></a></li>
							</ul>
						<?php else: ?>
								<li class="nav-item"><a class="nav-link" href="<?=base_url()?>login">Login</a></li>
							</ul>
						<?php endif; ?>
					</div> 
				</div>
        	</nav>
        </div>
    </header>
        
