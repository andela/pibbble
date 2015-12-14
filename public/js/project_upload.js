$.noConflict();

jQuery(document).ready(function($) {

	$('#myUpload').on('shown.bs.modal', function () {

		$('#uploadSubmit').prop('disabled', true);

	});

	$("#verifyUrl").click(function() {

    	$.ajax({

    		type : 	"post",

    		url : 	$("#uploadForm").prop('action'),

    		data : 	$("#uploadForm").serialize(),

    		success : 	function(data, status, xhr) {
    						$("#errors").html("");
    						$('#uploadSubmit').prop('disabled', false);
    					},

    		error : 	function (xhr,status,error) {
    						$("#errors").html("");
    						$("#uploadSubmit").prop('disabled', true);
    						for(var key in xhr.responseJSON) {
    							for (var i = xhr.responseJSON[key].length - 1; i >= 0; i--) {
									$('#errors').append(xhr.responseJSON[key][i]);
									$('#errors').append('<br>');
    							}
    						}
    					}
    	});

	});

	$('#upload').keydown(function (event) {

		$('#uploadSubmit').prop('disabled', false);

	});

	$('#myUpload').on('hidden.bs.modal', function () {

		$("#errors").html("");

	});
});

