<?php
/**
 * Global Data
 * Adam Shannon
 */

/**
 * List of errors
 * #001 - Element with a value already exists, add parm (key, value, true) to overwrite data.
 * #002 - You don't have an equal number of keys and values in set_many().
 */

class Data {
	static $data = array();
	
	// Create a function to store the data
	static function set($key, $value, $overwrite = true) {
		
		// Check to see if we want to overwrit any filled elements.
		if ($overwrite === false) {
			if (isset(self::$data[$key])) {
				return '#001';
			} else {
				self::$data[$key] = $value;
			}
		} else {
			self::$data[$key] = $value;
		}
		
	}
	
	// Create a function to get the data
	static function get($key) {
		return self::$data[$key];
	}
	
	// Copy a value
	static function copy($current_key, $new_key) {
		self::$data[$new_key] = self::$data[$current_key];
	}
	
	// Delete a (key, value) pair
	static function delete($key) {
		unset(self::$data[$key]);
	}
	
	// Rename a (key, value) pair
	static function rename($old_key, $new_key) {
		self::$data[$new_key] = self::$data[$old_key];
		unset(self::$data[$old_key]);
	}
}