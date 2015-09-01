$(document).ready(function() {
  //hide log in
  //$("#logInForm").addClass("hide");
  var toggleDisplay = function(first, second) {
    $(second).addClass("mui-active");
    $(first).removeClass("mui-active");
  };
  $(signUp).click(function() {
    toggleDisplay(logInTab, signUpTab);
    toggleDisplay($("#pane-default-2"), $("#pane-default-1"));
  });
  $(logIn).click(function() {
    toggleDisplay(signUpTab, logInTab);
    toggleDisplay($("#pane-default-1"), $("#pane-default-2"));
  });
});