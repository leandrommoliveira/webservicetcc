<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once 'vendor/autoload.php';
require_once 'vendor/respect/rest/tests/bootstrap.php';


use Respect\Rest\Router;
use Respect\Config\Container;
use Respect\Validation\Validator as v;
use Respect\Relational\Mapper;
use Respect\Data\Collections\Collection;



// Criar instância do router
$router = new Router('/webservicetcc');


//usado para ver se o usuario efetuou o login
function valida(){
	if(!isset($_SESSION['username'])){
   		header('HTTP/1.1 403 Forbidden');
   		return false;
   }
 	return $this->authChave();
}

function authChave(){
	$headers = apache_request_headers();
	if((!isset($headers['Authorization'])) || ($headers['Authorization']!= 'da39a3ee5e6b4b0d3255bfef95601890afd80709')){
		header('HTTP/1.1 403 Forbidden');
		
   		return false;
	}

	return true;
}

 
/** 
 * Rota para qualquer tipo de request (any)
 */
$router->any('/', function (){
	return 'online';
 });

$router->get('/hello', function() {
    return 'Hello from Path';
});

$router->any('/aluno/*/*', 'Aluno')->by('authChave');

$router->any('/notas/', 'Notas')->by('valida');

