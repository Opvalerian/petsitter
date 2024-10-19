<?php

require_once "classes/Animal.php";
require_once "classes/AnimalDAO.php";
require_once "classes/Tutor.php";
require_once "classes/TutorDAO.php";


if ($_SERVER["REQUEST_METHOD"] === "POST")
{
    try {
        
        if ($_POST["acao"] === "cadastrar") {
            
            $animal = new Animal("", $_POST["nome"], $_POST["especie"], $_POST["raca"], $_POST["idade"], $_POST["id_tutor"]);

            $animalDAO = new AnimalDAO();

            $animalDAO->create($animal);

        } elseif ($_POST["acao"] === "editar") {
            
            $animal = new Animal($_POST["id"], $_POST["nome"], $_POST["especie"], $_POST["raca"], $_POST["idade"], $_POST["id_tutor"]);

            $animalDAO = new AnimalDAO();

            $animalDAO->update($animal);

        } elseif ($_POST["acao"] === "cadastrar_tutor"){
            
            $tutor = new Tutor("", $_POST["nome"], $_POST["telefone"], $_POST["endereco"]);

            $tutorDAO = new TutorDAO();

            $tutorDAO->create($tutor);

        } elseif ($_POST["acao"] === "editar_tutor"){

            $tutor = new Tutor($_POST["id"], $_POST["nome"], $_POST["telefone"], $_POST["endereco"]);

            $tutorDAO = new TutorDAO();

            $tutorDAO->update($tutor);

        } else {
            echo "Erro. Operação invalida";
            exit;
        }
    } catch (Exception $e) {
        echo "". $e->getMessage() ."";
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (!empty($_GET["id"])){
        $animal = new AnimalDAO();

        $animal->delete($_GET["id"]);
    } else {
        echo "Erro. Deu certo não chefia";
    }
} else {
    echo "Aqui não tem jeito chefe. Deu erro. Acesso invalido";
}