/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

function $(value, position) {
	// Remember the four types of selection
	// class  - .classname
	// id     - #id
	// name   - name
	// tag    - <tag>
	
	// Declare the position
	var pos = 0;
	
	// Check to see if there is a specific position to return.
	// If there is no value then an array will be sent back.
	if (position !== undefined) {
		
		// If it's a numeric value
		if ((/^([0-9])$/g).test(position)) {
		
			// Set the position to the numeric position
			pos = position;
			
		} else {
			
			// Change a value like second to 2.
			if (typeof position === 'string') {
				switch (position) {
					case 'first':   pos = 0; break;
					case 'second':  pos = 1; break;
					case 'third':   pos = 2; break;
					case 'fourth':  pos = 3; break;
					case 'fifth':   pos = 4; break;
					case 'sixth':   pos = 5; break;
					case 'seventh': pos = 6; break;
					case 'eighth':  pos = 7; break;
					case 'ninth':   pos = 8; break;
					case 'tenth':   pos = 9; break;
				}
			}
			
		}
	}
	
	// Decide what type of result(s) to return.
	if ((/^(\.)/).test(value)) {
		// Return an array by the class arrtibute
		if (pos !== undefined) {
			return document.getElementsByClassName(value.substr(1))[pos];
		} else {
			return document.getElementsByClassName(value.substr(1));
		}
		
	} else if ((/^#/).test(value)) {
		// Return a single element
		return document.getElementById(value.substr(1));
		
	} else if ((/^(<)/) && (/(>)$/).test(value)) {
		// Return an array by the tag name
		if (pos !== undefined) {
			return document.getElementsByTagName(value.substr(1).substr(0, value.length - 2))[pos];
		} else {
			return document.getElementsByTagName(value.substr(1).substr(0, value.length - 2));
		}
		
	} else {
		// Return an array by the name attribute
		if (pos !== undefined) {
			return document.getElementsByName(value)[pos];
		} else {
			return document.getElementsByName(value);
		}
		
	}
	
}

function show_elm(id, type) {
	
	// Show an element
	$('#' + id).style.display = type;
	
}