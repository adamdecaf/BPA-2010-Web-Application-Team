<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
function get_friends($user_id) {

	// Load the latest friends from the db.
	Data::set('sql', 'SELECT `user_2` FROM `' . Data::get('db') . '`.`friends` WHERE `user_1` = "' . MySQL::clean($user_id) . '" LIMIT 1000', true);

		// Grab and store the results, then prepare a list of friends.
		$friend_ids = MySQL::search(Data::get('sql'));
		$friends = array();
		$n = 0;
		
		// Grab some info about each friend.
		foreach ($friend_ids as $friend_id) {
			
			// Setup the SQL statement to query for the data
			Data::set('sql', 'SELECT `username` FROM `' . Data::get('db') . '`.`users` WHERE `user_id` = "' . $friend_id['user_2'] . '"', true);
			$username = MySQL::search(Data::get('sql'));
			
			// Store the data
			$friends[] = array(
				'id' => $friend_id['user_2'], 
				'username' => $username[0]['username']
			);
		}
		
	return $friends;
}

function get_latest_update($id) {
	
	// Get the latest update from a user.
	Data::set('sql', 'SELECT * FROM `' . Data::get('db') . '`.`updates` WHERE `from` = "' . MySQL::clean($id) . '" ORDER BY `timestamp` DESC LIMIT 1', true);
	
	$tmp = MySQL::search(Data::get('sql'));
	
	// Check to see if we're going to be returing a value, if not then don't show one.
	if (empty($tmp[0])) {
		
		return array(
			'title' => USER_NO_UPDATES, 
			'location' => '?friends',
			'timestamp' => @date('Y-m-d H:i:s')
		);
		
	} else {
		
		return $tmp[0];
		
	}
	
}