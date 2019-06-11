$( document ).ready(function() {
    $("#btn").click(
		function(){
			$.ajax({
                url: "php/registration.php",
                type: "POST",
                dataType: "html",
                data: $("#ajax_form").serialize(),
                success: function(response) {
                    result = $.parseJSON(response);
                    $('#ajax_result').html(result);
                },
                error: function(response) {
                    $('#ajax_result').html('ERROR: data not sent');
                }
             });
			return false; 
		}
	);
});