<?php 
require_once 'config.php';
require_once 'routes.php';

set_include_path(get_include_path().PATH_SEPARATOR.__DIR__.'/lib');
spl_autoload_register('spl_autoload', false);

$db = new \Core\DBAL\Database($host, $username, $password, $dbname);

\Core\ServiceLocator::registerInstance('db', $db);
$url = str_replace($base, '', $_SERVER['REDIRECT_URL']);

$dispatcher = new \Core\Dispatcher($routes);

$dispatcher->dispatch($url);

?>