<?php

require_once 'vendor/autoload.php';
require_once 'src/TCC/auth.php';

use Respect\Rest\Router;

session_start();
$router = new Router('/webservicetcc');
$router->isAutoDispatched = false;

$router->any('/', function (){
	return 'online';
});

$router->any('/aluno/*/*', 'TCC\Routes\Aluno')->by('authChave');
$router->any('/notas/*', 'TCC\Routes\Notas')->by('valida');
$router->any('/faltas/*', 'TCC\Routes\Faltas')->by('valida');

echo $router->run();