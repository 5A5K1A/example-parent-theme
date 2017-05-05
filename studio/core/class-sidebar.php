<?php
/**
 * Abstract Sidebar class to define number of columns & widgetareas
 */
abstract class Sidebar extends Master {

	/**
	 * Required variables
	 */
	protected $columnAmount;
	protected $className;
	protected $name;
	protected $template; // name of template file
	protected $args;

	/**
	 * Required method to register the sidebar
	 */
	public function Register_Sidebar() {

		$count = $this->columnAmount;

		if( function_exists('register_sidebar') ) {

			// +1, counting from 1
			for( $i = 1; $i < ( $count + 1); $i++ ) {

				$args = array(
					'id'            => $this->GetId( $i ),
					'name'          => __($this->name.' '.$i, 'studio'),
					'description'   => '',
					'class'         => '',
					'before_widget' => '<li id="%1$s" class="widget %2$s '.$this->className.'">',
					'after_widget'  => '</li>',
					'before_title'  => '<h3>',
					'after_title'   => '</h3>',
				);

				// combine arrays
				if( !is_array($this->args) ) {
					$this->args = array();
				}
				$args = array_replace_recursive( $args, $this->args );

				register_sidebar($args);
			}
		}
	}

	/**
	 * Gets the identifier.
	 * @param 	int 	$id 	The identifier
	 * @return 	string			A unique identifier for this sidebar
	 */
	public function GetId( $id ) {
		return sanitize_title( $this->name ).'-'.$id;
	}

	/**
	 * Renders the output.
	 */
	public static function GetOutput() {

		// get sidebar instance
		if( isset($this) ) {
			$oSidebar = $this;

		} else {
			$oSidebar = self::GetInstance();
		}

		// loop columns
		for( $i = 1; $i <= $oSidebar->GetColumnAmount(); $i++ ) {
			Template::Render( $oSidebar->template, array('sidebar' => $oSidebar->GetId($i), 'count' => $i) );
		}
	}

	/**
	 * Gets the column amount.
	 * @return 	int 	The column amount.
	 */
	public function GetColumnAmount() {
		return $this->columnAmount;
	}
}