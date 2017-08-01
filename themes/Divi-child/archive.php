<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">

<!-- begin laatste posts -->
<div id="laatsteposts">
	<?php rewind_posts(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="post">
			<a href="<?php the_permalink(); ?>">
				<img src="<?php the_post_thumbnail_url(); ?> ">
				<div class="content">
					<h2><?php the_title();/*3*/ ?></h2>
					<p><?php the_excerpt(); ?></p>
			</a>
				<div class="postmeta">
					<img src="<?php echo get_avatar_url( get_the_author_meta('ID'), 60 ) ?>">
					<p><?php the_author(); ?><br><?php the_time('j F, Y') ?></p>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
</div><!--eind laatste posts-->
<?php wpbeginner_numeric_posts_nav(); ?>
</div> <!-- #left-area -->

			<?php get_sidebar(); ?>
		</div> <!-- #content-area -->
	</div> <!-- .container -->
</div> <!-- #main-content -->

<?php get_footer(); ?>
