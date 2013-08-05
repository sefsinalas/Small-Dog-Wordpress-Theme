<?php get_header(); ?>
	
	<!-- section -->
	<section role="main">
	
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		
		<!-- article -->
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php if(function_exists('rdfa_breadcrumb')){ rdfa_breadcrumb(); } ?>
			
			
			<!-- post title -->
			<h1>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
			</h1>
			<!-- /post title -->

			<!-- Adsense -->
			<div class="centrado"><?php echo mostrar_adsense_1(); ?></div>			
			<!-- /Adsense -->

			<!-- Social -->
			<ul class="social_share">
				<li title="Compartir en Facebook"><a href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php the_permalink();?>&p[title]=<?php the_title();?>" class="facebook"><i class="icon-facebook-circled"></i></a></li>
				<li title="Compartir en Twitter"><a href="http://twitter.com/home?status=Interesante:%20<?php the_title();?>%20%3E%3E%20<?php the_permalink();?>" class="twitter"><i class="icon-twitter-circled"></i></a></li>
				<li title="Compartir en Google+"><a href="https://plus.google.com/share?url=<?php the_permalink();?>" class="plusone"><i class="icon-gplus-circled"></i></a></li>
			</ul>
			<!-- /Social -->

			<?php the_content(); // Dynamic Content ?>

			<!-- Adsense -->
			<div class="centrado"><?php echo mostrar_adsense_2(); ?></div>
			<!-- /Adsense -->
			
			<!-- Relacionados -->
			<h4>Articulos relacionados</h4>
			<?php relacionados(5); ?>
			<!-- /Relacionados -->
			
			<div class="row post-data">
				<span class="post-data"><i class="icon-user-1"></i> <?php _e( 'Escrito por', 'html5blank' ); ?> <?php the_author_posts_link(); ?></span>
				<span class="post-data">
					<i class="icon-th-list"></i><?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', ''); // Separated by commas with a line break at the end ?>	
				</span>
				<span class="post-data"><i class="icon-calendar"></i><?php the_time('F j, Y'); ?></span>
				<span class="post-data">
					<i class="icon-th-list"></i><?php _e( 'Categorias: ', 'html5blank' ); the_category(', '); // Separated by commas ?>	
				</span>			
			</div>
			
			
			<?php edit_post_link(); // Always handy to have Edit Post Links available ?>
			
			<?php comments_template(); ?>
			
		</article>
		<!-- /article -->
		
	<?php endwhile; ?>
	
	<?php else: ?>
	
		<!-- article -->
		<article>
			
			<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
			
		</article>
		<!-- /article -->
	
	<?php endif; ?>
	
	</section>
	<!-- /section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>