<?php
/**
 * Extendable Taxonomy class
 */
class Taxonomy extends Master {

	/**
	 * Required variables
	 */
	protected $taxonomy;
	protected $label_name 	= __('Categories', 'studio');
	protected $label_name_singular = __('Category', 'studio');
	protected $aPostTypes 	= array();
	protected $args 		= array();

	/**
	 * Class constructor
	 */
	public function __construct( $idOrTerm = null ) {

		// term object
		if( is_object($idOrTerm) ) {
			$this->term = $idOrTerm;
			$this->id = $this->term->term_id;
		}

		// id
		elseif( is_numeric($idOrTerm) ) {
			$this->id = $idOrTerm;
			$this->term = get_term($this->id);
		}
	}

	/**
	 * Get a variable from the term object
	 */
	public function Get( $value ) {
		return $this->term->$value;
	}

	/**
	 * Required method to register the custom post type
	 */
	protected function Register_Taxonomy() {

		// set labels
		$label_name          	= $this->label_name;
		$label_name_singular 	= $this->label_name_singular;
		$taxonomy           	= $this->taxonomy;

		// default
		$label_name_lc          = mb_strtolower( $label_name );
		$label_name_singular_lc = mb_strtolower( $label_name_singular );

		$args = array(
			'labels' 					=> array(
				'name' 						 => _x( $label_name, 'Taxonomy General Name', 'studio' ),
				'singular_name'              => _x( $label_name_singular, 'Taxonomy Singular Name', 'studio' ),
				'menu_name'                  => __( $label_name, 'studio' ),
				'all_items'                  => __( 'All '.$label_name_lc, 'studio' ),
				'parent_item'                => __( 'Parent '.$label_name_singular_lc, 'studio' ),
				'parent_item_colon'          => __( 'Parent '.$label_name_singular_lc, 'studio' ),
				'new_item_name'              => __( 'New '.$label_name_singular_lc, 'studio' ),
				'add_new_item'               => __( 'New '.$label_name_singular_lc, 'studio' ),
				'edit_item'                  => __( 'Edit '.$label_name_singular_lc, 'studio' ),
				'update_item'                => __( 'Update '.$label_name_singular_lc, 'studio' ),
				'separate_items_with_commas' => __( 'Seperate items with a comma', 'studio' ),
				'search_items'               => __( 'Search '.$label_name_lc, 'studio' ),
				'add_or_remove_items'        => __( 'Add items or remove them', 'studio' ),
				'choose_from_most_used'      => __( 'Choose from the most used items', 'studio' ),
				'not_found'                  => __( 'No '.$label_name_lc.' found', 'studio' ),
			),
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => array(
				'slug'                       => $taxonomy,
				'with_front'                 => true,
				'hierarchical'               => true,
			),
		);

		// combine arrays
		if( !is_array($this->args) ) { $this->args = array(); }
		$args = array_replace_recursive( $args, $this->args );

		// register
		register_taxonomy( $taxonomy, $this->aPostTypes, $args );
	}
}