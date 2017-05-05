<?php if( function_exists('get_fields') ) :
	$aOptionData['twitter'] 	= get_field('social_twitter', 'option');
	$aOptionData['facebook'] 	= get_field('social_facebook', 'option');
	$aOptionData['instagram'] 	= get_field('social_instagram', 'option');
	$aOptionData['pinterest'] 	= get_field('social_pinterest', 'option');
	$aOptionData['youtube'] 	= get_field('social_youtube', 'option');
	$aOptionData['linkedin'] 	= get_field('social_linkedin', 'option');
	$aOptionData['google'] 		= get_field('social_google', 'option');
?>

<ul class="social-media-links">

<?php
foreach( $aOptionData as $sSocialMedia => $sSocialLink ) :
	if( !empty($sSocialLink) ) :
?>

	<li>
		<a href="<?php echo $sSocialLink; ?>">
			<span class="socicon socicon-<?php echo $sSocialMedia; ?>" title="<?php echo __('Follow', 'studio').' '; bloginfo('name'); echo ' '.__('on', 'studio').' '.ucfirst($sSocialMedia); ?>">
				<span class="sr-only "><?php echo ucfirst( $sSocialMedia ); ?></span>
			</span>
		</a>
	</li>

<?php
	endif;
endforeach;
?>

</ul>

<?php endif; ?>
