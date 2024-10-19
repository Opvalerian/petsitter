<?php

class Tutor
{
    private $id, $nome, $telefone, $endereco;

    public function __construct($id, $nome, $telefone, $endereco)
    {
        if (!empty($id)) {
            $this->setId($id);
        }
        $this->setNome($nome);
        $this->setTelefone($telefone);
        $this->setEndereco($endereco);
    }

    // setters

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function setEndereco($endereco){
        $this->endereco = $endereco;
    }

    // getters

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
}