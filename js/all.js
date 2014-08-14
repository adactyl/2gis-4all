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
var onLittleCardRender = function(element, index, array){
    $('#cardField').append('<div class="littleCard">'
        + '<div class="littleCard_icon"></div>'
        + '<div class="littleCard_name">' + element.name + '</div>'
        + '<div class="littleCard_address">' + element.address + '</div>'
        + '<div class="cheat">' + element.id + '</div></div>');

}

var onLittleCardClick = function(){
    if($('body').find('#cardOpen').length === 0){
        $('body').append('<div id="cardOpen">New. id = ' + $(this).find('.cheat').html() + '</div>');
    }
    else{
        $('#cardOpen').html('').append('Old. id = ' + $(this).find('.cheat').html());
    }
    /*var apiUrl = 'http://localhost/api/fullInfoById',
        methodParams = {'id': $(this).find('.cheat').html()};
    $.getJSON(apiUrl, methodParams, function(data){
        console.log('data was receive');

    });*/
}

var onSuccessJson = function(data){
    $('#cardField').html('').append(data.length + ' records was found' + '<br/>');
    data.forEach(onLittleCardRender);
    $('.littleCard').click(onLittleCardClick);
}


$(document).ready(function() {

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
        var methodParams = {line:$('#searchInput').val()},
            apiUrl = 'http://localhost/api/search';
        $.getJSON(apiUrl, methodParams, onSuccessJson);
        return false;
    })
});
