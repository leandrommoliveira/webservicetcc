<?php

namespace TCC\Routes;

use Respect\Rest\Routable;
use Respect\Relational\Db;

class Aluno implements Routable
{
    public function get() {}

    public function post()
    {
        $user = $_POST['ra'];
        $pass = $_POST['senha'];

        try{
            $pdo = new \Pdo('mysql:host=localhost;dbname=trabalho', 'root', 'leandro');
            $db = new Db($pdo);
            $select = $db->select('nome, id')
                         ->from('alunos')
                         ->where(array('id' => $user, 'senha' => $pass));

            $alunos = $select->fetchAll();
            if(!$alunos){
                throw new \Exception('Aluno não foi encontrado');
            }
        } catch(\Exception $e){
            header('HTTP/1.1 403 Forbidden');
            return false;
        }

        $_SESSION['username'] = $alunos[0]->nome;

        header('HTTP/1.1 200 Ok');
        return json_encode($alunos,true);
    }

    public function put() {}

    public function delete() {}
}