<?php

$valido = false;
$erro = null;

//Verificando se a variável REQUEST["validar"] existe e está preenchida 
//(para evitar mensagens na tela se não estiver) e se ela também possui o valor true 
if(isset($_REQUEST["validar"]) && $_REQUEST["validar"] == true) {

    //verificando o nome
    if (strlen(utf8_decode($_POST["nome"])) < 5){
        $erro = "preencha o nome corretamente (5 ou mais caracteres)";
    }
    else if (strlen(utf8_decode($_POST["email"])) < 6){
        $erro = "preencha o email corretamente (6 ou mais caracteres)";
    }
    else if (is_numeric($_POST["idade"]) == false){
        $erro = "preencha a idade corretamente";
    }
    else if ($_POST["sexo"] != "M" && $_POST["sexo"] != "F"){
        $erro = "selecione o sexo corretamente";
    }
    else if ($_POST["estadocivil"] != "Solteiro(a)" &&
                $_POST["estadocivil"] != "Casado(a)" &&
                $_POST["estadocivil"] != "Divorciado(a)" &&
                $_POST["estadocivil"] != "Viúvo(a)") {
        $erro = "Selecione o estado civil corretamente";
    }
    else {
        $valido = true;
    }
}


?>


<!DOCTYPE html>

<html lang = "pt-br">
    <head>
        <title>PHP - Formulários Avançados</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if ($valido) {
                echo "dados enviados com suuuuucesso!!!";
            }
            else {

                if (isset($erro)) {
                    echo $erro . "<br><br>";
                }
            ?>

            <!-- Quando o action é omitido, significa que ele vai enviar para a própria página -->
            <form method="POST" action="?validar=true">
                Nome: 
                <input type=TEXT name=nome 
                    <?php if(isset($_POST["nome"])) { echo "value='" . $_POST["nome"] . "'"; } ?>
                ><br/>
                
                E-mail:
                <input type=TEXT name=email 
                    <?php if(isset($_POST["email"])) { echo "value='" . $_POST["email"] . "'"; } ?>
                >
                <br/>
                
                Idade:
                <input type=TEXT name=idade 
                    <?php if(isset($_POST["idade"])) { echo "value='" . $_POST["idade"] . "'"; } ?>
                >
                <br>

                Sexo:
                <input type=RADIO name=sexo value="M"
                    <?php if(!isset($_POST["sexo"]) || isset($_POST["sexo"]) && $_POST[sexo] == "M") { echo "checked"; } ?>>Masculino
                <input type=RADIO name=sexo value="F"
                    <?php if(isset($_POST["sexo"]) && $_POST[sexo] == "F") { echo "checked"; } ?>>Feminino
                <br>

                Interesses:
                <input type=CHECKBOX name="humanas" 
                    <?php if (isset($_POST["humanas"])) { echo "checked"; }?>>Ciências Humanas
                <input type=CHECKBOX name="exatas" 
                    <?php if (isset($_POST["exatas"])) { echo "checked"; }?>>Ciências Exatas
                <input type=CHECKBOX name="biologicas" 
                    <?php if (isset($_POST["biologicas"])) { echo "checked"; }?>>Ciências Biológicas
                <br>

                Estado civil:
                <SELECT name="estadocivil">
                    <option>Selecione...</option>
                    <option 
                        <?php if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Solteiro(a)") { echo "selected"; }?>>Solteiro(a)</option>
                    <option 
                        <?php if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Casado(a)") { echo "selected"; }?>>Casado(a)</option>
                    <option 
                        <?php if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Divorciado(a)") { echo "selected"; }?>>Divorciado(a)</option>
                    <option 
                        <?php if (isset($_POST["estadocivil"]) && $_POST["estadocivil"] == "Viúvo(a)") { echo "selected"; }?>>Viúvo(a)</option>
                </select>
                <br>

                Senha:
                <input type=password name=senha>
                <br>

                <input type=submit value="Enviar">

            </form>
        <?php 
        //fechamento do else do suuuucesso    
        }
        ?>
    </body>
</html>