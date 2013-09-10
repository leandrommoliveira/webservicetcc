
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once 'vendor/autoload.php';

use Respect\Rest\Router;
use Respect\Rest\Routable;

// utilizado para conexao com banco
use Respect\Relational\Mapper;
use Respect\Config\Container;
use Respect\Validation\Validator as v;

use Respect\Data\Collections\Collection;

class Notas implements Routable {

    public function get($ra){


        try{
            $mapper = new Mapper(new Pdo('mysql:host=localhost;dbname=trabalho', 'root', 'leandro'));

            $materias = $mapper->alunos_materias($mapper->materias, array("alunos_id" => $ra))->fetchAll();
            
        }catch(Exception $e){
            echo $e->getMessage();
        }

    header('HTTP/1.1 200 Ok');
    http_response_code(200);
    return json_encode($materias,true);
    //return "[{'nomemateria':'SIF034-Engenharia de Software IV ','primeiranota':10,'notaspa':10,'segundanota':10,'mediafinal':10 },{'nomemateria':'SIF043-Gerência de Projetos','primeiranota':10,'notaspa':10,'segundanota':10,'mediafinal':10 },{'nomemateria':'SIF040-Projeto de Sistemas I','primeiranota':10,'notaspa':10,'segundanota':10,'mediafinal':10 },{'nomemateria':'SIF039-Redes de Computadores II','primeiranota':10,'notaspa':10,'segundanota':10,'mediafinal':10 },{'nomemateria':'SIF044-T?picos Avan?ados em SI I','primeiranota':10,'notaspa':10,'segundanota':10,'mediafinal':10 },{'nomemateria':'SIF070-Tópicos Especiais em Sistemas de Informa??o','primeiranota':10,'notaspa':10,'segundanota':10,'mediafinal':10 },{'nomemateria':'SIF068-Tópicos em Linguagem de Programação','primeiranota':10,'notaspa':10,'segundanota':10,'mediafinal':10 }]";
    }

    public function post(){}

    public function put(){}

    public function delete(){}
}