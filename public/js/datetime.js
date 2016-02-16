(function () {
    $('#datetimepicker').datetimepicker({
        format: 'M d, Y H:i',
        minDate: new Date()
    });
}());

function checkDateTime() {
    var inputDate = $('#datetimepicker').val();
    var testDate = new Date(inputDate);

    if (testDate < new Date()) {
        alert('Please provide a future date');
        $('#datetimepicker').val('');
    }
}