<?

define('URL', Helper::isLocal() ? 'http://seven-vetrov.test1.ru/' : 'http://11121.ru/seven-vetrov/');
define('SITE_NAME', 'Тестовые задания');

define('DEBUG', 1);
define('PRODUCTION', 0);
define('SITEMODE', PRODUCTION);

if (Helper::isLocal()) {
//Для дома
define('DBHOST', 'localhost');
define('DBNAME', 'test-seven-vetrov');

define('DBLOGIN', 'root');
define('DBPASSWD', '');
} else {
//Для инета
define('DBHOST', 'localhost');
define('DBNAME', 'test-seven-vetrov');
define('DBLOGIN', 'root');
define('DBPASSWD', '');
}
define('DBDSN', 'mysql:dbname='.DBNAME.';host='.DBHOST);
