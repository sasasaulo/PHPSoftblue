<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>PHP Arrays e Funções Especiais</title>
    </head>
    <body>
        <h1>Curso de PHP - Softblue</h1>
            <br/>
            <br/>
            <h2>Arrays e Funções Especiais:</h2><br/>
<?php

        define("BR", "<br/>");

        $arrayExemplo = array("Php", "SQL", 100, "Java");

        echo "print_r(arrayExemplo): ";
        print_r($arrayExemplo);
        echo BR . BR;

        $arrayExemplo = array(0 => "Php", 1 => "SQL", 5 => 100, "Curso" =>"Java");

        echo "print_r(arrayExemplo) -> ";
        print_r($arrayExemplo);
        echo BR . BR;

        echo "Posição 0: " . $arrayExemplo[0] . BR;
        echo "Posição 1: " . $arrayExemplo[1] . BR;
        echo "Posição 5: " . $arrayExemplo[5] . BR;
        echo "Posição 'Curso': " . $arrayExemplo["Curso"] . BR . BR;

        unset($arrayExemplo["Curso"]);

        echo "print_r(arrayExemplo) -> ";
        print_r($arrayExemplo);
        echo BR . BR;

        unset($arrayExemplo);

        echo "print_r(arrayExemplo) depois do unset: ";
        print_r($arrayExemplo);
        echo BR . BR;


        $arrayExemplo = array(0 => "Php", 1 => "SQL", 5 => 100, "Curso" =>"Java");
        print_r($arrayExemplo);
        echo BR ."Quantidade de elementos do array (count): " . count($arrayExemplo);
        echo BR;

        echo "Quantidade de elementos do array (sizeof): " . sizeof($arrayExemplo);
        echo BR . BR;

        echo "Usando o foreach.. tem no array: ";
        foreach($arrayExemplo as $elemento){
            echo $elemento . ", ";
        }

        echo BR . BR;

        echo "Adicionando um novo elemento no final com o array_push." . BR;
        array_push($arrayExemplo, "Saulo");
        print_r($arrayExemplo);

        echo BR . BR;

        echo "O array_pop remove o último elemento inserido no array. Nesse caso, o elemento Saulo".BR;
        $x = array_pop($arrayExemplo);
        echo $x . BR;

        echo "O array_shift remove o primeiro elemento inserido no array. Nesse caso, o elemento Php".BR;
        $x = array_shift($arrayExemplo);
        echo $x . BR;
        print_r($arrayExemplo);

        echo BR . BR;
        
        echo "Adicionando um novo elemento no começo com o array_unshift." . BR;
        array_unshift($arrayExemplo, "Maldito");
        print_r($arrayExemplo);

        echo BR . BR;

        echo "Trabalhando com valores numéricos:".BR;
        $arrayExemplo = array(140.10, 200, 23, 112.34);
        print_r($arrayExemplo);
        echo BR . BR;

        echo "A função array_map aplica uma função em todos os elementos do array. ela precisa ter uma variável de retorno".BR;
        echo "A função number_format foi utilizada para formatar o número para moeda".BR;

        function insereMoeda($valor){
            $valor = "R$ " . number_format($valor, 2, '.', '');
            return $valor;
        }

        $arrayAuxiliar = array_map("insereMoeda", $arrayExemplo); 
        echo "arrayAuxiliar: ";
        print_r($arrayAuxiliar);
        echo BR."arrayExemplo: ";
        print_r($arrayExemplo);
        echo BR . BR;

        echo "Trabalhando com índices:".BR;
        $arrayExemplo = array("Linguagem1" => "Php",
                                "Linguagem2" => "SQL",
                                "Linguagem3" => 100,
                                "Linguagem4" => "Java");
        print_r($arrayExemplo);
        echo BR . BR;
    
        echo "Verificando se existe um índice com a função array_key_exists:".BR;
        if(array_key_exists("Linguagem2",$arrayExemplo))
            echo "Existe 'Linguagem2' no arrayExemplo".BR . BR;
        else
            echo "Não existe 'Linguagem2' no arrayExemplo".BR . BR;

        echo "Imprimindo na tela os nomes dos índices do array.".BR;
        echo "É necessário atribuir a saída do comando array_keys para outro array.".BR;

        $arrayAuxiliar = array_keys($arrayExemplo);
        foreach($arrayAuxiliar as $key){
            echo $key . ", ";
        }
        echo BR.BR;

        echo "Para saber o índice de um elemento, usa-se a função array_search:".BR;
        $key = array_search("Php", $arrayExemplo);
        echo "A chave de 'Php' é: ".$key;
        echo BR.BR;

        echo "Verificando se existe um elemento com a função in_array:".BR;
        if(in_array("Php",$arrayExemplo))
            echo "Existe 'Php' no arrayExemplo".BR . BR;
        else
            echo "Não existe 'Php' no arrayExemplo".BR . BR;


        echo "Para embaralhar o array, existe a função shuffle: ".BR;
        $arrayAuxiliar = $arrayExemplo;
        echo "array sem embaralhar: ".BR;
        print_r($arrayAuxiliar);
        shuffle($arrayAuxiliar);
        echo BR. "Embaralhado: ".BR;
        print_r($arrayAuxiliar);
        echo BR.BR;

        echo "Para ordenar um array usa-se a função sort (letras e depois números)".BR;
        print_r($arrayExemplo);
        echo BR;
        sort($arrayExemplo);
        print_r($arrayExemplo);
        echo BR.BR;

        echo "para ordenar inversamente, rsort: ".BR;
        rsort($arrayExemplo);
        print_r($arrayExemplo);
        echo BR.BR;

        echo "é possível transformar uma string em um array com a função explode:".BR;
        $strExemplo = "10;20;30;40;50";
        $arrayExemplo = explode(";",$strExemplo);
        print_r($arrayExemplo);
        echo BR.BR;

        echo "Também é possível fazer o inverso com o comando implode: ".BR;
        $arrayExemplo = array("a", "b", "c", "d", "e");
        $strExemplo = implode(";", $arrayExemplo);
        echo $strExemplo.BR.BR;

        echo "a função parse_str transforma uma string do tipo 'url' para um array: ".BR;
        echo "strExemplo = chave1=valor1&chave2=valor2&xxx=Peavey".BR;
        $strExemplo = "chave1=valor1&chave2=valor2&xxx=Peavey";
        parse_str($strExemplo,$arrayExemplo);
        print_r($arrayExemplo);
?>
    </body>
</html>