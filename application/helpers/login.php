<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// Ok, check the user data against the records.
	Data::set('sql', 'SELECT `salt` FROM `' . Data::get('db') . '`.`users` WHERE `username` = "' . MySQL::clean($_POST['username']) . '"', true);
		$results = MySQL::search(Data::get('sql'));
		
	$salt = $results[0]['salt'];
	
		if ($salt == '') {
			Error::new_error(INVALID_USER_INFO);
		}
	
	// Now grab the cookie string
	Data::set('sql', 'SELECT `cookie_str` FROM `' . Data::get('db') . '`.`users` WHERE `password` = "' . MySQL::clean(sha1($_POST['password'] . $salt))  . '"');
		$results = MySQL::search(Data::get('sql'));
		
	$cookie_str = $results[0]['cookie_str'];	
	
		if ($cookie_str == '') {
			Error::new_error(INVALID_USER_INFO);
		} else {
			setcookie('user', $cookie_str);
			header('Location: ?');
		}