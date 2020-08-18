<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>PHP - Comandos</title>
    </head>
    <body>
        <h1>Curso de PHP - Softblue</h1>
        <br/>
        <br/>
        <h2>Comandos PHP:</h2><br/>

<?php
        //Evitando a maldição
        echo "Hello World <br/><br/>";

        //Criando e atribuindo variáveis
        $var1 = "PHP";
        $variavelValor = 49.22;

        //Concatenando
        echo $var1 . "<br/>" . $variavelValor . "<br/><br/>";

        //Constantes
        define("PI", 3.14);
        define("NOME_EMPRESA", "Sasa Guitars");

        $resultado = 3 * PI;
        echo "O resultado de 3*PI é " . $resultado . "<br/><br/>";
        echo "O nome da empresa é " . NOME_EMPRESA . "<br/><br/>";

        //operadores matemáticos
        echo "Operadores matemáticos <br/>";
        echo "x = 3 <br/> y = 5 <br/>";

        $x = 3;
        $y = 5;

        $resultado = $x + $y;
        echo "x + y = " . $resultado . "<br/>";
        $resultado = $x - $y;
        echo "x - y = " . $resultado . "<br/>";
        $resultado = $x * $y;
        echo "x * y = " . $resultado . "<br/>";
        $resultado = $x / $y;
        echo "x / y = " . $resultado . "<br/>";
        $resultado = $x % $y;
        echo "x % y = " . $resultado . "<br/><br/>";

        echo "Existe um operador chamado spaceship <=> que funciona tanto para números quanto para strings.<br/>";
        echo "Ele compara 2 operandos e aponta se a relação é de menor, igual ou maior.<br/>";
        echo "No caso de strings, ele compara a ordem alfabética.<br/>";
        echo "è possível usá-lo em um switch case.<br/>";
        $x = 3 <=> 2;
        echo "x = 3 <=> 2. ----- x = ".$x."<br/>";
        $x = 2 <=> 2;
        echo "x = 2 <=> 2. ----- x = ".$x."<br/>";
        $x = 1 <=> 2;
        echo "x = 1 <=> 2. ----- x = ".$x."<br/>";
        $x = "b" <=> "aass";
        echo "x = b <=> aass. ----- x = ".$x."<br/>";
        $x = "d" <=> "d";
        echo "x = d <=> d. ----- x = ".$x."<br/>";
        $x = "asa" <=> "b";
        echo "x = asa <=> b. ----- x = ".$x."<br/>";

        switch($x){
            case -1:
                echo "é menor/anterior<br/><br/>";
                break;
            case 0:
                echo "é igual<br/><br/>";
                break;
            case 1:
                echo "é maior/posterior<br/><br/>";
                break;
        }
        
        echo "x++ é executado após o fim da operação.<br>++x é executado antes.<br>";
        
        echo "x = 4<br>";
        $x = 4;
        $y = 1 + $x++;
        echo "y = 1 + x++<br/>";
        echo "y = " . $y . "<br/>";
        echo "x = " . $x . "<br/><br/>";

        echo "x = 4<br>";
        $x = 4;
        $y = 1 + ++$x;
        echo "y = 1 + ++x<br/>";
        echo "y = " . $y . "<br/>";
        echo "x = " . $x . "<br/><br/>";
        
        echo "Outras formas de realizar operações com a mesma variável: <br/>";
        echo "x = x + 5 pode ser escrito dessa forma também: x += 5. isso também é válido para todas as outras operações. <br/><br/>";
        
        echo "Arredondamento de números - round <br/>";
        echo "round(número que se deseja arrendondar, qtde de casas decimais, modo que será utilizado)<br/>";
        echo "No exemplo será utilizado o 5,52<br/>";
        echo "round(5.52,0,PHP_ROUND_HALF_DOWN) = ".round(5.52,0,PHP_ROUND_HALF_DOWN)."<BR/>";
        echo "round(5.52,0,PHP_ROUND_HALF_UP) = ".round(5.52,0,PHP_ROUND_HALF_UP)."<BR/>";
        echo "round(5.52,0,PHP_ROUND_HALF_EVEN) = ".round(5.52,0,PHP_ROUND_HALF_EVEN)."<BR/>";
        echo "round(5.52,0,PHP_ROUND_HALF_ODD) = ".round(5.52,0,PHP_ROUND_HALF_ODD)."<BR/>";

        echo "round(5.52,1,PHP_ROUND_HALF_DOWN) = ".round(5.52,1,PHP_ROUND_HALF_DOWN)."<BR/>";
        echo "round(5.52,1,PHP_ROUND_HALF_UP) = ".round(5.52,1,PHP_ROUND_HALF_UP)."<BR/>";
        echo "round(5.52,1,PHP_ROUND_HALF_EVEN) = ".round(5.52,1,PHP_ROUND_HALF_EVEN)."<BR/>";
        echo "round(5.52,1,PHP_ROUND_HALF_ODD) = ".round(5.52,1,PHP_ROUND_HALF_ODD)."<BR/><BR/>";

        echo "Existe 2 funções para arredondar para o inteiro mais próximo, para baixo e para cima: <br/>";
        echo "floor(5.52) = ". floor(5.52)."<br/>";
        echo "ceil(5.52) = ".ceil(5.52)."<br/><br/>";

        echo "Estruturas de condição e repetição (verificar o código):<br/><br/>";
        echo "if-else-elseif<br>";
        echo "Na expressão condicional, o &&/|| testa as expressões até achar a condizente e o &/| testa todas em qualquer caso.<br>";

        $x = 3;
        if($x == 2 || $x == 1){
            echo "x é 1 ou 2 <br/>";
        }
        elseif ($x > 2 && $x <= 4){
            echo "x é 3 ou 4<br/>";
        }
        else{
            echo "x não é 1, 2, 3 ou 4<br/>";
        }

        echo "existe uma forma curta de realizar um if, chamada de short if:<br/>";
        $y = $x % 2 == 0 ? "x é par<br/>":"x é ímpar<br/>";
        echo $y;
        echo "<br/><br/>";

        echo "?? - verifica se a variável é nulla (isset).<br/>";
        $x = null;

        if(isset($x)){
            $y = $x;
        }
        else{
            $y = "Valor alternativo.<br>";
        }

        echo $y;

        //É possível obter o mesmo resultado com a seguinte expressão:

        $y = $x ?? "Valor Alternatiiiivo<br/>";

        echo $y;

        echo "switch-case<br/>";
        echo "serve para tomar decições baseado em fatores.<br>";

        $x = 3;
        switch($x){
            case 0:
                echo "x = 0<br/>";
                break;
            case 1:
                echo "x = 0<br/>";
                break;
            case 2:
                echo "x = 0<br/>";
                break;
            case 3:
                echo "x = 3<br/>";
                break;
            default:
                echo "x = 0<br/>";
                break;
        }

        echo "<br/>";

        echo "for<br/>";
        echo "serve para repetir um trecho de código (laço de repetição)<br/>";
        echo "break sai do laço. continue passa para a próxima repetição<br/>";

        for($i = 0; $i < 10; $i++){
            echo $i;
        }

        echo "<br/><br/>";
        echo "while<br/>";
        echo "laço de repetição<br>"; 
        echo "break e continue podem ser usados<br/>";
        echo "cuidado com o looping eterno!!!<br/>";

        $i = 10;
        while ($i > 0){
            echo $i;
            $i--;
        }

        echo "<br/><br/>";
        echo "do-while<br/>";
        echo "laço de repetição<br>";
        echo "a diferença para o while é que o laço é executado e depois ele será verificado<br>";

        $i = 0;
        do{
            echo $i;
            $i++;
        }
        while ($i < 12);

        echo "<br/><br/>";
        echo "goto<br/>";
        echo "cada vez menos usado por não ser uma boa prática de programação; <br/><br/>";

        echo "Super variáveis do PHP:<br>";

        echo "_SERVER[SERVER_ADDR] = " . $_SERVER["SERVER_ADDR"] . "<BR/>";
        echo "_SERVER[SERVER_NAME] = " . $_SERVER["SERVER_NAME"] . "<BR/>";
        echo "_SERVER[REMOTE_ADDR] = " . $_SERVER["REMOTE_ADDR"] . "<BR/>";

        echo "<br/> A variável _SERVER é apenas um exemplo dessas variáveis globais.<br/>Nos links abaixo, estão os manuais da _SERVER  e de outras super variáveis<br>";
        echo "https://www.php.net/manual/pt_BR/reserved.variables.server.php"."<br/>";
        echo "https://www.php.net/manual/pt_BR/language.variables.superglobals.php"."<br/><br/>";

        echo "include e require<br>";
        echo "Para fazer os testes com include e require, foi criado um arquivo auxiliar (aula2_auxiliar.php) com apenas um echo simples dentro.<br>";
        echo "ambos fazem uma chamada para o arquivo com a diferença que o require trava a execução se o arquivo não existir<br>";
        echo "para ambos, se apenas uma chamada for necessária, o comando fica com o _once<br>";

        echo "Início dos códigos include/require <br>";
        echo "1 - ";
        //include("aula2_auxiliar.php");
        echo "2 - ";
        //include_once("aula2_auxiliar.php");
        echo "3 - ";
        //include("aula2_auxiliar.php");

        echo "4 - ";
        //require("aula2_auxiliar.php");
        echo "5 - ";
        require_once("aula2_auxiliar.php");
        echo "6 - ";
        //require("aula2_auxiliar.php");
        echo "Fim dos códigos include/require <br><br/>";

        echo "header/ob_start/ob_flush<br>";
        echo "se o php estiver em uma versão anterior a 7, para usar a função header, é necessário usar o ob_start e o ob_flush.<br/>";
        echo "o ob_start() garante que nada será impresso na tela até o código acabar a execução, o liberando com o ob_flush.<br/>";

        //header("Location: http://www.google.com");

        echo "<br/>";
        echo "Funções (veja os exemplos no código)<br/> ";

        function minhaFuncaoDobro($valor){
            $valor *= 2;
            return $valor;
        }

        $x = minhaFuncaoDobro(23);

        echo "A minhaFuncaoDobro com o parâmetro 23 retornou: " . $x . "<br><br>";

        echo "try-catch<br/>";

        try{
            echo "tentando conectar num banco inexistente<br/>";
            mysql_connect("blablabla");
        }
        catch (Error $e){
            echo "Falha. O erro foi: <br/>";
            echo $e->getMessage()."<br>";
        }









        




?>

    </body>
</html>