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

class Faltas implements Routable {

    public function get($ra){


        try{
            $mapper = new Mapper(new Pdo('mysql:host=localhost;dbname=trabalho', 'root', 'leandro'));

            $faltas = $mapper->alunos_materias($mapper->materias, array("alunos_id" => $ra))->fetchAll();
            
        }catch(Exception $e){
            echo $e->getMessage();
        }

    header('HTTP/1.1 200 Ok');
    http_response_code(200);
    //return json_encode($materias,true);
   return "[ {'nomemateria':'SIF034-Engenharia de Software IV ','numerofaltas':10,'numerofaltaslimite':10 },{'nomemateria':'SIF043-Gerência de Projetos','numerofaltas':10,'numerofaltaslimite':10 },{'nomemateria':'SIF040-Projeto de Sistemas I','numerofaltas':10,'numerofaltaslimite':10 },{'nomemateria':'SIF039-Redes de Computadores II','numerofaltas':10,'numerofaltaslimite':10 },{'nomemateria':'SIF044-Tópicos Avançados em SI I','numerofaltas':10','numerofaltaslimite':10 },{'nomemateria':'SIF070-Tópicos Especiais em Sistemas de Informação','numerofaltas':10,'numerofaltaslimite':10 },{'nomemateria':'SIF068-Tópicos em Linguagem de Programação','numerofaltas':10,'numerofaltaslimite':10 }]";
    }

    public function post(){}

    public function put(){}

    public function delete(){}
}