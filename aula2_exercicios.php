<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>PHP - Exercícios - Aula 2</title>
    </head>
    <body>
        <h1>Curso de PHP - Softblue</h1>
        <br/>
        <br/>
        <h2>Aula 2 - Exercícios:</h2><br/>
        
<?php
    define("BR", "<br/>");

    echo "Exercício 1".BR;
    echo "Imprima na tela, todos os números de 1 a 100, um em cada linha.".BR.BR;

    $i = 1;
    while ($i <= 100){
        echo $i." "; //Substituir o espaço por BR para ficar um em cada linha.
        $i++;
    }

    echo BR.BR;
    echo "Exercício 2".BR;
    echo "Imprima os multiplos de 3 entre 1 e 100, um em cada linha.".BR.BR;
    
    $i = 1;
    while ($i <= 100){
        if($i % 3 == 0){
            echo $i." "; //Substituir o espaço por BR para ficar um em cada linha.
        }
        $i++;
    }

    echo BR.BR;
    echo "Exercício 3".BR;
    echo "Imprima na tela a soma de todos os números pares de 50 a 100 (incluindo-o). O resultado deve ser 1950.".BR.BR;

    $i = 50;
    $soma = 0;
    while ($i <= 100){
        if($i % 2 == 0){
            $soma = $soma + $i;
        }
        $i++;
    }

    echo "A soma é ".$soma.BR;


    echo BR.BR;
    echo "Exercício 4".BR;
    echo "Escreva uma função que retorne o fatorial do número passado como parâmetro. Para o valor 4 o resultado deve ser 24.".BR.BR;

    function fatorial ($num){
        $resultado = 1;

        while ($num > 1){
            $resultado = $resultado * $num;
            $num--;
        }

        return $resultado;
    }

    function fatorial_recursivo ($num){
        if($num == 0) {
            return 1;
        }
        else{
            return $num * fatorial_recursivo ($num-1);
        }
    }

    echo "O fatorial de 4 é: ".fatorial(4).BR;
    echo "O fatorial de 4 (recursivo) é: ".fatorial_recursivo(4).BR;



    echo BR.BR;
    echo "Exercício 5".BR;
    echo "Escreva uma função que receba 6 parâmetros (3 notas, 3 pesos) e mostre a média. Para os parâmetros (10, 9, 8, 3, 2, 5) o resultado deve ser 8.8.".BR.BR;
    
    
    echo BR.BR;
    echo "Exercício 6".BR;
    echo "Imprima na tela os 10 primeiros números da série Fibonacci até o número 100. ".BR.BR;
    
    echo BR.BR;
    echo "Exercício 7".BR;
    echo "Escreva uma função que receba 2 parâmetros, e retorne a soma do intervalo de valores destes parâmetros. Para os parâmetros (5, 10) o resultado deve ser 45.".BR.BR;
    
    echo BR.BR;
    echo "Exercício 8".BR;
    echo "Escreva um programa que, dada uma variável x, temos y de acordo com a seguinte regra:".BR;
    echo "1. se x é par: y = x / 2".BR;
    echo "2. se x é impar: y = 3 * x + 1".BR;
    echo "3. imprime y".BR;
    echo "O programa deve então jogar o valor de y em x e continuar até que y tenha o valor final de 1. ".BR;
    echo "Por exemplo, para x = 13, a saída será: 40 ? 20 ? 10 ? 5 ? 16 ? 8 ? 4 ? 2 ? 1.".BR;
    echo "Fazer este mesmo exercício usando os comandos if e switch.".BR;




            
?>

    </body>
</html>