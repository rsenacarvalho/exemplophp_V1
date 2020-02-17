<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

    <title>Estudando PHP</title>
    <style>
        body {
            margin-top: 50px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 80px;

        }

        fieldset {
            border-radius: 5px;
        }

        a:link,
        a:visited {
            background-color: #00FA9A;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }

        a:hover,
        a:active {
            background-color: #006400;
            border-radius: 5px;
        }

        input[type=text],
        input[type=email] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 100%;
            background-color: #FFA500;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h2 {
            text-align: center;
            background-color: #4682B4;
            border-radius: 5px;
        }
    </style>

</head>

<body>

    <h2> Alterar informações do usuário</h2>
    <div>

        <?php
        include 'banco.php';

        $id_usuario = filter_input(
            INPUT_GET,
            'id_usuario',
            FILTER_SANITIZE_NUMBER_INT
        );

        $result = get_usuario($id_usuario);

        $linha = $result[0];

        ?>
        <form method="POST" action="editar.php">
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" value="<?php echo $linha['id_usuario'] ?>" readonly="true"><br>

            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?php echo $linha['nome'] ?>"><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $linha['email'] ?>"><br>
            <fieldset>
                <legend>Sexo</legend>
                <input type="radio" id="masc" name="sexo" 
                <?php 
                    if($linha['sexo'] === 'Masculino'){
                        echo 'checked';
                    }                
                ?>
                value="Masculino">
                <label for="masc">Masculino</label><br>
                <input type="radio" id="fem" name="sexo"
                <?php 
                    if($linha['sexo'] === 'Feminino'){
                        echo 'checked';
                    }                
                ?>
                value="Feminino">
                <label for="fem">Feminino</label>

            </fieldset>
            <input type="submit" value="Confirma alteração">
        </form>
        <br>
        <a href="index.php">Usuários cadastrados</a>
    </div>

</body>

</html>