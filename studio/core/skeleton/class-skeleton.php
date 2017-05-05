<?php
/**
 * Skeleton class
 */
class Skeleton {

	/**
	 * Setup studio5A2 Skeleton
	 */
	public static function Register() {

		// default functions
		self::Helpers();

		// add acf social media links to theme
		Skeleton_SocialMedia::Register();
		Skeleton_ContactInfo::Register();

	}

	/**
	 * Useful extra methods
	 */
	public static function Helpers() {

		// extended print function
		if( !function_exists('p') ) {

			function p( $value = array() ) {
				$backtrace = debug_backtrace();
				unset( $backtrace[0]['args'] );

				echo '<div style="padding: 20px; background-color: #D8BFD8;"><pre>';
				print_r( $value );
				echo '<br><div class="alert alert-warning" role="alert">';
				foreach( $backtrace[0] as $key => $backtrace_value ) {
					echo $key.': '.$backtrace_value.'<br>';
				}
				echo '</div></pre></div>';
			}
		}

		// extended var_dump function
		if( !function_exists('vd') ) {

			function vd($value) {
				echo '<pre>';
				var_dump( $value );
				echo '</pre>';
			}
		}

		// extended echo function
		if( !function_exists('e') ) {

			function e( $value, $text = null, $element = 'hr' ) {
			    $element = strtolower( $element );
			    echo "<{$element}>\n";
			    if( $text ) { echo $text.': '; }
			    echo $value;
			    if( $element == 'hr' || $element == 'br' ) {
					echo "\n<{$element}>\n";
			    } else {
					echo "\n</{$element}>";
			    }
			}
		}

		// check if $needle is in $string
		if( !function_exists('in_string') ) {

			function in_string( $needle, $string ) {
				return strpos( $string, $needle ) !== false;
			}
		}

		/**
		* Get a cleaned value from $_POST / $_GET
		* if unavailable, take a default value
		* @param 	string 	$key 			Value key
		* @param 	mixed 	$default_value 	(optional)
		* @return 	mixed 					Value
		*/
		if( !function_exists('getValue') ) {

			function getValue( $key, $default_value = false ) {
				if( !isset($key) || empty($key) || !is_string($key) ) {
					return false;
				}

				if( isset($_POST[$key]) ) { $return = $_POST[$key]; }
				elseif( isset($_GET[$key]) ) { $return = $_GET[$key]; }
				else { $return = $default_value; }

				if( is_string($return) ) {
					return stripslashes( urldecode(preg_replace( '/((\%5C0+)|(\%00+))/i', '', urlencode($return) )) );
				}

				return $return;
			}
		}

		if( !function_exists('getLastModifiedCss') ) {

			function getLastModifiedCss() {
				$path = get_stylesheet_directory() . '/dist/css/app.css';
				if( file_exists($path) ) {
					$time = filemtime($path);
					return $time;
				} else {
					self::RenderNotification( 'css' );
				}
			}
		}

		if( !function_exists('getLastModifiedJs') ) {

			function getLastModifiedJs() {
				$path = get_stylesheet_directory().'/dist/js/app.js';
				if( file_exists($path) ) {
					$time = filemtime($path);
					return $time;
				} else {
					self::RenderNotification( 'js' );
				}
			}
		}
	}

	public static function RenderNotification( $type ) {
		if( $type == 'css') { $sWarning = 'Je bent vergeten om je Sass te compileren #duh'; }
		else { $sWarning = 'Er moet nog wat met je JS gedaan worden :-('; }

		echo <<<EOHTML
			<style>
				body:before {
					position: absolute;
					top: 0;
					left: 0;
					right: 0;
					padding: 10px;
					color: #0ff;
					font-family: arial, verdana;
					content: {$sWarning};
					text-align: center;
					background: red;
				}
			</style>
EOHTML;
	}
}