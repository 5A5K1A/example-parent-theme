<?php
/**
 * Skeleton class for social media.
 */
class Skeleton_SocialMedia {

	public static function Register() {

		if( function_exists('register_field_group') ) {

			// main settings for wrapper
			$aWrapper = array (
				'width' => '',
				'class' => '',
				'id' 	=> '',
			);

			// main settings for social fields
			$aSocialField = array (
				'prefix' 		=> '',
				'type' 			=> 'text',
				'instructions' 	=> '',
				'required' 		=> 0,
				'conditional_logic' => 0,
				'wrapper' 		=> $aWrapper,
				'default_value' => '',
				'placeholder' 	=> '',
				'append' 		=> '',
				'maxlength' 	=> '',
				'readonly' 		=> 0,
				'disabled' 		=> 0,
			);

			$aTwitter = $aSocialField + array (
				'key' 		=> 'field_5a20000000001',
				'label'		=> 'Twitter',
				'name' 		=> 'social_twitter',
				'prepend' 	=> '<img src="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-social-twitter.svg" alt="'.$aTwitter['label'].'" width="20" />',
			);

			$aFacebook = $aSocialField + array (
				'key' 		=> 'field_5a20000000002',
				'label'		=> 'Facebook',
				'name' 		=> 'social_facebook',
				'prepend' 	=> '<img src="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-social-facebook.svg" alt="'.$aFacebook['label'].'" width="20" />',
			);

			$aInstagram = $aSocialField + array (
				'key' 		=> 'field_5a20000000003',
				'label'		=> 'Instagram',
				'name' 		=> 'social_instagram',
				'prepend' 	=> '<img src="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-social-instagram.svg" alt="'.$aInstagram['label'].'" width="20" />',
			);

			$aPinterest = $aSocialField + array (
				'key' 		=> 'field_5a20000000004',
				'label'		=> 'Pinterest',
				'name' 		=> 'social_pinterest',
				'prepend' 	=> '<img src="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-social-pinterest.svg" alt="'.$aPinterest['label'].'" width="20" />',
			);

			$aYoutube = $aSocialField + array (
				'key' 			=> 'field_5a20000000005',
				'label' 		=> 'Youtube',
				'name' 			=> 'social_youtube',
				'prepend' 		=> '<img src="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-social-youtube.svg" alt="'.$aYoutube['label'].'" width="20" />',
			);

			$aLinkedin = $aSocialField + array (
				'key' 			=> 'field_5a20000000006',
				'label' 		=> 'LinkedIn',
				'name' 			=> 'social_linkedin',
				'prepend' 		=> '<img src="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-social-linkedin.svg" alt="'.$aLinkedin['label'].'" width="20" />',
			);

			$aGoogle = $aSocialField + array (
				'key' 			=> 'field_5a20000000007',
				'label' 		=> 'Google+',
				'name' 			=> 'social_google',
				'prepend' 		=> '<img src="https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/svgs/fi-social-google-plus.svg" alt="'.$aGoogle['label'].'" width="20" />',
			);

			register_field_group( array (
				'key' 			=> 'group_5a250c14700000',
				'title' 		=> 'Social Media',
				'fields' 		=> array (
					array (
						'key' 			=> 'field_5a20000000000',
						'label' 		=> __('Let op:', 'studio'),
						'name' 			=> '',
						'prefix' 		=> '',
						'type' 			=> 'message',
						'instructions' 	=> '',
						'required' 		=> 0,
						'conditional_logic' => 0,
						'wrapper' 		=> $aWrapper,
						'message' 		=> __('Vul hier de complete url in van de social media kanalen. Dat wil zeggen inclusief https:// of http://', 'studio'),
					),
					$aTwitter,
					$aFacebook,
					$aInstagram,
					$aPinterest,
					$aYoutube,
					$aLinkedin,
					$aGoogle,
				),
				'location' 		=> array (
					array (
						array (
							'param' 	=> 'options_page',
							'operator' 	=> '==',
							'value' 	=> 'studio-social-media',
						),
					),
				),
				'menu_order' 	=> 0,
				'position' 		=> 'normal',
				'style' 		=> 'seamless',
				'label_placement' => 'left',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
			));
		}
	}
}