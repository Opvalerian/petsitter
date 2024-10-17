<?php
require_once(dirname(__FILE__) ."/classes/AnimalDAO.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petsitter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <h1>Sistema de Cadastro de animais e tutores</h1>
    </header>
    <main>
        <section class="form-section">
            
            <h2>Adicionar Animal</h2>

            <form action="processa.php" method="post">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome">
                
                <label for="especie">Especie</label>
                <input type="text" id="especie" name="especie">
                
                <label for="raca">Raça</label>
                <input type="text" id="raca" name="raca">
                
                <label for="idade">Idade</label>
                <input type="text" id="idade" name="idade">

                <button type="submit" name="acao" value="cadastrar">Cadastrar</button>
            </form>
        </section>
        <section class="list-section">
            <h2>Animais Cadastrados</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Especie</th>
                        <th>Raça</th>
                        <th>Idade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $animal = new AnimalDAO();

                    $animais = $animal->read();

                    foreach ($animais as $animal){
                    ?>
                    <tr>
                        <td><?php echo $animal["id"] ?></td>
                        <td><?php echo $animal["nome"] ?></td>
                        <td><?php echo $animal["especie"] ?></td>
                        <td><?php echo $animal["raca"] ?></td>
                        <td><?php echo $animal["idade"] ?></td>
                        <td>
                            <button class="edit-btn" onclick="location.href='editar.php?id=<?php echo $animal['id'] ?>' ">Editar</button>
                            <button class="delete-btn" onclick="location.href='processa.php?id=<?php echo $animal['id'] ?>' ">Excluir</button>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>