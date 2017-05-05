<?php
	$sNewerEntries = __('Newer Entries', 'studio').' &raquo;';
	$sOlderEntries = '&laquo; '.__('Older Entries', 'studio');
?>

<nav class="page-navigation">
	<div class="prev-link"><?php next_posts_link( $sOlderEntries); ?></div>
	<div class="next-link"><?php previous_posts_link( $sNewerEntries ); ?></div>
</nav>
