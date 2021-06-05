<?php
    ob_start();
?>

<!DOCTYPE html>
<html lang = "pt-br">
    <head>
        <meta charset= "UTF-8">
        <title>PHP - Sessão e cookies - Autenticação</title>
    </head>
    <body>
        <h1>Curso de PHP - Softblue</h1>
        <br><br>
        <h2>Aula 9 - Sessão e cookies - Autenticação</h2>
        <br><br>


<?php
    
    //verificando se o cookie já foi criado
    if (isset($_COOKIE["visitas"])) {
        $visitas = $_COOKIE["visitas"] + 1;
    }
    else {
        $visitas = 1;
    }


    // nome do coolike, seu valor e o tempo que ele ficará ativo (data atual + x segundos)
    setcookie("visitas", $visitas, time() + 30*24*60*60);

    echo "Essa é a sua visita número " . $visitas . " em nosso site.<br>";

    if(isset($_REQUEST["autenticar"]) && $_REQUEST["autenticar"] == true) {
        $hashSenha = md5("fckjcnksjncksjnckjnckjnsc" . $_POST["senha"]);
        $email = $_POST["email"]; 

        try {
            $connection = new PDO("mysql:host=localhost; dbname=cursoPhpSoftblue", "root", "root");

            $connection->exec("set names utf8");
        }
        catch (PDOException $e) {
            echo "falha trycatchBD: " . $e->getMessage;
            exit();
        }

        $sql = "SELECT nome from usuarios where email= ? and senha = ?";
        $rs = $connection->prepare($sql);
        $rs->bindParam(1,$email);
        $rs->bindParam(2,$hashSenha);

        if ($rs->execute()) {
            if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
                session_start();
                $_SESSION["usuario"] = $registro->nome;

                header("location: aula9_sigiloso.php");
            }
            else {
                echo "registro não encontrado";
            }
        }
        else {
            echo "Falha na execução do rs-execute()";
        }


    }



?>

    <form method=POST ACTION="?autenticar=true">
        E-mail: <INPUT type=TEXT name=email><br>
        Senha: <INPUT type=PASSWORD name=senha><br>
        <INPUT type=submit value=Autenticar>
    </form>

    </body>
</html>

<?php
    ob_flush();
?>