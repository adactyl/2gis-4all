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
    DG.marker([element.latitude, element.longitude]).addTo(map).bindPopup(element.name);
}

var onLittleCardClick = function(){
    if($('body').find('#cardOpen').length === 0){
        $('body').append('<div id="cardOpen">New. id = ' + $(this).find('.cheat').html() + '</div>');
        $('#cardOpen').click(function(){
            this.remove();
        });
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
    //ToDo: Отображать после организаций серым шрифтом. Переделать костыль
    $('#cardField').html('');
    $('.fontAmount').html('');
    $('.font2').append('<span class="fontAmount">  ' + data.length  + '</span>');

    data.forEach(onLittleCardRender);
    $('.littleCard').click(onLittleCardClick);
}


$(document).ready(function() {
    //ToDo: рефакторинг
    $('.close').click(function(){
        //Hide search result on click
        $('#card').hide();
    });
    //Hide search result on document load
    $('#card').hide();

    //onClick button "Search"
    $('#searchForm').submit(function() {
        //Show search result
        var searchLine = $('#searchInput').val().trim();
        if(searchLine === ''){
            $('#searchInput').val('');
            return false;
        }
        $('#card').show();
        var methodParams = {line: searchLine},
            apiUrl = 'http://localhost/api/search';
        $.getJSON(apiUrl, methodParams, onSuccessJson);
        return false;
    })
});
