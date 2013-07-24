
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once 'vendor/autoload.php';
use Respect\Rest\Router;
use Respect\Rest\Routable;

// utilizado para conexao com banco
use Respect\Relational\Mapper;
use Respect\Relational\Db;
use Respect\Config\Container;
use Respect\Validation\Validator as v;

use Respect\Data\Collections\Collection;

class Notas implements Routable {

	public function get(){

    return 'Autenticado';
	}

	public function post(){}

	public function put(){}

	public function delete(){}
}