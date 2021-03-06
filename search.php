<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Plum_Village
 */

get_header();
?>

<div class="container">
	<div class="row">
		<div class="col-md-9">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					global $wp_query;
					/* translators: %s: search query. */
					printf( esc_html__( 'Search results for %s', 'plumvillage' ), '“<span>' . get_search_query() . '</span>”' );
					?>
				</h1>
				<h3><?php printf( '%s Results', $wp_query->found_posts); ?></h3>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/index-search', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</div>
	</div>
</div>

<?php
get_sidebar();
get_footer();
