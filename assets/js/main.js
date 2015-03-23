$(document).ready(function() {
	var elf = $('#elfinder').elfinder({
	    lang: 'ru',             // language (OPTIONAL)
	    url : '/radio/Derpman/elfinder-2.x/php/connector.php'  // connector URL (REQUIRED)
	}).elfinder('instance');            
});