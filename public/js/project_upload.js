$.noConflict();

jQuery(document).ready(function($) {

    $.fn.extend({

        donetyping: function(callback,timeout){
            timeout = timeout || 1e3; // 1 second default timeout
            var timeoutReference,
                doneTyping = function(el){
                    if (!timeoutReference) return;
                    timeoutReference = null;
                    callback.call(el);
                };
            return this.each(function(i,el){
                var $el = $(el);
                
                $el.is(":input") && $el.on("input",function(e){
                    // This catches the backspace button in chrome, but also prevents
                    // the event from triggering too premptively. Without this line,
                    // using tab/shift+tab will make the focused element fire the callback.
                    if (e.type=="keyup" && e.keyCode!=8) return;
                    
                    // Check if timeout has been set. If it has, "reset" the clock and
                    // start over again.
                    if (timeoutReference) clearTimeout(timeoutReference);
                    timeoutReference = setTimeout(function(){
                        // if we made it here, our timeout has elapsed. Fire the
                        // callback
                        doneTyping(el);
                    }, timeout);
                }).on("blur",function(){
                    // If we can, fire the event since we're leaving the field
                    doneTyping(el);
                });
            });
        }
    });

    $("#myUpload").on("shown.bs.modal", function () {
 
        $("#uploadSubmit").prop("disabled", true);
 
    });

    $("#upload").donetyping(function() {

        $.ajax({

            type :  "post",

            url :   $("#uploadForm").prop("action"),

            data :  $("#uploadForm").serialize(),

            success :   function() {
                            $("#errors").html("");
                            $("#uploadSubmit").prop("disabled", false);
                        },

            error :     function (xhr) {
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
});

