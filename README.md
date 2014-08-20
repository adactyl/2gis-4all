2gis-4all
=========

###Структура проекта:

Структура проекта сгенерирована с помощью фреймворка Yii.
Что означает каждый файл и папка:
```
testdrive/
    index.php                    скрипт инициализации приложения
    index-test.php               скрипт инициализации функциональных тестов
    assets/                      содержит файлы ресурсов
    css/                         содержит CSS-файлы
    images/                      содержит картинки
    themes/                      содержит темы оформления приложения
    protected/                   содержит защищённые файлы приложения
        yiic                     скрипт yiic
        yiic.bat                 скрипт yiic для Windows
        yiic.php                 PHP-скрипт yiic
        commands/                содержит команды 'yiic'
            shell/               содержит команды 'yiic shell'
        components/              содержит компоненты для повторного использования
            Controller.php       класс базового контроллера
            UserIdentity.php     класс 'UserIdentity' для аутентификации
        config/                  содержит конфигурационные файлы
            console.php          файл конфигурации консоли
            main.php             файл конфигурации веб-приложения
            test.php             файл конфигурации функциональных тестов
        controllers/             содержит файлы классов контроллеров
            SiteController.php   класс контроллера по умолчанию
        data/                    содержит пример базы данных
            schema.mysql.sql     схема БД для MySQL
            schema.sqlite.sql    схема БД для SQLite
            testdrive.db         файл БД для SQLite
        extensions/              содержит сторонние расширения
        messages/                содержит переведённые сообщения
        models/                  содержит файлы классов моделей
            LoginForm.php        модель формы для действия 'login'
            ContactForm.php      модель формы для действия 'contact'
        runtime/                 содержит временные файлы
        tests/                   содержит тесты
        views/                   содержит файлы представлений контроллеров и файлы макетов (layout)
            layouts/             содержит файлы представлений макетов
                main.php         общая для всех страниц разметка
            site/                содержит файлы представлений для контроллера 'site'
                contact.php      файл представления для действия 'contact'
                error.php        файл представления для действия 'error' (отображение ошибок)
                index.php        файл представления для действия 'index'
                login.php        файл представления для действия 'login'

Таким образом frondend помещает свои файлы в protected/views.

```

###Скрипты:
В корне репозитория есть два файла скриптов:

+ **set_right.sh(0)** - устанавливает права на каталоги которые использует nginx. 
Пример использования:  
    `sh /var/www/2gis-4all/set_right.sh`

+ **create_base(1)** - создает базу данных на локальном компьютере с именем указанным в параметре. В качестве пользователя со всеми правами к этой базе задается:
    - user=admin;
    - password=’admin’.
    - port=5432.

Пример использования:
    `sh /var/www/2gis-4all/create_base.sh my_database`

Copy new nginx config from project directory:
```
$ sudo su
$ cat nginx.conf > /etc/nginx/sites-enabled/default
$ service nginx restart
$ exit
```

Demo
=========
http://178.62.185.163/

TestRailAcc: [щелк](http://uk-jenk-summer01/testrail/index.php?/projects/overview/1)

RESTDoc: [щелк](http://codeception.com/docs/modules/REST)
