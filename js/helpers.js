/**
 * Created by student on 19.08.14.
 */
define( "helpers",
    function(){
        /**
         * Имя модуля
         */
        function getName(){
            alert('Helpers');
        }
        /**
         * Соответствие контактов для webapi 2gis.
         * @returns Соответсвия между типом контакта и его символьным представлением
         */
        function getContactType(){
            return {
                'email': 'E-mail',
                'website': 'Веб-сайт',
                'phone': 'Телефон',
                'fax': 'Факс',
                'icq': 'ICQ',
                'jabber': 'Jabber',
                'skype': 'Skype',
                'vkontakte': 'ВКонтакте',
                'twitter': 'Twitter',
                'instagram': 'Instagram',
                'facebook': 'Facebook',
                'pobox': 'P.O.Box'
            };
        }
        return {
            getName : getName,
            getContactType: getContactType

        };
    }
);