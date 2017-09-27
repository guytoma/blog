<?php get_header(); ?>

<div id="main-content">
	<div class="container">
		<div id="content-area" class="clearfix">
			<div id="left-area">
<!-- Begin uitgelichte posts -->
<div id="uitgelicht">
	<div id="hoofdpost">
		<?php query_posts('posts_per_page=1&cat=2553,2567'); /*1, 2*/
		if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
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
		<?php endwhile; ?> <?php wp_reset_query(); /*4*/ ?>
	</div>
</div><!-- eind uitgelichte post -->
<!-- begin laatste posts -->
<div id="laatsteposts">
	<?php rewind_posts(); ?>
	<?php query_posts('post_type=post&paged='.$paged.'&cat=-2553,-2567');  ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="post">
			<a href="<?php the_permalink(); ?>">
				<div class="imageholder">
					<img src="<?php the_post_thumbnail_url(); ?> ">
				</div>
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
