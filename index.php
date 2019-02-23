<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400" rel="stylesheet">
	<?php wp_head() ?>
	<script>
		function toggleMenu() {
			var element = document.getElementById("nav-items");
			element.classList.toggle("show");
		}
	</script>
</head>
<body>

	<div id="navbar">
		<div id="logo"><a href="/"><img width="200" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/logo_toftawebb_white.png" alt="🚐 Tofta Webbyrå" /></a></div>
		<div id="show-menu"><a href="#" onClick="toggleMenu()"><img src="data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjUiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNSAyNCIgdmVyc2lvbj0iMS4xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIj4KPGcgZmlsbD0ibm9uZSI+CjxwYXRoIGQ9Ik0gMCAwTCAyNSAwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDIxKSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSI1Ii8+CjxwYXRoIGQ9Ik0gMCAwTCAyNSAwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDEyKSIgc3Ryb2tlPSJ3aGl0ZSIgc3Ryb2tlLXdpZHRoPSI1Ii8+CjxwYXRoIGQ9Ik0gMCAwTCAyNSAwIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwIDMpIiBzdHJva2U9IndoaXRlIiBzdHJva2Utd2lkdGg9IjUiLz4KPC9nPgo8L3N2Zz4K" /></a></div>
	</div>

	<div id="nav-items">
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
	</div>
	
	<div id="content">
		
		<?php if (is_front_page()): ?>

		<div id="cta-top">
			<style>
			#top-image {
				background-image: url('<?php the_post_thumbnail_url(); ?>');
			}
			</style>
			<div id="top-image"></div>
			<div id="cta-container">
			<div id="cta-copy">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; endif; ?>
			</div>
			</div>
		</div>
		<iframe class="map" width="100%" height="350" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBPPMOQVTT8zHWbgtRkfZLOAZzzYoA7Wb4&q=Tofta%20Webbyrå&zoom=9" allowfullscreen></iframe>


		<div class="boxes">
		
		<?php 
		$args = array(
			'post_type' => 'page',
			'orderby' => 'menu_order',
			'order' => 'asc',
			'post_parent' => 0,
			'posts_per_page' => 3,
			'offset' => 1
		);
		
		$the_query = new WP_Query( $args );
		?>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
		
			<div class="infobox">
				<?php the_post_thumbnail('medium_large', ['class' => 'infobox-preview']); ?>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<p><?php the_excerpt(); ?></p>
				<p>➽ <a href="<?php the_permalink() ?>"><?php echo get_post_meta(get_the_ID(), 'cta', true); ?>...</a></p>
			</div>

		<?php
		endwhile;
		wp_reset_postdata();
		?>
		
		</div>

		<?php else: ?>
			<?php the_post_thumbnail('medium_large', ['class' => 'feat-img']); ?>
			<article>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; endif; ?>
			</article>
		<?php endif; ?>

	</div>
	
	<footer>
			
		<img class="by-me" src="<?php echo get_bloginfo('stylesheet_directory'); ?>/jakob.jpg" alt="Jakob Nanneson" width="150" height="150" />
			
		<div class="footer-text">
			<p><strong>Tofta Webbyrå</strong><br>
			Jakob Nanneson</p>
			
			<p><a href="javascript:smae_decode('aW5mb0B0b2Z0YXdlYmIuc2U=');">info@toftawebb.se</a><br>
			tel. 075-760 17 00</p>
			
			<p>➽ <strong><a href="https://toftawebb.drift.com/jakob?schedule">Boka möte</a></strong></p>
		</div>
	</footer>
	<?php wp_footer() ?>
</body>
</html>
