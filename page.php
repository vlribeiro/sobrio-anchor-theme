<?php theme_include('header'); ?>

<main class="container">
	<article>
		<header>
			<h1>
				<?php echo page_title(); ?>
			</h1>
		</header>

		<?php echo page_content(); ?>
	</article>
</main>

<?php theme_include('footer'); ?>