(function ( $ ) {
	"use strict";

	$(function () {

		getCode();

		$("#add_code").click(function(){
			if($("#code").val() == ""){
				$(".updated").html('<p>Please enter your code</p>').show();
				return false;
			}
			// Lets AJAX the code into our DB
			$.ajax({
				url: ajaxurl,
				type: 'POST',
				dataType: 'json',
				data: {
					action 		: "myCode",
					method 		: "addCode",
					code   		: $("#code").val(),
					location	: $('input[name=location]:checked').val()
				},
				beforeSend:function(){
					$(".updated").not('.facebook').hide(),
					$(".error").hide();
				},
				success:function(data){
					$(".updated").html('<p>Code has been added</p>').show();
					getCode();
				},
				error:function(data){
					$(".error").html('<p>There has been an error: '+data+'</p>').show();
				}
			});			
		});

	});

	function getCode(){
		$.ajax({
			url: ajaxurl,
			type: 'POST',
			dataType: 'json',
			data: {
				action : "myCode",
				method : "getCode"
			},
			beforeSend:function(){
				$(".popupTable").html('');
			},
			success:function(data){
				$.each(data, function(index, val) {
					 /* iterate through array or object */
					 $(".popupTable").append('<tr><td>'+val.rsgoogleanalytics_code+'</td><td>'+val.rsgoogleanalytics_location+'</td><td>&nbsp;</tr>');
				});				
			},
			error:function(data){
				$(".error").html('<p>Cannot retrieve current code : '+data+'</p>').show();
			}
		});
	}

}(jQuery));