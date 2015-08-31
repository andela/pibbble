$(document).ready(function() {
  //hide log in
  //$("#logInForm").addClass("hide");
  var toggleDisplay = function(first, second) {
    $(first).addClass("hide");
    $(second).removeClass("hide");
  };
  $(signUp).click(function() {
    toggleDisplay(logInForm, signUpForm)
  });
  $(logIn).click(function() {
    toggleDisplay(signUpForm, logInForm)
  });
});