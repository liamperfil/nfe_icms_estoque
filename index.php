<?php
if ( isset($_POST['submit']) && !empty($_POST['chavexml']) ) {
    include_once('config.php');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@IDJEANLIMA | NFE ICMS</title>
</head>
<body>

    <form action="index.php" method="post" autocomplete="off">
        <input type="text" name="chavexml" id="chavexml" placeholder="chave xml" autofocus required pattern="[0-9]{44}" 
        size="44" title="(Padrão chave xml, 44 caracteres, apenas números.)">
        <input type="submit" name="submit" id="submit" value="Enviar">
    </form>

</body>
</html>
