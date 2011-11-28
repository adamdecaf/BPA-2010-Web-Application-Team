<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

// This is the helper to create a new user, you should get these elements in 
// the HTTP $_POST array.
// Remember, this page is loaded from /index.php so you can just call the functions 
// and objects you need.
// Array (username, password, email);

// Grab the data
$data = array(
	'username' => $_POST['username'],
	'password' => $_POST['password'],
	'email' => $_POST['email']
);

	// Do a simple error check
	if ($data['username'] == '' || $data['password'] == '' || $data['email'] == '') {
		die(INVALID_USER_INFO);
	}
	
	// Otherwise, check to see if we have an account with the same email or username.
	Data::set('user-sql', 'SELECT `user_id` FROM `' . Data::get('db') . '`.`users` WHERE `username` = "' . $data['username'] . '"', true);
	Data::set('email-sql', 'SELECT `user_id` FROM `' . Data::get('db') . '`.`users` WHERE `email` = "' . $data['email'] . '"', true);
	
		// Search for both
		$user_results = MySQL::search(Data::get('user-sql'));
		$email_results = MySQL::search(Data::get('email-sql'));
		
		// Show an error if the username is taken
		if (isset($user_results[0])) {
			die(USERNAME_ALREADY_TAKEN);
		}
		
		// Show an error if the email is taken
		if (isset($user_results[0])) {
			die(EMAIL_ALREADY_TAKEN);
		}
		
		// Generate the salt
		$salt = RandString::generate();
		
		// If nothing fails then insert the row.
		Data::set(
			'sql', 
			'INSERT INTO `' . Data::get('db') . '`.`users` (`user_id`, `username`, `password`, `salt`, `email`, `cookie_str`) VALUES ("0", "' . MySQL::clean($data['username']) . '", "' . MySQL::clean(sha1($data['password'] . $salt)) . '", "' . MySQL::clean($salt) . '", "' . MySQL::clean($data['email']) . '", "' . MySQL::clean(sha1($data['email'])) . '");',
			true
		);
		
		echo Data::get('sql');
		
		// Send the query
		MySQL::query(Data::get('sql'));
		
		// Find what id numer this guy is.
		Data::set('count', 'SELECT `user_id` FROM `' . Data::get('db') . '`.`users` ORDER BY `user_id` DESC LIMIT 1', true);
		
			// Get the result
			$result = MySQL::search(Data::get('count'));
		
		// Add 'adam' (user_id = 1) as a friend
		Data::set('friend_1', 'INSERT INTO `' . Data::get('db') . '`.`friends` (`user_1`, `user_2`) VALUES (1, ' . MySQL::clean($result[0]['user_id']) . ');', true);
		Data::set('friend_2', 'INSERT INTO `' . Data::get('db') . '`.`friends` (`user_1`, `user_2`) VALUES (' . MySQL::clean($result[0]['user_id']) . ', 1);', true);
		
			// Add the friendship
			MySQL::query(Data::get('friend_1'));
			MySQL::query(Data::get('friend_2'));
			
		// Alert the new user.
		Data::set('update', 'INSERT INTO `' . Data::get('db') . '`.`updates` (`for`,`from`,`title`,`desc`,`location`,`timestamp`) VALUES (' . MySQL::clean($result[0]['user_id']) . ', 1, "Welcome to the site!", "You\'ve been added as a friend by someone!", "?profile=1", CURRENT_TIMESTAMP);', true);
		
			MySQL::query(Data::get('update'));
			
		header('Location: ?registered');
		