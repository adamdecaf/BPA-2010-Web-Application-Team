<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
// This helper will get a request to change a friend.
// If the user is friends with them then remove the 
// friend ship, and if not then add it.
$user_1 = get_user_id();
$user_2 = (int) $_GET['change_friend'];

// Make sure we don't have users adding themselves.
if (($user_1 != $user_2) && ($user_1 != '' && $user_2 != '')) {

	// Query the db.
	if (is_friend($user_1, $user_2)) {
	
		// Delete a friendship.
		Data::set('del-one', 'DELETE FROM `' . Data::get('db') . '`.`friends` WHERE `friends`.`user_1` = "' . MySQL::clean($user_1) . '" AND `friends`.`user_2` = "' . MySQL::clean($user_2) . '" LIMIT 1;');
		
		Data::set('del-two', 'DELETE FROM `' . Data::get('db') . '`.`friends` WHERE `friends`.`user_1` = "' . MySQL::clean($user_2) . '" AND `friends`.`user_2` = "' . MySQL::clean($user_1) . '" LIMIT 1;');
		
			MySQL::query(Data::get('del-one'));
			MySQL::query(Data::get('del-two'));
		
		
	} else {
	
		// Add a friendship.
		Data::set('add', 'INSERT INTO `' . Data::get('db') . '`.`friends` (`user_1`, `user_2`) VALUES ("' . MySQL::clean($user_1) . '", "' . MySQL::clean($user_2) . '"), ("' . MySQL::clean($user_2) . '", "' . MySQL::clean($user_1) . '");');
		
			MySQL::query(Data::get('add'));
			
		// Now post to the updates field.
		// INSERT INTO `bpa-2010`.`updates` (`for`, `from`, `title`, `desc`, `location`, `timestamp`) VALUES ('0', '0', '0', '00', '0', CURRENT_TIMESTAMP);
		Data::set('update', 'INSERT INTO `' . Data::get('db') . '`.`updates` (`for`, `from`, `title`, `desc`, `location`, `timestamp`) VALUES ("' . MySQL::clean($user_2) . '", "' . MySQL::clean($user_1) . '", "' . MySQL::clean('You have a new friend!') . '", "' . MySQL::clean('You have been added as a friend by someone.') . '", "' . MySQL::clean('?profile=' . $user_1) . '", CURRENT_TIMESTAMP);');
		
			// Add the update
			MySQL::query(Data::get('update'));
		
	}
}

	header('Location: ?profile=' . $user_2);