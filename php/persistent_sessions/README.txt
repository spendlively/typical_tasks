
1. Конфиги для сессий
session.auto_start = 0
session.use_cookies = 1
session.use_only_cookies = 1 (> PHP 5.3)
session.use_trans_sid = 0 (id сессии добавляется во все ссылки)
session.name = PHPSESSID (letters and numbers only)
session.save_path (каталог где хранятся файлы сессий, если не указан, то tmp)
session.cache_limiter = nocache (определяет какие HTTP заголовки управления кешем посылать клиенту)
session.cache_expire = 3 (жизнь кэша кук в минутах, игнорируется если session.cache_limiter = nocache)
session.cookie_domain = ""  (привязка кук к домену)
session.cookie_httponly = "" (по ум disabled, куки доступны только по http, т.е cookies не будут доступны из JavaScript (XSS))
session.cookie_lifetime = 0 (Время жизни кук в секундах, timestamp времени сервера)
session.cookie_path = / (путь в сессионной куке)
session.cookie_secure = off (должны ли куки передаваться только по https)
session.use_strict_mode = 0 (повышение секьюрности, инициализация session id только сервером, защищает от фиксации сессии)
session.gc_maxlifetime = 1440 (24 min, время удаления данных сессии, для секьюрности как можно короче)
session.gc_probability = 1 (отключит gc)

//Установка в .htaccess
php_flag session.gc_probability on

