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
        <h2>Formulários e dados simples:</h2><br/>
        
        <form method=POST action="aula7_dados.php">
            Nome: 
            <input type=text name=nome><br/>

            Sobrenome:
            <input type=text name=sobrenome><br/>

            Estado civil:
            <select name=estadocivil>
                <option>Solteiro</option>
                <option>casado</option>
                <option>Divorciado</option>
                <option>Viúvo</option>
            </select><br>

            <INPUT name=idade value="30">

            <input type=reset value="Limpar">

            <input type=submit value = "Enviar">
        </form> 
        <br/>
        <br/>
    </body>
</html>