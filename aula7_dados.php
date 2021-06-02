<!DOCTYPE html>

<html lang = "pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title>PHP - Formulários e dados</title>
    </head>
    <body>
        <h1>Curso de PHP - Softblue</h1>
        <br/>
        <br/>
        <h2>Formulários e dados (Tratamento):</h2><br/>

<?php

    echo "Nome: " . $_REQUEST["nome"] . "<br>";
    echo "Sobrenome: " . $_POST["sobrenome"] . "<br>";
    echo "Estado civil: " . $_POST["estadocivil"] . "<br><br>";

    echo "Para se pegar os dados enviados pelo método POST, usa-se a super variável $"."_POST"."[].<br/>";
    echo "Se os parâmetros forem passados pelo método GET, advinhem qual será usada??"."<br/>";
    echo "É preferível usar o método POST devido a segurança.<br/>";
    echo "A variável _REQUEST serve pra pegar dados de GET, POST e também de COOKIES.<br/>";

?>

          
    </body>
</html>