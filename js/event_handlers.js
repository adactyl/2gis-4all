/**
 * Created by student on 19.08.14.
 */
define( "event_handlers",
    ['helpers'],
    function(helpers){
        function getName(){
            alert('EventHandlers');
        }

        /**
         * * Для рендеринга маленькой карточки
         * @param element пришедшая из API информация о фирме
         * @private
         */
        function _onLittleCardRender(element /*, index, array */){
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

        /**
         * При наведении мыши на маленькую карточку
         * Зажигает соответствующий маркер, двигает карту
         * @private
         */
        function _onMouseInLittleCard(){
            context['view'] = map.getCenter();
            var id = $(this).find('.cheat').html();
            var marker = context[id].marker;
            map.setView(marker.getLatLng());
            marker.openPopup();
        }

        /**
         * При уходе мыши из маленькой карточки
         * Устанавливает соответствующий маркер
         * в стандартное состояние
         * @private
         */
        function _onMouseOutLittleCard(){
            var id = $(this).find('.cheat').html();
            context[id].marker.closePopup();
            map.setView(context['view']);
        }

        /**
         * Действие при нажатии на маленькую карточку
         * Открывает большую карточку и отрисовывает
         * информацию на неё
         * @private
         */
        function _onLittleCardClick(){
            var id = $(this).find('.cheat').html();
            var apiUrl = 'http://localhost/api/fullInfoById',
                methodParams = {
                    'id': id,
                    'from': context[id].from
                };
            $.getJSON(apiUrl, methodParams, function(data){
                /* Проверим, существует ли большая карточка */
                if($('body').find('#cardOpen').length === 0){
                    /* Если не существует, то добавим её */
                    $('body').append('<div id="cardOpen"></div>');
                }
                else{
                    /* Если карточка уже существует, очистить её содержимое. */
                    $('#cardOpen').html('');
                }

                /* Добавим крестик */
                $('#cardOpen').append('<img src="../images/cross.png" class="close">');
                /* При нажатии на крестик закрыть большую карточку */
                $('#cardOpen').find('.close').click(function(){
                    $('#cardOpen').remove();
                });

                var contacts = data.contacts[0].contacts[0];
                $('#cardOpen').append('<p class="font2">' + data.name + '</p>' +
                    '<p> Адрес: ' + data.address + '</p> ' +
                    '<p>Контакты:</p>' +
                    '<p>' + helpers.getContactType[contacts.type] + ': ' + contacts.value + '</p>'
                );
            });
        }

        /**
         * Функция при получении JSON с результатами поиска.
         * Рисует их на форме для поиска.
         * @param data - полученный объект
         */
        function onSuccessJson(data){
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
                data.forEach(_onLittleCardRender);
                /* Выведем новые маркеры на карту */
                markers.addTo(map);
                /* К новым карточкам добавим обработчик к onClick */
                $('.littleCard').click(_onLittleCardClick);
                $('.littleCard').hover(_onMouseInLittleCard, _onMouseOutLittleCard);
            }
            else{
                /* Выведем сообщение об ошибке */
                $('#cardField').append('<div class="cardError"><p class="font3"> Увы, мы не знаем ответа на ваш вопрос</p>' +
                    ' <p>Попробуйте другие ключевые слова</p>' + '</div>');
            }
        }
        return {
            getName : getName,
            onSuccessJson: onSuccessJson
        };
    }
);