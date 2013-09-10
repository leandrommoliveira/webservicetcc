<?php

namespace TCC\Routes;

use Respect\Rest\Routable;
use Respect\Relational\Mapper;

class Faltas implements Routable
{
    public function get($ra)
    {
        try {
            $pdo = new \Pdo('mysql:host=localhost;dbname=trabalho', 'root', 'leandro');
            $mapper = new Mapper($pdo);

            $faltas = $mapper->alunos_materias($mapper->materias, 
                                               array("alunos_id" => $ra))
                             ->fetchAll();
        } catch(\Exception $e) {
            header('HTTP/1.1 403 Forbidden');
            return false;
        }

        header('HTTP/1.1 200 Ok');
        return json_encode($faltas,true);
    }

    public function post() {}

    public function put() {}

    public function delete() {}
}