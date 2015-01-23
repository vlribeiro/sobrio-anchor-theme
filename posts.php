<?php theme_include('header'); ?>

<section class="content">

	<h2 class="section-content">
		<?php echo page_title(); ?>
	</h2>

	<?php if(has_posts()): ?>

		<ul id="posts-list">
			<?php while(posts()): ?>
				<li <?php echo article_custom_field('featured-image') ? 'class="has-featured-image"' : '' ?>>
					<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>">
						<div class="posts-list-image">
							<?php if (article_custom_field('featured-image')) : ?>
								<img src="<?php echo article_custom_field('featured-image') ?>" class="header-featured-image">
							<?php endif ?>
						</div>

						<article>
							<h3>
								<?php echo article_title(); ?>
							</h3>

							<div class="description">
								<?php echo article_description(); ?>
							</div>

							<footer>
								<time datetime="<?php echo date(DATE_W3C, article_time()); ?>">
									<i class="fa fa-calendar"></i>
									há <?php echo relative_time(article_time()); ?>
								</time>
								<span>
									<i class="fa fa-user"></i>
									por <?php echo article_author('real_name'); ?>
								</span>
								<span>
									<i class="fa fa-clock-o"></i>
									tempo de leitura: <?php echo estimated_reading_time(article_markdown()); ?>
								</span>
							</footer>
						</article>
					</a>
				</li>
			<?php endwhile; ?>
		</ul>

		<?php if(has_pagination()): ?>
			<nav class="pagination">
				<?php if (posts_next()): ?>
					<div class="newer">
						<i class="fa fa-arrow-circle-left"></i>
						<?php echo posts_next('Mais novos'); ?>
					</div>
				<?php endif; ?>
				<?php if (posts_prev()): ?>
					<div class="older">
						<?php echo posts_prev('Mais antigos'); ?>
						<i class="fa fa-arrow-circle-right"></i>
					</div>
				<?php endif; ?>
			</nav>
		<?php endif; ?>

	<?php else: ?>
	<?php endif; ?>

</section>

<?php theme_include('footer'); ?>
