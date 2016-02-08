$.getJSON('/teams/invites', function (data) {
    console.log(data);
}, function(error) {
    console.log(error);
});