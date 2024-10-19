<?php

require_once(dirname(__FILE__) ."/../classes/Tutor.php");

class TutorDAO
{
    public function create(Tutor $tutor)
    {
        require_once(dirname(__FILE__) ."/../config.php");

        try {
            $query = "INSERT INTO tutores (nome, telefone, endereco) VALUES (:NOME, :TELEFONE, :ENDERECO)";

            $stmt = $pdo->prepare($query);

            $stmt->bindValue(":NOME", $tutor->getNome());
            $stmt->bindValue(":TELEFONE", $tutor->getTelefone());
            $stmt->bindValue(":ENDERECO", $tutor->getEndereco());

            $stmt->execute();

            echo "Tutor cadastrado com sucesso!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update(Tutor $tutor)
    {
        require_once(dirname(__FILE__) ."/../config.php");

        try {
            $query = "UPDATE tutor SET nome = :NOME, telefone = :TELEFONE, endereco = :ENDERECO WHERE id = :ID";

            $stmt = $pdo->prepare($query);

            $stmt->bindValue(":ID", $tutor->getId());
            $stmt->bindValue(":NOME", $tutor->getNome());
            $stmt->bindValue(":TELEFONE", $tutor->getTelefone());
            $stmt->bindValue(":ENDERECO", $tutor->getEndereco());

            $stmt->execute();

            echo "Tutor alterado com sucesso";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        require_once(dirname(__FILE__) ."/../config.php");

        try {
            $query = "SELECT * FROM tutores";

            $result = $pdo->query($query);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id)
    {
        require_once __DIR__ . '/../config.php';

        try {
            $query = "DELETE FROM tutores WHERE id = :ID";

            $stmt = $pdo->prepare($query);

            $stmt->bindValue(":ID", $id);

            $stmt->execute();

            echo "Tutor excluido com sucesso";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function search ($id)
    {
        require_once __DIR__ . '/../config.php';

        try {
            $query = "SELECT * FROM tutores WHERE id = :ID";

            $stmt = $pdo->prepare($query);

            $stmt->bindValue(":ID", $id);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}