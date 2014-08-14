$(document).ready(function() {
    $('.close').click(function(){
        $('#card').hide();
    });
    $('#card').hide();
    $('#searchForm').submit(function() {
        $('#card').show();

        $.getJSON('http://localhost/api/search', {}, function(data) {
            $('#cardField ').html('').append(data.name + '<br/>').append(data.address);
        });
        return false;
    })

});

