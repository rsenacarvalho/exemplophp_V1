<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

    <title>Teste de Conexão</title>


</head>

<body>

    <?php
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $sexo = $_POST["sexo"];

    echo "Nome: " . $nome . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Sexo: " . $sexo;
    include 'banco.php';
    cadastrar_usuario($nome, $email, $sexo);
    ?>





</body>

</html>