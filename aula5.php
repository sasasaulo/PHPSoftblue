<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8"/>
        <title>PHP Datas e Funções Especiais</title>
    </head>
    <body>
    <h1>Curso de PHP - Softblue</h1>
            <br/>
            <br/>
            <h2>Datas e Funções Especiais:</h2><br/>
<?php

        define("BR", "<br/>");

        echo "A função time() retorna a diferença em segundos da data/hora atual e da data/ho da era Linux (01/01/1970 00:00:00)".BR;
        $agora = time();

        echo $agora.BR.BR;

        echo "Para formatar esses segundos, usa-se a função date().".BR;
        echo "é possível fornecer vários formatos para essa função. Exemplos:".BR;
        echo "date('Y-m-d H:i:s', time()): " . date("Y-m-d H:i:s",time()) . BR;
        echo "date('Y-m-d H:i:s'): " . date("Y-m-d H:i:s") . BR;
        echo "date('Y'): " . date("Y") . BR;
        echo "date('Y-m-d'): " . date("Y-m-d") . BR;
        echo "date('i:s'): " . date("i:s") . BR;
        echo "date('d H:i:s'): " . date("d H:i:s") . BR;
        echo "date('d/m/Y'): " . date("d/m/Y") . BR.BR;

        echo "A função strtotime() faz operações com data: ". BR;
        echo "strtotime('+ 1 day', time()): ". strtotime("+ 1 day", time()).BR.BR;
        echo "Como essa função retorna os segundos, é possível jogar a saída dela para uma variável e depois usar a date():".BR;

        $novotimestamp = strtotime("+ 1 day", time());
        echo date("Y-m-d H:i:s",$novotimestamp).BR.BR;

        echo "Também é possível colocar a função strtotime diretamente na função date:".BR;
        echo "date('Y-m-d H:i:s',strtotime('+ 1 day', time())) ===>>> ".date("Y-m-d H:i:s",strtotime("+ 1 day", time())) . BR;
        echo "date('Y-m-d H:i:s',strtotime('+ 7 day', time())) ===>>> ".date("Y-m-d H:i:s",strtotime("+ 7 day", time())) . BR;
        echo "date('Y-m-d H:i:s',strtotime('next monday', time())) ===>>> ".date("Y-m-d H:i:s",strtotime("next monday", time())) . BR;
        echo "date('Y-m-d H:i:s',strtotime('last friday', time())) ===>>> ".date("Y-m-d H:i:s",strtotime("last friday", time())) . BR;
        echo "date('Y-m-d H:i:s',strtotime('+ 1 month', time())) ===>>> ".date("Y-m-d H:i:s",strtotime("+ 1 month", time())) . BR;
        echo "date('Y-m-d H:i:s',strtotime('- 6 hour', time())) ===>>> ".date("Y-m-d H:i:s",strtotime("- 6 hour", time())) . BR;
        echo "date('Y-m-d H:i:s',strtotime('+ 2 week', time())) ===>>> ".date("Y-m-d H:i:s",strtotime("+ 2 week", time())) . BR.BR;

        echo "a função mktime() retorna um timestamp de uma data definida.".BR;
        echo "mktime(0,0,0,1,1,1980) ===>>>".mktime(0,0,0,1,1,1980).BR.BR;
        
        echo "Para verificar se a data é válida, é possível usar a função checkdate(): ".BR;
        
        if(checkdate(1,1,2104))
            echo "A função checkdate(1,1,2104) retornou verdadeiro".BR;
        else
            echo "A função checkdate(1,1,2104) retornou falso".BR;

        if(checkdate(14,5,2020))
            echo "A função checkdate(14,5,2020) retornou verdadeiro".BR;
        else
            echo "A função checkdate(14,5,2020) retornou falso".BR.BR;


        echo "Para saber a diferença de duas datas (em segundos, min, dias, etc), é necessário pegar o timestamp e fazer as operações matemáticas:".BR;

        $data1 = mktime(0,0,0,1,1,2019);
        $data2 = mktime(0,0,0,1,1,2020);

        $difSegundos = $data2 - $data1;
        echo "A diferença em segundos é ".$difSegundos.BR;

        $difMinutos = ($data2 - $data1) / 60;
        echo "A diferença em minutos é ".$difMinutos.BR;

        $difHoras = ($data2 - $data1) / 60 / 60;
        echo "A diferença em horas é ".$difHoras.BR;

        $difDias = ($data2 - $data1) / 60 / 60 / 24;
        echo "A diferença em dias é ".$difDias.BR;

        $difMeses = ($data2 - $data1) / 60 / 60 / 24 / 30;
        echo "A diferença em meses é ".$difMeses.BR;

        $difAnos = ($data2 - $data1) / 60 / 60 / 24 / 30 / 12;
        echo "A diferença em anos é ".$difAnos.BR;
?>
    
    </body>
</html>