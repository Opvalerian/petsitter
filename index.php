<?php
require_once(dirname(__FILE__) ."/classes/AnimalDAO.php");
require_once(dirname(__FILE__) ."/classes/TutorDAO.php");
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
    
    <header class="mb-5 container text-center">
        <h1>Sistema de Cadastro de animais e tutores</h1>
    </header>
    <main class="position-fluid">

        <section class="container mb-3">
            
            <h2>Adicionar Tutor</h2>
            
            <form action="processa.php" method="post" class="input-group">
                <label class="input-group" for="nome">Nome</label>
                <input type="text" id="nome" name="nome">
                
                <label class="input-group" for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone">
                
                <label class="input-group" for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco">

                <button class="btn btn-success" type="submit" name="acao" value="cadastrar_tutor">Cadastrar</button>
            </form>
            
        </section>

        <section class="form-section container-md">
            
            <h2>Adicionar Animal</h2>

            <form action="processa.php" method="post" class="input-group">
                <label class="input-group" for="nome">Nome</label>
                <input type="text" id="nome" name="nome">
                
                <label class="input-group" for="especie">Especie</label>
                <input type="text" id="especie" name="especie">
                
                <label class="input-group" for="raca">Raça</label>
                <input type="text" id="raca" name="raca">
                
                <label class="input-group" for="idade">Idade</label>
                <input type="text" id="idade" name="idade">

                <div class="mb-3 input-group">
                    <label for="id_tutor" class="form-label">Tutor</label>
                    <select class="form-select" id="id_tutor" name="id_tutor" required>
                    
                    <option value="">Selecione um tutor</option>
                    
                    <?php 
                    
                        $tutor = new TutorDAO();

                        $tutores = $tutor->read();

                        foreach ($tutores as $tutor){

                    ?>

                    <option value="<?php echo $tutor['id']; ?>"><?php echo $tutor['nome']; ?></option>

                    <?php
                        }
                    ?>
                    </select>
                </div>

                <button type="submit" name="acao" value="cadastrar">Cadastrar</button>

            </form>
        </section>
        <!-- Lista de animais cadastrados -->
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
                        <th>Tutor</th>
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
                        <td><?php echo $animal["id_tutor"] ?></td>
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