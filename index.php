<?php
/**
 * @package WordPress
 * @subpackage studio5A2 Theme
 *
 * @author studio5A2
 */

get_header();

get_template_part( 'content', (get_post_format()) ? get_post_format() : get_post_type()  );

get_sidebar();

get_footer();