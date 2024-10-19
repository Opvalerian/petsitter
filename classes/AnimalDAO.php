<?php

require_once "Animal.php";

class AnimalDAO
{
    private $pdo;

    public function __construct()
    {
        require_once __DIR__ . '/../config.php';
        global $pdo; // Usa a variável global do config.php
        $this->pdo = $pdo; // Atribui o PDO à propriedade da classe
    }

    public function create(Animal $animal)
    {
        try {
            $query = "INSERT INTO animais (nome, especie, raca, idade, id_tutor) VALUES (:NOME, :ESPECIE, :RACA, :IDADE, :ID_TUTOR)";
            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":NOME", $animal->getNome());
            $stmt->bindValue(":ESPECIE", $animal->getEspecie());
            $stmt->bindValue(":RACA", $animal->getRaca());
            $stmt->bindValue(":IDADE", $animal->getIdade());
            $stmt->bindValue(":ID_TUTOR", $animal->getId_tutor());

            $stmt->execute();
            echo "Animal cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(Animal $animal)
    {
        try {
            $query = "UPDATE animais SET nome = :NOME, especie = :ESPECIE, raca = :RACA, idade = :IDADE, id_tutor = :ID_TUTOR WHERE id = :ID";
            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(':ID', $animal->getId());
            $stmt->bindValue(":NOME", $animal->getNome());
            $stmt->bindValue(":ESPECIE", $animal->getEspecie());
            $stmt->bindValue(":RACA", $animal->getRaca());
            $stmt->bindValue(":IDADE", $animal->getIdade());
            $stmt->bindValue(":ID_TUTOR", $animal->getId_tutor());

            $stmt->execute();
            echo "Dados alterados com sucesso";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        try {
            $query = "SELECT * FROM animais";
            $result = $this->pdo->query($query);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        try {
            $query = "DELETE FROM animais WHERE id = :ID";
            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":ID", $id);
            $stmt->execute();
            echo "Animal excluido com sucesso";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function search($id)
    {
        require_once __DIR__ . '/../config.php';
        global $pdo;

        try {
            $query = "SELECT * FROM animais WHERE id = :ID";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(":ID", $id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
