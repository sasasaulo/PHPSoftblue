<?php

$valido = false;
$erro = null;

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

//PEGANDO NOME E EMAIL
$rs = $connection->prepare("SELECT * FROM usuarios WHERE id = ?");
$rs->bindParam(1, $_REQUEST["id"]);

if ($rs->execute()) {
    if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
        //populando as variaveis de entrada:
        $_POST["nome"] = $registro->nome;
        $_POST["email"] = $registro->email;
    }
    else {
        $erro = "Registro não encontrado";
    }
}
else {
    echo "Falha na captura do registro";
}

//Verificando se a variável REQUEST["validar"] existe e está preenchida 
//(para evitar mensagens na tela se não estiver) e se ela também possui o valor true 
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true) {

    //verificando o nome
    if ($_POST["senha"] != $_POST["senha_repete"]){
        $erro = "Senhas digitadas diferentes";
    }
    else {
        $valido = true;

        $sql = "UPDATE usuarios SET 
                senha = ?
                WHERE id = ?";

        //criando o statement    
        $stmt = $connection->prepare($sql);
        
        //associando as ??? para os parâmetros passados
        //senha encriptada com o uso de sementes (seed)
        $stmt->bindParam(1, md5("fckjcnksjncksjnckjnckjnsc" . $_POST["senha"]));
        $stmt->bindParam(2, $_POST["id"]);
        
        $stmt->execute();

        if ($stmt->errorCode() != "00000") {
            $valido = false;
            $erro = "Erro código: " . $stmt->errorCode() . ": <br>";
            $erro .= implode(", ",$stmt->errorInfo());
        }
    }
}

?>


<!DOCTYPE html>

<html lang = "pt-br">
    <head>
        <title>PHP - Aula 8 - Alteração de senha</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if ($valido) {
                echo "Senha alterada com sucesso!!!<br>";
                echo "<a href='aula8.php'>Criar novo registro</a><br/>";
                echo "<a href='aula8_lista.php'>Visualizar dados</a><br/>";
            }
            else {
                if (isset($erro)) {
                    echo $erro . "<br><br>";
                }
            ?>

            <!-- Quando o action é omitido, significa que ele vai enviar para a própria página -->
            <form method="POST" action="?validar=true&id=<?php echo $_REQUEST["id"]; ?>">
                Nova senha para o usuário <?php echo $_POST["nome"] . " (" . $_POST["email"] . "): <br>"; ?>
                <input type=password name="senha">
                <br>
                <br>
                Novamente:
                <br>
                <input type=password name="senha_repete">
                <br>

                <input type=hidden name=id value="<?php echo $_REQUEST["id"]; ?>">

                <input type=submit value="Alterar">

            </form>
        <?php 
        //fechamento do else do suuuucesso    
        }
        
        ?>
    </body>
</html>