<?php theme_include('header'); ?>

<section class="content">

	<h2>
		<?php echo page_title(); ?>
	</h2>

	<?php if(has_posts()): ?>

		<ul id="posts-list">
			<?php while(posts()): ?>
				<li>
					<article>
						<h3>
							<a href="<?php echo article_url(); ?>" title="<?php echo article_title(); ?>">
								<?php echo article_title(); ?>
							</a>
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
				</li>
			<?php endwhile; ?>
		</ul>

	<?php else: ?>
	<?php endif; ?>

</section>

<?php theme_include('footer'); ?>