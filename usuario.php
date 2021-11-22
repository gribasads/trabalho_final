<?php
require_once 'construtor.php';
class Usuario {
    public $login;
    public $senha;

    function getLogin() { 
        return $this->login;
    }
    
    function setLogin($login) {
        $this->login = $login;
    }
    
    function getSenha() { 
        return $this->senha;
    }
    
    function setSenha($senha) {
        $this->senha = $senha;
    }

    function logar($login, $senha) // loga o usuário
    {

        $select_login =
            "SELECT * FROM gustavo_usuarios 
         WHERE gustavo_usuarios.user = '{$login}' AND gustavo_usuarios.senha = '{$senha}'"; //seleciona os dados do usuário para o login
        echo $select_login;
        $sql = new queries();
        $res_login = $sql->executar($select_login); // roda o select de login

        if ($res_login->num_rows > 0) { // confere se alguma linha foi encontrada

            while ($coluna = $res_login->fetch_assoc()) {   // confere linha a linha do resultado do sql de login

                return $coluna['user']; //retorna o nome do usuario

            }
        } else {

            return 0; // retorna que nenhum usuário foi encontrado

        }
    }

}