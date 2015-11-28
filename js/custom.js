$(document).ready(function() {

	
	$.getJSON( "update.json", function( roadmap ) {
	    var keys = Object.keys(roadmap).reverse();
	    for(var i = 0; i < 5; i++){
            $('#version').append(
                '<div class="panel panel-default"> \
    			    <div class="panel-heading">' + keys[i] + '</div> \
    			    <div class="panel-body"> ' + roadmap[keys[i]].changelog + ' </div> \
    			 </div>');
        }
   	});
	
	$.getJSON( "http://api.okovision.dronek.com/json.php", function( json ) {
	    $("#nbClient").html(json.nbClient);
	});


});