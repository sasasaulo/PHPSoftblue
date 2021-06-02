<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>PHP - Aula 7 - Anexando Arquivos </title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>Curso de PHP - Softblue</h1>
        <br/>
        <br/>
        <h2>Formulários - Anexando Arquivos:</h2><br/>


        <?php

            $erro = 0;

            if (isset($_REQUEST["envio"]) && $_REQUEST["envio"] = "true") {
                if (isset($_FILES["campoArquivo"])) {
                    $arquivoNome = $_FILES["campoArquivo"]["name"];
                    $arquivoTipo = $_FILES["campoArquivo"]["type"];
                    $arquivoTamanho = $_FILES["campoArquivo"]["size"];
                    $arquivoNomeTemp = $_FILES["campoArquivo"]["tmp_name"];
                    $erro = $_FILES["campoArquivo"]["error"]; //em caso de sucesso retorna 0

                    if ($erro == 0) {
                        if (is_uploaded_file($arquivoNomeTemp)) {
                            if (move_uploaded_file($arquivoNomeTemp, "uploads/".$arquivoNome)) {
                                echo "Sucesso!!!<br>";
                                echo "Nome: " . $arquivoNome . "<br>";
                                echo "Tipo: " . $arquivoTipo . "<br>";
                                echo "Tamanho: " . $arquivoTamanho . "<br>";
                                echo "Nome temporário: " . $arquivoNomeTemp . "<br>";
                            }
                            else {
                                $erro = "Erro no envio: arquivo não movido com sucesso. " . $erro;    
                            }
                        }
                        else {
                            $erro = "Erro no envio: arquivo não recebido com sucesso. " . $erro;
                        }
                    }
                    else {
                        $erro = "Erro no envio: " . $erro;
                    }
                }
                else {
                    $erro = "Arquivo enviado não encontrado.";
                }
            }

            // é necessário usar os 2 iguais
            if ($erro !== 0) {
                echo $erro;
            }
        
        ?>

        <form enctype="multipart/form-data" method=POST action="?envio=true">
            Arquivo: 
            <input type=FILE name="campoArquivo"><br>
            <input type=SUBMIT value="Enviar">
        </form>
    </body>
</html>