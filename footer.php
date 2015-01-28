		<footer class="footer">
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

				<?php if(facebook_account()): ?>
					<li>
						<a href="<?php echo facebook_url(); ?>">
							<?php echo facebook_account(); ?> no Facebook
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

			<span class="anchor-footer">
				<img src="<?php echo theme_url('img/anchor.png'); ?>" alt="Anchor CMS logo">
				Desenvolvido utilizando <a href="http://anchorcms.com/">Anchor CMS</a>
			</div>
		</footer>

		<script type="text/javascript">
			ba.init();
		</script>
    </body>
</html>
