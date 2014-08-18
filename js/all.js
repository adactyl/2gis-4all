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
/* Отрисовка маленькой карточки, вызывается через for Each */
var onLittleCardRender = function(element, index, array){
    var address = element.address === null ? 'Отсутствует': element.address;
    $('#cardField').append('<div class="littleCard">'
        + '<div class="littleCard_icon"></div>'
        + '<div class="littleCard_name">' + element.name + '</div>'
        + '<div class="littleCard_address">' + address + '</div>'
        + '<div class="cheat">' + element.id + '</div></div>');
    if(element.latitude != null && element.longitude != null){
        var marker = DG.marker([element.latitude, element.longitude]);
        context[element.id] = {'marker': marker, 'from': element.from};
        marker.addTo(markers).bindPopup(element.name);
    }
}

/* ToDo: пока что костыль, когда будет готов backend сделать отправку json и рендер большой карточки */
/* Обработчик при нажатии на маленькую карточку */
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
    /*
    var id = $(this).find('.cheat').html();
    var apiUrl = 'http://localhost/api/fullInfoById',
    methodParams = {
        'id': id,
        'from': context[id].from
    };
    $.getJSON(apiUrl, methodParams, function(data){
    console.log('data was receive: ' + data.name);
    });
    */
}

var onMouseInLittleCard = function (){
    context['view'] = map.getCenter();
    var id = $(this).find('.cheat').html();
    var marker = context[id].marker;
    map.setView(marker.getLatLng());
    marker.openPopup();
}

var onMouseOutLittleCard = function(){
    var id = $(this).find('.cheat').html();
    context[id].marker.closePopup();
    map.setView(context['view']);
}

var onSuccessJson = function(data){
    /* Удалим запись с количеством */
    $('.fontAmount').html('');
    /* Удалим старые маркеры с карты */
    markers.removeFrom(map);
    /* Очистим контекст страницы */
    context = new Object();
    /* Сбросим маркеры */
    markers = DG.featureGroup();
    /* Удалим старые карточки */
    $('#cardField').html('');
    if(data.length != 0){
        /* Добавим количество найденных записей */
        $('.font2').append('<span class="fontAmount">  ' + data.length  + '</span>');
        /* Рендерим карты, формируем маркеры */
        data.forEach(onLittleCardRender);
        /* Выведем новые маркеры на карту */
        markers.addTo(map);
        /* К новым карточкам добавим обработчик к onClick */
        $('.littleCard').click(onLittleCardClick);
        $('.littleCard').hover(onMouseInLittleCard, onMouseOutLittleCard);

    }
    else{
        /* Выведем сообщение об ошибке */
        $('#cardField').append('<div class="cardError"><p class="font3"> Увы, мы не знаем ответа на ваш вопрос</p>' +
            ' <p>Попробуйте другие ключевые слова</p>' + '</div>');
    }

}


$(document).ready(function() {

    /* Изначально окно поиска спрятано */
    $('#card').hide();

    $('.close').click(function(){
        /* при нажатии на крестик спрячем окно поиска */
        $('#card').hide();
    });


    //onClick button "Search"
    $('#searchForm').submit(function() {
        /* Убрать лишние проблемы из строки поиска и сравнить её с пустой строкой */
        var searchLine = $('#searchInput').val().trim();
        if(searchLine === ''){
            $('#searchInput').val('');
            return false;
        }
        /* При успешной валидации показать окно поиска */
        $('#card').show();
        /* получить json */
        var methodParams = {line: searchLine},
            apiUrl = 'http://localhost/api/search';
        $.getJSON(apiUrl, methodParams, onSuccessJson);
        return false;
    })
});
