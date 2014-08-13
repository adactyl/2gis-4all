$(document).ready(function() {
    $('.close').click(function(){
        $('#test_div').hide();
    });
    $('#test_div').hide();
    $('#formS').submit(function() {
        $('#test_div').show();

        $.getJSON('http://localhost/api/search', {}, function(data) {
            $('#baza').html('').append(data.name + '<br/>').append(data.address);
        });
        return false;
    })

});

