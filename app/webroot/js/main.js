


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

	 $('*[data-mask-data]').mask('99/99/9999');

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

	$('#ServiceAdminHomeForm').on('submit', function(event) {
        
		var $form = $(this);
        var $target = $($form.attr('data-target'));
      
		  $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
 
            success: function(data, status) {
            	$form.find('.mod').html('');

               setTimeout(function(){
		      	$form.find('.mod').html(jQuery.parseJSON(data));
		  		}, 130);

               $form[0].reset();
            }
        });
		event.preventDefault();
	});

	$('#MovementAdminHomeForm').on('submit', function(event) {
        
		var $form = $(this);
        var $target = $($form.attr('data-target'));
      
		  $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
 
            success: function(data, status) {
            	$form.find('.mod').html('');

               setTimeout(function(){
		      	$form.find('.mod').html(jQuery.parseJSON(data));
		  		}, 130);

               $form[0].reset();
            }
        });
		event.preventDefault();
	});


});