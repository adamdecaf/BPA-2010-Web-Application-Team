/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

function show_conversation(group_id, convo_id) {
	
	// Grab the conversation element.
	var convo = $('#group-conversation');
	
		// Show the element.
		show_elm('group-conversation', 'block');
		
		// Display a loading screen...
		convo.innerText = 'Loading...';
		
	// Load the page.
	var xhr = get_xhr();
	
		// Prepare and send the request.
		xhr.open('GET', '?method=jsApi&group_id=' + group_id + '&convo_id=' + convo_id, false);
		xhr.send(null);
		
	convo.innerHTML = xhr.responseText;
	
	return;
}

function show_thread_form() {
	
	// Change the content.
	show_elm('group-conversation', 'block');
	$('#group-conversation').innerHTML = $('#group-new-conversation').innerHTML;
	
	return;
}

function show_comment_form(convo_id) {
	
	// Change the 'base' div to show a reply form.
	show_elm('group-conversation', 'block');
	$('#group-conversation').innerHTML = $('#group-new-reply').innerHTML;
	
	$('#convo_id').value = convo_id;
	
}