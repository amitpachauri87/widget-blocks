	jQuery(document).ready(function(){
		jQuery(".create_row_coloumn").on('click',function(){
		var row = jQuery(".no_of_rows").val();
		var col = jQuery(".no_of_coloumns").val();
		var id = jQuery('.widget_block_id').val();
		var post_screen = jQuery(".post_screen").val();
		/*var data = {
			action: 'test_response',
			post_var:{row:row,col:col}
		};*/
		
	 	/*jQuery.post(the_ajax_script.ajaxurl,  dataType : 'html', data, function(response) {
	 		alert(response);
		});*/


	 	var datainner = {
	 	   action: 'response',
	 	   post_var:{row:row,col:col,id:id,post_screen:post_screen,}
	 	   };

	 	   jQuery.ajax({
	 	         type: "POST",
	 	         dataType: 'html',
	 	         url: ajaxurl,
	 	         data: datainner,
	 	         success: function(response){
	 	         	   jQuery('.dynamic_div').empty();
                       jQuery('.dynamic_div').append(response);

	 	         }
	 	   });


			
		return false;
		});
		jQuery( '.swipebox' ).swipebox();
	});

