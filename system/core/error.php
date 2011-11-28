<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// This class will handle system level error messages.
// Remember, everything should be kept as a static access level.
class Error {
	
	/**
	 * This will check the configuration and throw any errors for web
	 *  access, api access, or maintenance mode.
	 * 
	 * @parm: $cfg - The config sub-array (config['general']).
	 * @return: null
	 */
	static function check_config($cfg) {
		
		// Check to see if we need to send a system level error,
		// they are either about being in maintance mode, or just
		// disabled.
		if ($cfg['web'] !== 'enabled') {
			
			// Thorw an error about web access disabled and exit the program.
			self::new_error(TEXT_WEB_ACCESS_ERROR);
			
		}
		
		
		// Sometimes we want to move into maintenance mode, check here.
		if ($cfg['mode'] !== 'normal') {
			
			// Show the maintenance page.
			self::new_error(TEXT_MAINTENANCE_MODE);
			
		}
		
	}
	
	
	/**
	 * This will create and manage a new error.
	 *
	 * @parm: The text to display.
	 * @return: null
	 */
	static function new_error($text) {
		
		// Show the text and leave
		die($text);
		
	}
	
}