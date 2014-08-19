/**
 * Created by student on 19.08.14.
 */
define( "start",
    ["event_handlers"],
    function(event_handlers){
        function getName(){
            alert('Start');
        }
        /**
         * Функция инициализации страницы, привязка базовых обработчиков
         */
        function init(){
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
                    $.getJSON(apiUrl, methodParams, event_handlers.onSuccessJson);
                    return false;
                })
            });

        }
        return {
            getName: getName,
            init: init
        };
    }
);