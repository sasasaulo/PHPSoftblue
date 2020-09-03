<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>PHP - Manipulando Arquivos</title>
    </head>
    <body>
        <h1>Curso de PHP - Softblue</h1>
            <br/>
            <br/>
            <h2>Manipulação de arquivos:</h2><br/>
<?php

        define("BR", "<br/>");

        $filepath = "arquivos/arquivo_aula6.txt";
        //$filepath = "arquivo_aula6.txt";
        
        echo "A função is_file verifica se um arquivo existe. (o caminho pode ou não ser absoluto)".BR;

        if(is_file($filepath)){
            echo "O arquivo existe".BR;
        }
        else {
            echo "O arquivo não existe".BR;
        }

        echo BR."Para manipular arquivos, é necessário passar uma referência do arquivo através das funções fopen e fclose".BR;

        $meuArquivo = fopen($filepath, "a+");
        fwrite($meuArquivo, "Softblue");
        fwrite($meuArquivo, " - Curso de PHP");
        fclose($meuArquivo);

        echo "Após o uso dessas funções:".BR;

        if(is_file($filepath)){
            echo "O arquivo existe".BR;
        }
        else {
            echo "O arquivo não existe".BR;
        }

        echo BR;
        echo "para quebrar linhas usa-se o \+r ou o \+n dependendo do SO. Para garantir, usar os 2 juntos".BR;

        $meuArquivo = fopen($filepath, "a+");
        fwrite($meuArquivo, "Softblue");
        fwrite($meuArquivo, " - Curso de PHP");
        fwrite($meuArquivo, "\r\n");
        fwrite($meuArquivo, "Depois de pular linha");
        fclose($meuArquivo);


        echo "Para fazer a leitura de um arquivo é possível usar o buffer com a função fread: ".BR;

        $meuArquivo = fopen($filepath, "r");
        $buffer = fread($meuArquivo, 15);
        echo utf8_encode($buffer).BR;
        $buffer = fread($meuArquivo, 15);
        echo utf8_encode($buffer).BR;
        $buffer = fread($meuArquivo, 15);
        echo utf8_encode($buffer).BR;
        $buffer = fread($meuArquivo, 15);
        echo utf8_encode($buffer).BR;
        $buffer = fread($meuArquivo, 15);
        echo utf8_encode($buffer).BR;
        fclose($meuArquivo);

        echo BR."Ao passar um inteiro para a função fread, o buffer le apenas essa quantidade de bytes.".BR;
        echo "E usa um ponteiro para saber qual é o próximo caracter a ser lido.".BR;
        echo "Para usar todo o conteúdo do arquivo, usa-se a função filesize:".BR;

        $meuArquivo = fopen($filepath, "r");
        $buffer = fread($meuArquivo, filesize($filepath));
        echo utf8_encode($buffer).BR;
        fclose($meuArquivo);

        echo BR."É possível ler um arquivo através da função file().".BR;
        echo "Ele joga o resultado em um array. Depois é só utilizar um foreach para exibir na tela:".BR;

        $meuArray = file($filepath);
        foreach($meuArray as $elemento){
            echo "Linha do arquivo: ". utf8_encode($elemento) .BR;
        }

        echo BR."Para manipular diretórios, existe a função opendir e também a readdir (le os arquivos e diretórios do diretório passado): ".BR;

        $dir = opendir("../../../");
        echo readdir($dir).BR;
        echo readdir($dir).BR;
        echo readdir($dir).BR;
        echo readdir($dir).BR;
        echo readdir($dir).BR;
        echo readdir($dir).BR;
        closedir($dir);




?>
    </body>
</html>