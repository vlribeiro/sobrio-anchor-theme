<?php theme_include('header'); ?>

	<section class="content" id="article-<?php echo article_id(); ?>">

		<article>
			<header <?php if (article_custom_field('featured-image')) : ?> class="article-header featured-image" <?php else: ?> class="article-header" <?php endif ?> >
				<h1>
					<?php echo article_title(); ?>
				</h1>

				<section class="article-description">
					<?php echo article_description(); ?>
				</section>

				<div>
					<time class="article-meta" datetime="<?php echo date(DATE_W3C, article_time()); ?>">
						<i class="fa fa-calendar"></i>
						há <?php echo relative_time(article_time()); ?>
					</time>
					<span class="article-meta">
						<i class="fa fa-user"></i>
						por <?php echo article_author('real_name'); ?>
					</span>
					<span class="article-meta">
						<i class="fa fa-folder-o"></i>
						em <a href="<?php echo article_category_url(); ?>"><?php echo article_category(); ?></a>
					</span>
					<span class="article-meta">
						<i class="fa fa-clock-o"></i>
						tempo de leitura: <?php echo estimated_reading_time(article_markdown()); ?>
					</span>
				</div>

				<?php if (article_custom_field('featured-image')) : ?>
					<img src="<?php echo article_custom_field('featured-image') ?>" class="header-featured-image">
				<?php endif ?>
			</header>

			<section class="article-content">
				<?php echo article_markdown(); ?>
			</section>
		</article>

		<nav class="pagination">
			<?php if (article_next_url()): ?>
				<div class="newer">
					<a class="article-next" href="<?php echo article_next_url() ?>">
						<i class="fa fa-chevron-circle-left"></i>
						mais recente
					</a>
				</div>
			<?php endif; ?>
			<?php if (article_previous_url()): ?>
				<div class="older">
					<a class="article-previous" href="<?php echo article_previous_url() ?>">
						mais antigo
						<i class="fa fa-chevron-circle-right"></i>
					</a>
				</div>
			<?php endif; ?>
		</nav>
	</section>

	<?php if(comments_open()): ?>
		<section class="comments">
			<?php if (site_meta('disqus_shortname')) : ?>
			    <div id="disqus_thread"></div>

				<script type="text/javascript">
					/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
					var disqus_shortname = '<?php echo site_meta('disqus_shortname'); ?>';

					/* * * DON'T EDIT BELOW THIS LINE * * */
					(function() {
						var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
						dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
						(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
					})();
				</script>
				<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
			<?php else : ?>
				<span class="comments-section-title">
					Comentários
				</span>

				<form id="comment" class="commentform" method="post" action="<?php echo comment_form_url(); ?>#comment">
					<?php echo comment_form_notifications(); ?>

					<p class="name">
						<label for="name">Nome:</label>
						<?php echo comment_form_input_name('placeholder="Seu nome"'); ?>
					</p>

					<p class="email">
						<label for="email">E-mail:</label>
						<?php echo comment_form_input_email('placeholder="Seu e-mail (não será publicado)"'); ?>
					</p>

					<p class="textarea">
						<label for="text">Comentário:</label>
						<?php echo comment_form_input_text('placeholder="Seu comentário"'); ?>
					</p>

					<p class="submit">
						<?php echo comment_form_button('Comentar'); ?>
					</p>
				</form>

				<?php if(has_comments()): ?>
					<ul class="commentlist">
						<?php $i = 0; while(comments()): $i++; ?>
							<li class="comment" id="comment-<?php echo comment_id(); ?>">
								<div>
									<h2>
										<img src="<?php echo "http://www.gravatar.com/avatar/" . md5(strtolower(trim(comment_email()))) . "?d=" . urlencode("teste.jpg") . "&s=60"; ?>" />
										<?php echo comment_name(); ?>
									</h2>

									<time>
										<?php echo relative_time(comment_time()); ?>
									</time>

									<div class="comment-content">
										<?php echo strip_empty_paragraphs(nl2p(comment_text(), false)); ?>
									</div>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			<?php endif; ?>
		</section>
	<?php endif; ?>

<?php theme_include('footer'); ?>
