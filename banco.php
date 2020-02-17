<?php
function cadastrar_usuario($nome, $email, $sexo)
{
    $conexao = conectar();

    $sql = "INSERT INTO usuario (nome, email, sexo) VALUES (:NOME,:EMAIL,:SEXO)";

    $declaracao = $conexao->prepare($sql);

    $declaracao->bindParam(":NOME", $nome);
    $declaracao->bindParam(":EMAIL", $email);
    $declaracao->bindParam(":SEXO", $sexo);

    $declaracao->execute();

    header('Location:index.php');
}

function atualizar_usuario($id_usuario, $nome, $email, $sexo)
{
    $conn = conectar();

    $sql = "UPDATE usuario SET 
    nome = :NOME, email = :EMAIL, 
    sexo = :SEXO WHERE id_usuario = :ID_USUARIO";

    $declaracao = $conn->prepare($sql);

    $declaracao->bindParam(":NOME", $nome);
    $declaracao->bindParam(":EMAIL", $email);
    $declaracao->bindParam(":SEXO", $sexo);
    $declaracao->bindParam(":ID_USUARIO", $id_usuario);

    $retorno = $declaracao->execute();

    if($retorno){
        header('Location:index.php');
    }

}

function get_usuarios()
{
    $conexao = conectar();

    $declaracao  = $conexao->prepare("SELECT * FROM usuario order by nome");

    $declaracao->execute();

    $result = $declaracao->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}



function get_usuario($id_usuario)
{
    $conexao = conectar();

    $declaracao = $conexao->prepare("SELECT * FROM usuario where id_usuario = :ID_USUARIO");

    $declaracao->bindParam(":ID_USUARIO", $id_usuario);

    $declaracao->execute();

    $result = $declaracao->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function excluir_usuario($id_usuario)
{

    $conexao = conectar();

    $declaracao = $conexao->prepare("DELETE FROM usuario WHERE id_usuario = :ID_USUARIO");
    $declaracao->bindParam(":ID_USUARIO", $id_usuario);

    $retorno = $declaracao->execute();

    if ($retorno) {
        header('Location:index.php');
    } else {
        echo "Erro ao deletar usuário";
    }
}


function conectar()
{
    $conn = new PDO(
        "mysql:dbname=bancophp;host=localhost",
        "sena",
        "password"
    );

    return $conn;
}
