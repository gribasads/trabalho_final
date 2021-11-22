<?php

class queries
{
    private $conexao;

    public function __construct()
    {
        $conexao = new Conexao();
        $this->conexao = $conexao->conectar();
    }

    public function executar($comando)
    {
        $resultado = $this->conexao->query($comando);

        return $resultado;
    }


}
