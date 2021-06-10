<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amber-ic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-63031234-2"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-63031234-2');
	</script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'amber-ic' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<a href="/"><img src="/wp-content/themes/amber-ic/images/logo.png" width="211" border="0" alt="AMBER Alert in Indian Country" /></a>
		</div><!-- .site-branding -->

		<div class="menu-container">
			<div><nav id="site-navigation" class="main-navigation">
				<button class="menu-toggle mobile-menu" aria-controls="primary-menu" aria-expanded="false">Menu</button>
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
				?>
			</nav><!-- #site-navigation --></div>
		</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
