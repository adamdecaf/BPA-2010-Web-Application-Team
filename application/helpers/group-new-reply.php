<?php
/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */
 
// Grab the data from the request
$data = array(
	'message' => $_POST['message'],
	'group_id' => $_POST['group_id'],
	'convo_id' => $_POST['group_conversation_id'],
);

	// Do a basic check on the data
	if (empty($data['message']) || empty($data['convo_id'])) {
		die(INVALID_GROUP_REPLY_INFO);
	}
	
	// Otherwise, insert the data in the db.
	Data::set('reply', 'INSERT INTO `' . Data::get('db') . '`.`group_messages` (`group_message_id`,`group_conversation_id`,`author`,`message`,`timestamp`) VALUES (0, ' . MySQL::clean($data['convo_id']) . ', ' . MySQL::clean(get_user_id()) . ', "' . MySQL::clean($data['message']) . '", CURRENT_TIMESTAMP);', true);
	
	// Query
	MySQL::query(Data::get('reply'));
	
	// Reditect
	header('Location: ?group=' . $data['group_id']);