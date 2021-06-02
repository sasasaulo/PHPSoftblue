<!DOCTYPE html>

<html lang = "pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Aula 8 - Listagem de usuários</title>
    </head>
    <body>
        <h1>Curso de PHP Softblue</h1>
        <br><br>
        <h2> Aula 8 - Listagem de usuários </h2>
        <br>
        <a href="aula8.php">Criar novo registro</a><br/>

        <table border = 1>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Idade</th>
                <th>Sexo</th>
                <th>Estado Civil</th>
                <th>Humanas</th>
                <th>Exatas</th>
                <th>Biológicas</th>
                <th>Senha com hash</th>
                <th>Ações</th>
            </tr>
<?php
    //banco de dados
    try {
        //estabelecendo uma conexão com o bd
        $connection = new PDO("mysql:host=localhost;dbname=cursoPhpSoftblue","root", "root");

        //caso a conexão de certo, usar o utf8 entre o mysql e o php
        $connection->exec("set names utf8");
    }
    catch (PDOException $e) {
        echo "Falha trycatch bd: " . $e->getMessage();
        exit();
    }

    if (isset($_REQUEST["excluir"]) && $_REQUEST["excluir"] == true) {

        //statment = operação com o bd q não retorna nada
        $stmt = $connection->prepare("DELETE FROM usuarios WHERE id=?");
        $stmt->bindParam(1, $_REQUEST["id"]);
        $stmt->execute();
        
        if ($stmt->errorCode() != "00000") {
            echo "Falha na exclusão: " . $stmt->errorCode();
            echo implode(", ",$stmt->errorInfo());
        }
        else {
            echo "usuário removido com sucesso<br>";
        }

    }

    //resultset rs
    $rs = $connection->prepare("SELECT * FROM usuarios");

    if($rs->execute()) {
        //enquanto tiver registros
        while ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
            echo "<tr>";

            echo "<td>" . $registro->nome . "</td>";
            echo "<td>" . $registro->email . "</td>";
            echo "<td>" . $registro->idade . "</td>";
            echo "<td>" . $registro->sexo . "</td>";
            echo "<td>" . $registro->estadocivil . "</td>";
            echo "<td>" . $registro->humanas . "</td>";
            echo "<td>" . $registro->exatas . "</td>";
            echo "<td>" . $registro->biologicas . "</td>";
            echo "<td>" . $registro->senha . "</td>";

            echo "<td>";
            echo "<a href='?excluir=true&id=" . $registro->id . "'>(Exclusão)</a>";
            echo "<a href='aula8_alteracao.php?id=" . $registro->id . "'>(Alteração)</a>";
            echo "<a href='aula8_senha.php?id=" . $registro->id . "'>(Senha)</a>";
            echo "</td>";
            
            echo "</tr>";
        }
    }
    else {
        echo "Falha na seleção de usuários. <br>";
    }
?>
        </table>
        <br>

        <a href="aula8.php">Criar novo registro</a><br/>
    
    </body>
</html>