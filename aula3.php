<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8"/>
        <title>PHP Strings e Funções Especiais</title>
    </head>
    <body>
        <h1>Curso de PHP - Softblue</h1>
            <br/>
            <br/>
            <h2>Strings e Funções Especiais:</h2><br/>
<?php

        define("BR","<br/>");
        
        $strExemplo = "Frase composta de exemplo para aula.";
        $strExemplo2 = " Frase    composta de exemplo para aul  a. ";

        echo $strExemplo . "<br/>";
        echo($strExemplo . "<br/>");

        print $strExemplo . "<br/>";
        print($strExemplo . "<br/>");

        $x = strlen($strExemplo);
        echo $x . BR;
        $x = strlen("Frasé composta de exemplo para aula.");
        echo $x.BR;
        echo "A diferença ocorre porque o strlen conta bytes e não caracteres.".BR;
        echo "Para isso não ocorrer, usa-se o utf8_decode.".BR;
        $x = strlen(utf8_decode($strExemplo));
        echo $x . BR;
        $x = strlen(utf8_decode("Frasé composta de exemplo para aula."));
        echo $x.BR;

        $x = strpos($strExemplo, "a");
        echo $x . BR;

        //posição numérica a partir da posição 3...
        $x = strpos($strExemplo, "a", 3);
        echo $x . BR;

        //o !== confere o retorno booleano
        $posicao = strpos($strExemplo, "a");

        while($posicao !== FALSE){
            echo "posição: " . $posicao . BR;
            $posicao = strpos($strExemplo, "a", $posicao + 1);
        }

        echo BR;
        $x = strchr($strExemplo, " ");
        echo $x . BR;
        $x = strchr($strExemplo, "de");
        echo $x . BR .BR;

        $x = strrchr($strExemplo, " ");
        echo $x . BR;
        $x = strrchr($strExemplo, "de");
        echo $x . BR .BR;

        $x = substr($strExemplo, 4);
        echo $x . BR;
        $x = substr($strExemplo, 4, 10);
        echo $x . BR . BR;

        $x = str_replace("composta","criada",$strExemplo);
        echo $x . BR .BR;

        // tabela ascii
        $x = chr(65); 
        echo $x . BR . BR;

        $x = strtolower($strExemplo);
        echo $x . BR;
        $x = strtoupper($strExemplo);
        echo $x . BR;
        $x = ucfirst($strExemplo);
        echo $x . BR;
        $x = ucwords($strExemplo);
        echo $x . BR . BR;

        $x = strrev($strExemplo);
        echo $x . BR . BR;

        $x = $strExemplo2;
        echo $x . BR;
        $x = str_replace(" ","_",$strExemplo2);
        echo $x . BR . BR;

        $x = trim($strExemplo2);
        $x = str_replace(" ","_",$x);
        echo $x . BR;

        $x = ltrim($strExemplo2);
        $x = str_replace(" ","_",$x);
        echo $x . BR;

        $x = rtrim($strExemplo2);
        $x = str_replace(" ","_",$x);
        echo $x . BR .BR;

        $x = str_split($strExemplo, 5);
        echo $x[0] . BR;
        echo $x[1] . BR;
        echo $x[2] . BR;
        echo $x[3] . BR;
        echo $x[4] . BR;
        echo $x[5] . BR;
        echo $x[6] . BR;
        echo $x[7] . BR . BR;

        $x = explode (" ", $strExemplo);
        echo $x[0] . BR;
        echo $x[1] . BR;
        echo $x[2] . BR;
        echo $x[3] . BR;
        echo $x[4] . BR;
        echo $x[5] . BR .BR;

        //criptografia
        $x = sha1($strExemplo);
        echo $x . BR;

        $x = md5($strExemplo);
        echo $x . BR;

        $x = crypt($strExemplo, "semente = palavra concatenada com a senha");
        echo $x . BR;


?>            

    </body>
</html>