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
        <h2>Aula 9 - Sessão e cookies - Conteúdo sigiloso</h2>
        <br><br>

<?php
    session_start();

    if (!isset($_SESSION["usuario"])) {
        echo "Erro";
        exit();
    }
    
    echo "Olá, " . $_SESSION["usuario"];
    echo "<br><br>";

?>

        [Conteúdo privado / sigiloso]

    </body>
</html>

<?php
    ob_flush();
?>