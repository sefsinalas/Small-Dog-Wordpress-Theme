			<!-- footer -->
			<footer class="footer" role="contentinfo">
				
				<div class="menu">
					<?php html5blank_nav_footer(); ?>
				</div>
				<!-- copyright -->
				<p class="copyright">
					&copy; <?php echo date("Y"); ?> Copyright <?php bloginfo('name'); ?>. Desarrollado por <a href="http://federicosantillan.com.ar" rel="nofollow" target="_blank">Perro</a>.
				</p>
				<!-- /copyright -->
				
			</footer>
			<!-- /footer -->
		
		</div>
		<!-- /wrapper -->

		<?php wp_footer(); ?>
		
		
		<?php if (mostrar_analytics()!=''):?>
		<!-- analytics -->
		<script>
			var _gaq=[['_setAccount','<?php echo mostrar_analytics() ?>'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)})(document,'script');
		</script>		
		<?php endif; ?>

		<script src='<?php echo get_template_directory_uri().'/javascripts/zepto.min.js'; ?>'></script>
		<script src='<?php echo get_template_directory_uri().'/javascripts/app.js'; ?>'></script>
	</body>
</html>