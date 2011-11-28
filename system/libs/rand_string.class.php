<?php
/**
 * RandString Class
 * Adam Shannon
 */

class RandString {

	// Set the allowed characters.
	// These are the ASCII values for 'a' and 'z'.
	static $ascii_min = 97;
	static $ascii_max = 122;
	static $allowed_characters = array('!', '@', '#', '\$', '%', '^', '&', '*', '(', ')', '-', '//', '\/', '\\');
	
	/**
	 * @name: generate
	 * This will generate a random string of length $length.
	 *
	 * @parm: $length <- [Optional] The strings length.
	 * @return: str
	 */
	static function generate($length = 8) {
	
		// Set some constants.
		$count = count(self::$allowed_characters) - 1;
		$string = '';
		
		// Generate the string.
		for ($n = 0; $n < $length; $n++) {
			
			// Decide what to use.
			if (rand(0, 7) % 2 == 0) {
				
				// Use an ASCII character
				$string .= chr(rand(self::$ascii_min, self::$ascii_max));
				
			} else {
			
				// Otherwise add a character.
				$string .= self::$allowed_characters[rand(0, $count)];
			
			}
			
		}
		
	return $string;
	}
	
}