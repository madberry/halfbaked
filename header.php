<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main-wrapper">
 *
 * @package WordPress
 * @subpackage Half_Baked_Base
 * @since Half-Baked Base 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?><?php echo bloginfo( 'name' ); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div id="wrapper" class="hfeed">
		<header id="site-header">
			<aside class="header-widget">
				<?php dynamic_sidebar( 'header-widget' ); ?>
			</aside>

			<hgroup>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>


		<nav id="site-navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>
		</nav>
	</header><!-- #site-header-->

	<div id="main-wrapper">
	 <!--	 End Header	  -->