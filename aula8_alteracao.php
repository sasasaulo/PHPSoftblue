<?php

$valido = false;
$erro = null;

//banco de dados
try {
    //estabelecendo uma conexão com o bd
    $connection = new PDO("mysql:host=localhost;dbname=cursoPhpSoftblue","root", "root");

    //caso a conexão de certo, usar o utf8 entre o mysql e o php
    $connection->exec("set names utf8");
}
catch (PDOException $e) {
    echo "Falha trycatch bd: " . $e->getMessage();
    exit();
}

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

        $sql = "UPDATE usuarios SET 
                nome = ?, 
                email = ?, 
                idade = ?,
                sexo = ?, 
                estadocivil = ?, 
                humanas = ?, 
                exatas = ?, 
                biologicas = ?
                WHERE id = ?";

        //criando o statement    
        $stmt = $connection->prepare($sql);
        
        //associando as ??? para os parâmetros passados
        $stmt->bindParam(1, $_POST["nome"]);
        $stmt->bindParam(2, $_POST["email"]);
        $stmt->bindParam(3, $_POST["idade"]);
        $stmt->bindParam(4, $_POST["sexo"]);
        $stmt->bindParam(5, $_POST["estadocivil"]); 

        $checkHumanas = isset($_POST["humanas"]) ? 1 : 0;
        $stmt->bindParam(6, $checkHumanas);

        $checkExatas = isset($_POST["exatas"]) ? 1 : 0;
        $stmt->bindParam(7, $checkExatas);

        $checkBiologicas = isset($_POST["biologicas"]) ? 1 : 0;
        $stmt->bindParam(8, $checkBiologicas);

        //senha encriptada com o uso de sementes (seed)
        //$stmt->bindParam(9, md5("fckjcnksjncksjnckjnckjnsc" . $_POST["senha"]));

        $stmt->bindParam(9, $_POST["id"]);

        $stmt->execute();

        if ($stmt->errorCode() != "00000") {
            $valido = false;
            $erro = "Erro código: " . $stmt->errorCode() . ": <br>";
            $erro .= implode(", ",$stmt->errorInfo());
        }
    }
}
else {
    $rs = $connection->prepare("SELECT * FROM usuarios WHERE id = ?");
    $rs->bindParam(1, $_REQUEST["id"]);

    if ($rs->execute()) {
        if ($registro = $rs->fetch(PDO::FETCH_OBJ)) {
            //populando as variaveis de entrada:
            $_POST["nome"] = $registro->nome;
            $_POST["email"] = $registro->email;
            $_POST["idade"] = $registro->idade;
            $_POST["sexo"] = $registro->sexo;
            $_POST["estadocivil"] = $registro->estadocivil;
            $_POST["humanas"] = $registro->humanas == 1 ? true : null;
            $_POST["exatas"] = $registro->exatas == 1 ? true : null;
            $_POST["biologicas"] = $registro->biologicas == 1 ? true : null;

        }
        else {
            $erro = "Registro não encontrado";
        }
    }
    else {
        echo "Falha na captura do registro";
    }

}


?>


<!DOCTYPE html>

<html lang = "pt-br">
    <head>
        <title>PHP - Aula 8 - Alteração</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
            if ($valido) {
                echo "dados enviados com suuuuucesso!!!<br>";
                echo "<a href='aula8.php'>Criar novo registro</a><br/>";
                echo "<a href='aula8_lista.php'>Visualizar dados</a><br/>";
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

                <input type=hidden name=id value="<?php echo $_REQUEST["id"]; ?>">

                <input type=submit value="Alterar">

            </form>
        <?php 
        //fechamento do else do suuuucesso    
        }
        
        ?>
    </body>
</html>