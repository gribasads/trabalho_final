<?php
class Conexao
{

    // Atributos:
    private $caminho_banco = "193.123.108.138";
    private $usuario = 'iae';
    private $senha = 'iae';
    private $banco_dados = 'iae';

    // Metodos:
    public function conectar() // cria uma conexão com o banco de dados
    {
        $conexao = new mysqli($this->caminho_banco, $this->usuario, $this->senha, $this->banco_dados);
        $conexao->set_charset("utf8mb4");

        if ($conexao->connect_error) {

            die("Falha de conecao" . $conexao->connect_error);
        } else {
             echo "Conectado!";
        }

        return $conexao;
    }
}
