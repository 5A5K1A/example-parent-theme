<?php
/**
 * Skeleton class for contact info.
 */
class Skeleton_ContactInfo {

	public static function Register() {

		if( function_exists('register_field_group') ) {

			// main settings for wrapper
			$aWrapper = array (
				'width' => '',
				'class' => '',
				'id' 	=> '',
			);

			// main settings for social fields
			$aContactField = array (
				'prefix' 		=> '',
				'instructions' 	=> '',
				'required' 		=> 0,
				'conditional_logic' => 0,
				'wrapper' 		=> $aWrapper,
				'default_value' => '',
				'placeholder' 	=> '',
				'append' 		=> '',
				'prepend' 		=> '',
				'maxlength' 	=> '',
				'readonly' 		=> 0,
				'disabled' 		=> 0,
			);

			$aAddress = $aContactField + array (
				'key' 		=> 'field_5a21000000001',
				'type' 		=> 'textarea',
				'label'		=> __('Address', 'studio'),
				'name' 		=> 'contact_address',
				'rows' 		=> '2',
				'new_lines' => 'wpautop',
			);

			$aPhone = $aContactField + array (
				'key' 		=> 'field_5a21000000002',
				'type' 		=> 'text',
				'label'		=> __('Phone', 'studio'),
				'name' 		=> 'contact_phone',
			);

			$aEmail = $aContactField + array (
				'key' 		=> 'field_5a21000000003',
				'type' 		=> 'text',
				'label'		=> __('Email', 'studio'),
				'name' 		=> 'contact_email',
			);

			$aBTWnumber = $aContactField + array (
				'key' 		=> 'field_5a21000000004',
				'type' 		=> 'text',
				'label'		=> __('BTW number', 'studio'),
				'name' 		=> 'contact_btw',
			);

			$aKVKnumber = $aContactField + array (
				'key' 		=> 'field_5a21000000005',
				'type' 		=> 'text',
				'label'		=> __('KvK number', 'studio'),
				'name' 		=> 'contact_kvk',
			);

			$aLocation = $aContactField + array (
				'key' 		=> 'field_5a21000000006',
				'type' 		=> 'google_map',
				'label'		=> __('Position on the map', 'studio'),
				'name' 		=> 'contact_location',
				'center_lat' => '52.3',
				'center_lng' => '5.2',
				'zoom' 		=> '7',
				'height' 	=> '300',
			);

			register_field_group( array (
				'key' 			=> 'group_5a2c0174c70000',
				'title' 		=> 'Contact Info',
				'fields' 		=> array (
					$aAddress,
					$aPhone,
					$aEmail,
					$aBTWnumber,
					$aKVKnumber,
					$aLocation,
				),
				'location' 		=> array (
					array (
						array (
							'param' 	=> 'options_page',
							'operator' 	=> '==',
							'value' 	=> 'studio-contact-info',
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