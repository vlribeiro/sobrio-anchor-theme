<?php theme_include('header'); ?>

<main class="content">
	<article>
		<div class="page-header">
			<h1>
				<?php echo page_title(); ?>
			</h1>
		</div>

		<article class="article-content">
			<?php echo page_content(); ?>
		</article>
	</article>
</main>

<?php theme_include('footer'); ?>