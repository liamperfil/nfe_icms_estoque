<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <title>GO | </title>
</head>
<body>
    <form action="index.php" method="post" autocomplete="off">
        <input type="text" name="chave" id="chave" placeholder="chave de acesso" pattern="[0-9]{44}" required autofocus title="Chave de acesso com 44 caracteres apenas números">
        <input type="submit" value="Enviar" id="submit" name="submit">
    </form>
    <p id="paragraph"></p>
    
    <?php
        if (isset($_POST['submit'])) 
        {
            $chave = $_POST['chave'] . ".xml";
            include_once('config.php');
        }
        
    ?>
    <script src="script.js"></script>
</body>
</html>