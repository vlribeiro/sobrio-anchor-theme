<?php theme_include('header'); ?>

	<h1>
		Resultados de pesquisa por "<?php echo search_term(); ?>":
	</h1>

	<?php if (has_search_results()): ?>
		<ul class="items">
			<?php $i = 0; while(search_results()): $i++; ?>
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

		<?php if(has_pagination()): ?>
			<nav class="pagination">
				<?php if (search_next()): ?>
					<div>
						<i class="fa fa-arrow-circle-left"></i>
						<?php echo search_next('Pŕoximos'); ?>
					</div>
				<?php endif; ?>
				<?php if (search_prev()): ?>
					<div>
						<?php echo search_prev('Anteriores'); ?>
						<i class="fa fa-arrow-circle-right"></i>
					</div>
				<?php endif; ?>
			</nav>
		<?php endif; ?>

	<?php else: ?>
		<p>
			Infelizmente, não encontrei nenhum resultado para "<?php echo search_term(); ?>". Você pode tentar um termo diferente...
		</p>
	<?php endif; ?>

<?php theme_include('footer'); ?>