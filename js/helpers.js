/**
 * Created by student on 19.08.14.
 */
define( "helpers",
    function(){
        /**
         * Имя
         */
        function getName(){
            alert('Helpers');
        }
        /**
         * Соответствие контактов для webapi 2gis.
         * @returns {{email: string, website: string, phone: string, fax: string, icq: string, jabber: string, skype: string, vkontakte: string, twitter: string, instagram: string, facebook: string, pobox: string}}
         */
        function getContactType(){
            return {
                'email': 'E-mail',
                'website': 'Веб-сайт',
                'phone': 'Телефон',
                'fax': 'Телефон',
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