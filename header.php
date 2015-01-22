<!DOCTYPE html>
<html>
	<head>
		<title>
			<?php echo page_title("Ops! Página não encontrada.")?> - <?php echo site_name(); ?>
		</title>

		<!-- Assets -->
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo theme_url('css/reset.css'); ?>">
		<link rel="stylesheet" href="<?php echo theme_url('css/style.css'); ?>">

		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo rss_url(); ?>">
		<link rel="shortcut icon" href="<?php echo theme_url('img/favicon.png'); ?>">

		<script src="<?php echo theme_url('/js/vendor/zepto.min.js'); ?>"></script>
		<script>var base = '<?php echo theme_url(); ?>';</script>
		<script src="<?php echo theme_url('/js/main.js'); ?>"></script>

		<!-- Meta -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no">
	    <meta name="generator" content="Anchor CMS">

	    <!-- OG -->
	    <meta property="og:title" content="<?php echo site_name(); ?>">
	    <meta property="og:type" content="website">
	    <meta property="og:url" content="<?php echo e(current_url()); ?>">
	    <meta property="og:image" content="<?php echo article_custom_field('featured-image') ? '//' . $_SERVER['SERVER_NAME'] . article_custom_field('featured-image') : theme_url('img/og_image.gif'); ?>">
	    <meta property="og:site_name" content="<?php echo site_name(); ?>">
	    <meta property="og:description" content="<?php echo site_description(); ?>">

	    <?php if(customised()): ?>
		    <!-- Custom CSS -->
    		<style><?php echo article_css(); ?></style>

    		<!--  Custom Javascript -->
    		<script><?php echo article_js(); ?></script>
		<?php endif; ?>
	</head>
	<body class="<?php echo body_class(); ?>">
		<div class="search-form" role="dialog" aria-labelledby="search-legend">
			<button class="close-button">
				x
			</button>

			<form id="search" action="<?php echo search_url(); ?>" method="post">
				<fieldset>
					<legend id="search-legend">
						Pesquisar
					</legend>

					<input type="search" id="term" name="term" placeholder="Digite o termo e aperte enter..." value="<?php echo search_term(); ?>" tabindex="1">
					
					<button class="search-button" type="submit">
						Pesquisar
					</button>
				</fieldset>
			</form>
		</div>

		<header class="main-header">
			<a id="logo" href="<?php echo base_url(); ?>" title="<?php site_description(); ?>">
				<?php echo site_name(); ?>
			</a>

			<button>
				<i class="fa fa-search"></i>
			</button>

			<?php if(has_menu_items()): ?>
				<nav role="navigation">
					<ul>
						<?php while(menu_items()): ?>
							<li <?php echo (menu_active() ? 'class="active"' : ''); ?>>
								<a href="<?php echo menu_url(); ?>" title="<?php echo menu_title(); ?>">
									<?php echo menu_name(); ?>
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				</nav>
			<?php endif; ?>
		</header>