<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
// Grab the data from the request
$data = array(
	'title' => $_POST['title'],
	'message' => $_POST['message'],
	'group_id' => $_POST['group_id'],
);

	// Do a basic check on the data
	if (empty($data['title']) || empty($data['message']) || empty($data['group_id'])) {
		die(INVALID_GROUP_CONVO_INFO);
	}
	
	// Otherwise, insert the data in the db.
	Data::set('convo', 'INSERT INTO `' . Data::get('db') . '`.`group_conversations` (`group_id`,`group_conversation_id`,`author`,`title`,`message`,`timestamp`) VALUES ("' . MySQL::clean($data['group_id']) . '", 0, "' . MySQL::clean(get_user_id()) . '", "' . MySQL::clean($data['title']) . '", "' . MySQL::clean($data['message']) . '", CURRENT_TIMESTAMP);', true);
	
	// Query
	MySQL::query(Data::get('convo'));
	
	// Then update the topic count
	// First we have to find out how many are there.
	Data::set('convos', 'SELECT `conversations` FROM `' . Data::get('db') . '`.`groups` WHERE `group_id` = "' . MySQL::clean($data['group_id']) . '"', true);
	
		$conversations = MySQL::search(Data::get('convos'));
	
	Data::set('update-count', 'UPDATE  `' . Data::get('db') . '`.`groups` SET  `conversations` = ' . MySQL::clean((int) $conversations[0]['conversations'] + 1) . '  WHERE  `groups`.`group_id` = ' . MySQL::clean($data['group_id']) . ';', true);
	
		// Update the count.
		MySQL::query(Data::get('update-count'));
	
	// Reditect
	header('Location: ?group=' . $data['group_id']);