/*
 * Example
$(document).ready(function() {
    $('#searchForm').submit(function() {
        $.getJSON('http://localhost/api/search', {}, function(data) {
            $('#cardField ').html('').append(data.name + '<br/>').append(data.address);
        });
        return false;
    })

});
*/

$(document).ready(function() {
    //Bind onClick to






    $('.close1').click(function(){
        //Hide search result on click
        $('#cardOpen').hide();
    });
    //Hide search result on document load
    $('#cardOpen').show();





    $('.close').click(function(){
        //Hide search result on click
        $('#card').hide();
    });
    //Hide search result on document load
    $('#card').hide();


    //onClick button "Search"
    $('#searchForm').submit(function() {
        //Show search result
        $('#card').show();




        //Work with api
        $.getJSON(
            'http://localhost/api/search',
            {
                line: $('#searchInput').val()
            },
            //Successful function
            function(data) {
                $('#cardField').html('').append(data.length + ' records was found' + '<br/>');
                data.forEach(function(element, index, array){
                    $('#cardField').append('<div class="littleCard">'
                        + 'id = ' + element.id + '<br/>'
                        + 'name = ' + element.name + '<br/>'
                        + 'address = ' + element.address  + '</div>');
                });
            });
        return false;
    })
});
