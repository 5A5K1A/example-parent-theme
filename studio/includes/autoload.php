<?php
/**
 * studio5A2 Autoload class
 */

class Studio_AutoLoad {

	/**
	 * Init the class and try several subdirs
	 * @param 	string 	$orgClassName 	The original class name
	 */
	public static function Init( $orgClassName ) {

		// build array with subdirs: Loop for overrides in child theme - Then loop parent theme
		$aSubdirs = array(
			get_stylesheet_directory().'/studio/classes',
			get_template_directory().'/studio/classes',
			get_template_directory().'/studio/core',
		);

		// try subdirs in chronological order
		foreach( $aSubdirs as $subDir ) {
			if( self::TryLoad($orgClassName, $subDir) ) {
				break;
			}
		}
	}

	/**
	 * Try to load a class in a subdir
	 * @param 	string   $orgClassName 	The original class name
	 * @param 	string   $fullPath 		The full path
	 * @return 	boolean  				Succeeded/not
	 */
	public static function TryLoad( $orgClassName, $fullPath ) {

		$className = strtolower( $orgClassName );
		$aParts    = explode( '_', $className );

		// loop each class part
		foreach( $aParts as $i => $part ) {
			$partNo = $i+1;

			// last part
			if( count($aParts) == $partNo ) {

				// try file in parent folder (i.e. author.class.php)
				$possiblePath = $fullPath.'/class-'.$part.'.php';
				if( file_exists($possiblePath) ) { $fullPath = $possiblePath; }

				// try file in subfolder (i.e. author/author.class.php
				else { $fullPath .= '/'.$part.'/class-'.$part.'.php'; }
				break;
			}

			// middle part: use for path
			$fullPath .= '/'.$part;
		}

		// try to include file
		if(file_exists($fullPath)) {
			require($fullPath);
			return true;
		}
		return false;
	}
}

// Register autoload
spl_autoload_register( array('Studio_Autoload', 'Init') );

/**
 * Controllers
 */
add_action('init', function() {
	if( isset($_REQUEST['control']) && !is_admin() ) {

		$controlName = 'Control_'.sanitize_title($_REQUEST['control']);

		if( class_exists($controlName) ) {
			new $controlName;
		}
	}
});