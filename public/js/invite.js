var input = $('.typeahead');
var team = input.attr('data-team');
var invites = [];
$.getJSON('/teams/invites', function (data) {
    input.typeahead({
            source: data,
            autoSelect: true
        });
});

input.change(function() {
    var current = input.typeahead("getActive");
    var html = '';
    html += '<div class="team-item">';
    html += '<a href="/' + current.name + '">';
    html += '<img src="' + current.avatar + '">';
    html += '<div class="team-name">';
    html += '<b>';
    html += '<a href="/' + current.name + '">';
    html += current.name;
    html += '</a>';
    html += '</b>';
    html += '</div>';
    html += '</div>';

    $('.invitees').append(html);

    input.val('');

    $.getJSON('/teams/' + team + '/invite/' + current.id, function(data) {
        console.log(data);
    }, function(error) {
        console.log(error);
    });
});