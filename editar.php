<?php

require_once(dirname(__FILE__) ."/classes/AnimalDAO.php");

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (!empty($_GET["id"])) {
        $animal = AnimalDAO::search($_GET["id"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de cadastro de Animais/Tutores</title>
</head>
<body>
    <header>
        <h1>Sistema de cadastro de Animais/Tutores</h1>
    </header>
    <main>
        <section>
            <h2>Editar cadastro</h2>
            <form action="processa.php" method="post">
                <label for="id">#</label>
                <input type="text" id="id" name="id" value="<?php echo $animal["id"] ?>" readonly>

                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $animal["nome"] ?>">
                
                <label for="especie">Especie:</label>
                <input type="text" id="especie" name="especie" value="<?php echo $animal["especie"] ?>">

                <label for="raca">Raça:</label>
                <input type="text" id="raca" name="raca" value="<?php echo $animal["raca"] ?>">
                
                <label for="idade">Idade:</label>
                <input type="text" id="idade" name="idade" value="<?php echo $animal["idade"] ?>">

                <button type="submit" name="acao" value="editar">Editar</button>
            </form>
        </section>
    </main>
</body>
</html>