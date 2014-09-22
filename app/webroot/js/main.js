// get params for GET
$.urlParam = function(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}

var date = new Date();
var month = date.getMonth()+1; //January is 0!
var year = date.getFullYear();


$( document ).ready(function() {



	$("#ano").heapbox({
		'onChange': function(ano){

			var mes = 0;
			if($.urlParam('mes')){
				 mes = $.urlParam('mes');
			}else{
				 mes = month;
			}

		 	location.href = base_url + '?mes=' + mes + '&ano=' + ano;
		 },

			'effect': {
				'type': 'fade',
				'speed': 'slow'
			}
	});

	$('#ano').on('change', function() {
	  alert($(this).val()); 
	});


});