<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Plum_Village
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('index-event index-item center-with-border'); ?>>
	<div class="row">
		<?php if(has_post_thumbnail()) : ?>
		<div class="col-12"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('landscape'); ?></a></div>
		<div class="col-12">
		<?php else : ?>
		<div class="col-md-12">
		<?php endif; ?>
			<header class="entry-header">
			<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p><?php echo get_the_limited_excerpt(get_the_ID(), 50); ?></p>
			</div><!-- .entry-content -->			

			<?php if(have_rows('dates', get_the_ID())) : ?>
				<?php while( have_rows('dates', get_the_ID()) ): the_row(); ?>
					<div>
					<?php
					$date = new DateTime(get_sub_field('date', false));
					$locations = get_sub_field('location');
					echo $date->format('M j, Y');
					$i = 0;
					foreach($locations as $location) {
						echo $location->name; 
						$i++;
					}
				?>
				</div>
				<?php endwhile; ?>


			<?php endif; ?>

			<?php if(get_comments_number() > 0) : ?>
				<footer class="entry-footer">
					<a href="<?php the_permalink(); ?>#comments"><span class="icon icon-reply"></span><?php echo get_comments_number() . ' ' . __('responses', 'plumvillage'); ?></a>			
				</footer>
			<?php endif; ?>			
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
