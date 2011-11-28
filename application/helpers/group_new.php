<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
// Get the data
$data = array(
	'title' => $_POST['title'],
	'public' => $_POST['public'][0],
	'desc' => $_POST['desc']
);

	// Do a simple check on the data
	if (empty($data['title']) || empty($data['desc'])) {
		
		die(INVALID_GROUP_DETAILS);
		
	}
	
	// Find out if this group is public or not.
	if ($data['public'] == 'yes') {
		$public = 1;
	}
	
	// Build the query
	Data::set('new-group', 'INSERT INTO `' . Data::get('db') . '`.`groups` (`group_id`,`title`,`desc`,`timestamp`,`conversations`,`public`) VALUES (0, "' . MySQL::clean($data['title']) . '", "' . MySQL::clean($data['desc']) . '", CURRENT_TIMESTAMP, 0, "' . MySQL::clean($public) . '");', true);
	
		// Insert the new row.
		MySQL::query(Data::get('new-group'));
		
	// Grab the latest group.
	Data::set('group', 'SELECT `group_id` FROM `' . Data::get('db') . '`.`groups` ORDER BY `group_id` DESC LIMIT 1', true);
		
		// Grab that result
		$count = MySQL::search(Data::get('group'));
		
	// Now add the user in the group.
	Data::set('add', 'INSERT INTO `' . Data::get('db') . '`.`group_members` (`user_id`, `group_id`) VALUES (' . MySQL::clean(get_user_id()) . ',' . MySQL::clean($count[0]['group_id']) . ');', true);
	
		// Add the user into the group.
		MySQL::query(Data::get('add'));
		
		// Send the user to the group.
		header('Location: ?group=' . $count[0]['group_id']);