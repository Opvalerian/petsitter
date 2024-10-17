<?php

class Animal
{
    private $id, $nome, $especie, $raca, $idade;

    public function __construct($id = null, $nome, $especie, $raca, $idade)
    {
        if (!empty($id)) {
            $this->setId($id);
        }
        $this->setNome($nome);
        $this->setEspecie($especie);
        $this->setRaca($raca);
        $this->setIdade($idade);
    }

    //setters

    public function setId($id)
    {
        $this->id = $id;
    }
    
    public function setNome($nome)
    {
        if (empty($nome)) {
            throw new Exception("Preencha do nome do Animal");
        }
        $this->nome = $nome;
    }
    
    public function setEspecie($especie)
    {
        if (empty($especie)) {
            throw new Exception("Preencha a especie do Animal");
        }
        $this->especie = $especie;
    }
    
    public function setRaca($raca)
    {
        if (empty($raca)) {
            throw new Exception("Preencha a raça do Animal");
        }
        $this->raca = $raca;
    }

    public function setIdade($idade)
    {
        if (empty($idade)) {
            throw new Exception("Preencha a idade do Animal");
        }
        $this->idade = $idade;
    }

    //getters

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getEspecie()
    {
        return $this->especie;
    }
    
    public function getRaca()
    {
        return $this->raca;
    }

    public function getIdade()
    {
        return $this->idade;
    }
}