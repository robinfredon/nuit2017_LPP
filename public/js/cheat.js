if (window.addEventListener ) {
	var kkeys = [], konami= "38,38,40,40,37,39,37,39,66,65";
	window.addEventListener("keydown", function(e){
		kkeys.push( e.KeyCode );
		if ( kkeys.toString().indexOf( konami ) >= 0) {
			alert("OK");
		}
	},true);
}
