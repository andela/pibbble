$.noConflict();

jQuery(document).ready(function($) {

	$("#myUpload").on("shown.bs.modal", function () {

		$("#uploadSubmit").prop("disabled", true);

	});

	$("#verifyUrl").click(function() {

    	$.ajax({

    		type : 	"post",

    		url : 	$("#uploadForm").prop("action"),

    		data : 	$("#uploadForm").serialize(),

    		success : 	function() {
    						$("#errors").html("");
    						$("#uploadSubmit").prop("disabled", false);
    					},

    		error : 	function (xhr) {
    						$("#errors").html("");
    						$("#uploadSubmit").prop("disabled", true);
                            var responseJson = xhr.responseJSON;
    						for(var key in responseJson) {
                                if (responseJson.hasOwnProperty(key)) {
        							for (var i = responseJson[key].length - 1; i >= 0; i--) {
    									$("#errors").append(responseJson[key][i]);
    									$("#errors").append("<br>");
        							}
                                }
    						}
    					}
    	});

	});

	$("#upload").keydown(function () {

		$("#uploadSubmit").prop("disabled", true);

	});

	$("#myUpload").on("hidden.bs.modal", function () {

		$("#errors").html("");

	});
});

