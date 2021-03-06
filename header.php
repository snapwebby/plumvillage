<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Plum_Village
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php the_field('google_analytics_code', 'options'); ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php the_field('google_analytics_code', 'options'); ?>', { 'anonymize_ip': true });
	</script>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'plumvillage' ); ?></a>

<button class="hamburger hamburger--squeeze menu-toggle main-menu-toggle unbutton float-left" type="button" aria-label="<?php _e('Toggle Mega Menu', 'plumvillage'); ?>" aria-controls="primary-menu" aria-expanded="false">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>

<div class="mega-menu-container hidden">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary-menu',
				'menu_class'		 => 'mega-menu-side menu'
			) );
			?>
		<h6>— <?php _e( 'Follow Plum Village', 'plumvillage' ); ?></h6>
		<?php include( locate_template( 'template-parts/social-links.php', false, false ) ); ?>
			
		<h6>— <?php _e( 'Plum Village Practice Centers', 'plumvillage' ); ?></h6>
		<div class="row">
			<?php $col = 'col-6 col-xl-4'; ?>
			<?php include( locate_template( 'template-parts/practise-centres.php', false, false ) ); ?>
		</div>
		<?php
			wp_nav_menu( array(
				'theme_location' => 'footer-menu',
				'menu_id'				 => 'footer-mega-menu',
				'menu_class'		 => 'footer-menu',
				'depth'					 => 1,
			) );
		?>
</div>
<div id="page" class="site">
	<?php $showImportantUpdate = get_field('show_important_update', 'options'); ?>
	<?php if($showImportantUpdate) : ?>
		<div class="block important-update">
			<div class="block-inside">
				<p><?php _e('Update:', 'plumvillage'); ?> <a class="has-arrow-after" href="<?php echo get_field('important_update_link', 'options')['url']; ?>"><?php the_field('important_update_text', 'options'); ?></a></p>
			</div>
		</div>
	<?php endif; ?>
	<header id="masthead" class="site-header">
		<?php if($showImportantUpdate) : ?>
			<button class="hamburger hamburger--squeeze menu-toggle secondary-menu-toggle unbutton float-left" type="button" aria-label="<?php _e('Toggle Mega Menu', 'plumvillage'); ?>" aria-controls="primary-menu" aria-expanded="false">
			  <span class="hamburger-box">
			    <span class="hamburger-inner"></span>
			  </span>
			</button>		
		<?php endif; ?>
		<nav id="site-navigation" class="main-navigation">
			<div id="top-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'primary-menu',
					'depth'					 => 1,
					'menu_class'		 => 'mega-menu-top menu'
				) );
				?>
				<a class="toggle-search" href="?s=" aria-label="<?php _e('Search', 'plumvillage'); ?>"><?php echo file_get_contents(get_stylesheet_directory().'/assets/images/search.svg'); ?></a>
				<div class="search-overlay">
					<div class="search-container">
						<div class="search-form-container"><?php get_search_form(); ?></div>
						<div class="search-results">
							<div id="circle3"></div>
						</div>	
					</div>
				</div>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'secondary-menu',
					'menu_class'		 => 'secondary-menu-top menu'
				) );
				?>
			</div>
		</nav><!-- #site-navigation -->
		<div class="container">		
			<div class="site-branding">
				<?php
				$logoWhite = get_field('logo_white', 'options');
				$logoBlack = get_field('logo_black', 'options');
				if ( is_front_page()  ) :
					?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if( !empty($logoWhite) ): ?>
							<img class="logo-white" src="<?php echo $logoWhite['url']; ?>" alt="<?php bloginfo( 'name' ); ?>"" width="<?php the_field('logo_width', 'options'); ?>" />
						<?php endif; ?>
						<?php if( !empty($logoBlack) ): ?>
							<img class="logo-black" src="<?php echo $logoBlack['url']; ?>" alt="<?php bloginfo( 'name' ); ?>"" width="<?php the_field('logo_width', 'options'); ?>" />
						<?php endif; ?>
					</a></h1>
					<?php
				else :
					?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<?php if( !empty($logoWhite) ): ?>
							<img class="logo-white" src="<?php echo $logoWhite['url']; ?>" alt="<?php bloginfo( 'name' ); ?>"" width="<?php the_field('logo_width', 'options'); ?>" />
						<?php endif; ?>
						<?php if( !empty($logoBlack) ): ?>
							<img class="logo-black" src="<?php echo $logoBlack['url']; ?>" alt="<?php bloginfo( 'name' ); ?>"" width="<?php the_field('logo_width', 'options'); ?>" />
						<?php endif; ?>
					</a></p>
					<?php
				endif;
			 	?>
			</div><!-- .site-branding -->
		</div>

	</header><!-- #masthead -->
	<div id="content" class="site-content">
