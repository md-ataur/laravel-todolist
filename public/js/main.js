;(function($){
	$(document).ready(function(){
		$(document).on('click', '.ourItem', function(event) {
			var text = $(this).text();
			var id = $(this).find("#itemId").val();			
			//console.log(id);
			$('#title').text('Edit Item');
			var text = $.trim(text);
			$('#addItem').val(text);
			$('#deleteButton').show();
			$('#saveButton').show();
			$('#AddButton').hide();	
			$("#id").val(id);		
	
		});

		$(document).on('click', '#addNew', function(event) {
			var text = $(this).text();			
			$('#title').text('Add New Item');
			$('#addItem').val("");
			$('#deleteButton').hide();
			$('#saveButton').hide();
			$('#AddButton').show();				
		});

		/* Insert mechanism */
		$(document).on('click', '#AddButton', function(event) {
			var text = $('#addItem').val();
			if (text == "") {
				alert("Your field is empty !!" );
			}else{
				/* Data pass to the controller */
				$.post('todoajax', {'text': text,'_token':$('input[name=_token]').val()}, function(data) {
					$('#itemList').load(location.href + ' .list-group');
				});					
			}
		});

		/* Delete mechanism */
		$('#deleteButton').click(function(event){
			var id = $("#id").val();
			$.post('delete', {'id': id,'_token':$('input[name=_token]').val()}, function(data) {
				$('#itemList').load(location.href + ' .list-group');
				//console.log(data);				
			});
		});

		/* Update mechanism */
		$('#saveButton').click(function(event){
			var id = $("#id").val();
			var value = $("#addItem").val();
			$.post('update', {'id': id,'value': value,'_token':$('input[name=_token]').val()}, function(data) {
				$('#itemList').load(location.href + ' .list-group');
				//console.log(data);
			});
		});

		/* autocomplete search */
		$( function() {		   
		    $( "#search" ).autocomplete({
		    	source: "http://127.0.0.1:8000/search"
		    });		
		});

	});
})(jQuery);