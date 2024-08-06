<?php
    include("tipos_servico/valor_fixo.php");

    $custo_total = 0;

    $multiplicador_arquivamento;
    $multiplicador_conferencia;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Emolumentos</title>
</head>
<body>
    <h1>Doação - Simples</h1>
    <form action="" method="post">

        <p>Valor do ITCD:<input type="number" name="valor_itcd" id=""></p>

        <p>Possui matrícula aberta no  Registro?</p>
        <input type="hidden" name="abertura_matricula">
        <p>Sim<input type="radio" name="abertura_matricula" id="" value="sim"></p>
        <p>Não<input type="radio" name="abertura_matricula" id="" value="nao"></p>
        

        <p>Deseja adicionar alguma averbação?</p>
        <select name="adicionar_averbacao" id="">
            <option value="nao">Não</option>
            <option value="1">1 Averbação</option>
            <option value="2">2 Averbação</option>
            <option value="3">3 Averbação</option>
        </select><br>
        
        <button type="submit" name="calcular">Calcular</button>
        <button><a href="principal.php" style="text-decoration: none; color: black;">Voltar</a></button>
    </form>
</body>
</html>