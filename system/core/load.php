<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// Create a class to load different files
// Remember, everything should be kept as a static access level.
class Load {

	// Set a normal path variable, this will be loaded by the self::get().
	static public $path = '';
	
	/**
	 * Call the function to load the latest path.
	 * @parm: null
	 * @return: The included file
	 */
	static function load_file() {
	
		// Load the file and don't show a fatal error in PHP if it's not found.
		include self::$path;
		
	}
	
	
	/**
	 * This function will set and then load file based on the type, it will
	 * dynamically load the file based on what it is.  This allows for
	 * changing the directory names.
	 * 
	 * @parm: type - The type of file (lib, helper...)
	 * @parm: name - The name of the file.
	 * @return: The included file
	 */
	static function get($type, $name) {
		
		// Load the file based on where it's stored
		switch ($type) {
			
			// Load a library
			case 'lib':
				self::$path = SYS_LIBS . $name;
			break;
			
			// Load a helper
			case 'helper':
				self::$path = APP_HELPERS . $name;
			break;
			
			// Load a template page.
			case 'template':
				self::$path = TEMPLATE_ROOT . $name;
			break;
			
			// Load a page from the cache.
			case 'cache':
				self::$path = APP_CACHE . $name;
			break;
			
			// Load a language file
			case 'i18n':
				self::$path = APP_I18N . $name;
			break;
			
			// Load an image
			case 'image':
				self::$path = TEMPLATE_IMAGES . $name;
			break;
			
			// Load a CSS file
			case 'css':
				self::$path = TEMPLATE_CSS . $name;
			break;
			
			// Load an HTML page from the template
			case 'html':
				self::$path = TEMPLATE_HTML . $name;
			break;
			
			// Load an error page from the template
			case 'error':
				self::$path = TEMPLATE_ERROR . $name;
			break;
			
			// Load a jsAPI helper
			case 'jsAPI':
				self::$path = API_JS . $name;
			break;
			
		}
		
		// Load the latest path (which is set just before this).
		self::load_file();
	}
	
}