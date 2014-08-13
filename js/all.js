$(document).ready(function() {
    $('#formS').submit(function() {
        $.getJSON('http://localhost/api/search', {}, function(data) {
            $('#baza').html('').append(data.name + '<br/>').append(data.address);
        });
        return false;
    })
});

