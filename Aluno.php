
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

class Aluno implements Routable {

	public function get(){}

	public function post(){

    $assoc = false;
    $depth = 512;
    $options = 0;

    //Pega os valores do POST
    $request_body = @file_get_contents('php://input');
  
    $request_body = utf8_encode($request_body);

    $request_body = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t](//).*)#", '', $request_body); 

    if(version_compare(phpversion(), '5.4.0', '>=')) { 
        $request_body = json_decode($request_body, $assoc, $depth, $options); 
    } 
    elseif(version_compare(phpversion(), '5.3.0', '>=')) { 
        $request_body = json_decode($request_body, $assoc, $depth); 
    } 
    else { 
        $request_body = json_decode($request_body, $assoc); 
    } 

    $user = $request_body->ra;
    $pass = $request_body->senha;
  

    try{
      $db = new Db(new Pdo('mysql:host=localhost;dbname=trabalho', 'root', 'leandro'));
      if(!$alunos = $db->select('nome, id')->from('alunos')->where(array('id'=>$user, 'senha'=>$pass))->fetchAll()){

        header('HTTP/1.1 403 Forbidden');
        return false;
      }
      
      }
      catch(Exception $e){
        header('HTTP/1.1 403 Forbidden');
        return false;
      }

    $_SESSION['username'] = $alunos[0]->nome;

    header('HTTP/1.1 200 Ok');
    http_response_code(200);
    return json_encode($alunos,true);

  }

	public function put(){}

	public function delete(){}
}