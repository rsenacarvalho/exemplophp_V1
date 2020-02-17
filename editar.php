<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />



</head>

<body>
    <?php

    $id_usuario = $_POST["codigo"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];
    include 'banco.php';
    atualizar_usuario( $id_usuario,  $nome,  $email, $sexo);

    ?>


</body>

</html>