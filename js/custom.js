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

	$.ajax({
	   type: 'GET',
	    url: 'http://api.okovision.dronek.com/json.php',
	    async: true,
	    jsonpCallback: 'response',
	    contentType: "application/json",
	    dataType: 'jsonp',
	    success: function(json){
	    	//console.log(json.nbClient);
	    	$("#nbClient").html(json.nbClient);
	    }
	});
	



});