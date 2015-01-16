		<footer>
			<small>
				<?php echo date('Y'); ?> - <?php echo site_name(); ?>.
			</small>

			<ul role="navigation">
				<li>
					<a href="<?php echo rss_url(); ?>">RSS</a>
				</li>

				<?php if(twitter_account()): ?>
					<li>
						<a href="<?php echo twitter_url(); ?>">
							@<?php echo twitter_account(); ?>
						</a>
					</li>
				<?php endif; ?>

				<li>
					<a href="<?php echo base_url('admin'); ?>" title="Área de administração">Admin</a>
				</li>

				<li>
					<a href="<?php echo base_url(); ?>" title="Início">Home</a>
				</li>
			</ul>
		</footer>
    </body>
</html>
