<?php
/**
 * @package WordPress
 * @subpackage studio5A2 Theme
 *
 * @author studio5A2
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php get_template_part('head', 'icons'); ?>

  		<!-- styles and scripts enqueued in functions.php -->
		<?php wp_head(); ?>

		<!--[if lt IE 9]>
			<script type="text/javascript" src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<!--
			This website is developed by:
			studio5A2 (http://5A2.nl/)
		-->
	</head>
	<body <?php body_class(); ?>>
		<?php Template::Render('site-header'); ?>