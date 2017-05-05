<?php
/**
 * @package WordPress
 * @subpackage studio5A2 Theme
 *
 * @author studio5A2
 */
?>

<aside role="complementary">
<?php if( is_active_sidebar('sidebar') ): ?>
	<ul class="widgets">
		<?php dynamic_sidebar('sidebar'); ?>
	</ul>
<?php endif; ?>
</aside>
