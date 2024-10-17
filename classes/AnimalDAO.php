<?php

require_once "Animal.php";

class AnimalDAO
{
    public function create (Animal $animal)
    {
        require_once __DIR__ . '/../config.php';

        try {
            $query = "INSERT INTO animais (nome, especie, raca, idade) VALUES (:NOME, :ESPECIE, :RACA, :IDADE)";

            $stmt = $pdo->prepare($query);

            $stmt->bindValue(":NOME", $animal->getNome());
            $stmt->bindValue(":ESPECIE", $animal->getEspecie());
            $stmt->bindValue(":RACA", $animal->getRaca());
            $stmt->bindValue(":IDADE", $animal->getIdade());

            $stmt->execute();

            echo "Animal cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update (Animal $animal)
    {
        require_once __DIR__ . '/../config.php';

        try {
            $query = "UPDATE animais SET nome = :NOME, especie = :ESPECIE, raca = :RACA, idade = :IDADE WHERE id = :ID";

            $stmt = $pdo->prepare($query);

            $stmt->bindValue(":NOME", $animal->getNome());
            $stmt->bindValue(":ESPECIE", $animal->getEspecie());
            $stmt->bindValue(":RACA", $animal->getRaca());
            $stmt->bindValue(":IDADE", $animal->getIdade());

            $stmt->execute();

            echo "Dados alterados com sucesso";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        require_once __DIR__ . '/../config.php';


        try {
            $query = "SELECT * FROM animais";

            $result = $pdo->query($query);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete ($id)
    {
        require_once __DIR__ . '/../config.php';

        try {
            $query = "DELETE FROM animais WHERE id = :ID";

            $stmt = $pdo->prepare($query);

            $stmt->bindValue(":ID", $id);

            $stmt->execute();

            echo "Animal excluido com sucesso";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function search ($id)
    {
        require_once __DIR__ . '/../config.php';

        try {
            $query = "SELECT * FROM animais WHERE id = :ID";

            $stmt = $pdo->query($query);

            $stmt->bindValue(":ID", $id);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}