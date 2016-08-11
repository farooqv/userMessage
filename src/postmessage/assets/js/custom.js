	/* AJAX call to post and get messages */
	function getFive(){
        var data;
        setTimeout(function(){ // set a timer for one second in the future
           data = 10; // after a second, do this
        }, 1000);
        return data;
    }
	
	var requestProcess = false;	
	$(document).on('click', '#message', 
		function(){			
			if (requestProcess) { // don't do anything if an AJAX request is pending
				return;
			}
			$('#submit').click(function(){
				var textcontent = $("#message").val();
				var dataString = 'message='+ textcontent;				
				$.ajax({
					type: "POST",
					url: "app/LoadData.php", 
					data: dataString,
					datatype : "json",										
					success: function(messages) 
					{					
						var messages = $.parseJSON(messages);						
						$('#showresults').empty().show();						
						$.each(messages, function(key, value) {						
						 $('#showresults').append(							    
								$('<tr><td>'+ value + '</td></tr>')
								);						  
						})					
						requestProcess = false;																
					}
				});
				$(document).off('click');
			});
			requestProcess = true;
		}
	);
	
	/* Validation Default*/		
	$.validator.setDefaults({
		submitHandler: function () {		
		}
	});

	/* Form validation */
	$(document).ready( function () {	
		$( "#userMessage" ).validate({
			rules: {				
				message: {
					required: true,
					maxlength: 400
				
				}	
			},
			messages: {				
				message: {
					required: "Please wirte message before submit",
				}
			},
			errorElement: "em",
			errorPlacement: function ( error, element ) {
				// Add the `help-block` class to the error element
				error.addClass( "help-block" );

				if ( element.prop( "type" ) === "checkbox" ) {
					error.insertAfter( element.parent( "label" ) );
				} else {
					error.insertAfter( element );
				}
			},
			highlight: function ( element, errorClass, validClass ) {
				$( element ).parents( ".col-sm-8" ).addClass( "has-error" ).removeClass( "has-success" );
			},
			unhighlight: function (element, errorClass, validClass) {
				$( element ).parents( ".col-sm-8" ).addClass( "has-success" ).removeClass( "has-error" );
			}
		} );
	});	