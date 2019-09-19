<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Plum_Village
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-post index-item index-small'); ?>>
	<div class="row">
		<?php if(has_post_thumbnail()) : ?>
		<div class="col-2 col-md-3"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a></div>
		<div class="col-10 col-md-9">
		<?php else : ?>
		<div class="col-md-12">
		<?php endif; ?>
			<header class="entry-header"> 
					<div class="entry-meta">
						<?php
						plumvillage_posted_on();
						?>
					</div><!-- .entry-meta -->
				<?php
					the_title( '<p><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></p>' );

				if ( 'post' === get_post_type() ) :
					?>
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php if(get_comments_number() > 0) : ?>
				<footer class="entry-footer">
					<a href="<?php the_permalink(); ?>#comments"><span class="icon icon-reply"></span><?php echo get_comments_number() . ' ' . __('responses', 'plumvillage'); ?></a>			
				</footer>
			<?php endif; ?>			
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
