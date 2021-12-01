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

    function logar($login, $senha) 
    {

        $select_login =
            "SELECT * FROM gustavo_usuarios 
         WHERE gustavo_usuarios.user = '{$login}' AND gustavo_usuarios.senha = '{$senha}'"; 
        echo $select_login;
        $sql = new queries();
        $res_login = $sql->executar($select_login); 

        if ($res_login->num_rows > 0) { 

            while ($coluna = $res_login->fetch_assoc()) {   

                return $coluna['user']; 

            }
        } else {

            return 0;

        }
    }

}