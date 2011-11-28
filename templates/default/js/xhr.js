/**
 * BPA 2010
 * Adam Shannon
 * 2010-01-20
 */

function get_xhr() {
	
	// Internet explorer has had a long history of not supporting 
	// the w3c standard for XMLHttpRequests (The underlying API 
	// that allows web browsers to grab additional content via
	// HTTP requests), instead Microsoft has created their own API
	// set in reaction to the spec.
	// 
	// This is a common techiqune used to find an acceptable XHR
	// object for the browser.
	// 
	// Seeing as the Microsoft API's are experimental and do NOT 
	// follow the w3c standatd use of these is classified under
	// 'experimental' and any issues with them will not be addressed
	// by the team.
	if (window.XMLHttpRequest) {
		return new XMLHttpRequest();
		
	} else if (window.ActiveXObject) {
		return new ActiveXObject("Microsoft.XMLHTTP");
		
	} else if (window.ActiveXObject) {
		return new ActiveXObject("Msxml2.XMLHTTP");
		
	}

return false;
}