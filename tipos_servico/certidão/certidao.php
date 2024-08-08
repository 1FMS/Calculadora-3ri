<?php
    include("tipos_servico/valor_fixo.php");

    $custo_total = 0;

    $multiplicador_arquivamento;
    $multiplicador_conferencia;

    //Inteiro Teor de Matrícula
    $nome_inteiro = "Certidão Inteiro Teor de matrícula";
    $codigo_inteiro = $codigo_certidao;
    $valor_inteiro = $valor_certidao;
    //Situação Jurídica
    $nome_situacao = "Certidão de Situação Jurídica";
    $codigo_situacao = $codigo_certidao;
    $valor_situacao = $valor_certidao;
    //Ônus
    $nome_onus = "Certidão de Ônus";
    $codigo_onus = $codigo_certidao;
    $valor_onus = $valor_certidao;
    //Reipersecutória
    $nome_reipersecutoria = "Certidão Reipersecutória";
    $codigo_reipersecutoria = $codigo_certidao;
    $valor_reipersecutoria = $valor_certidao;
    //Busca com certidão positiva
    $nome_busca_positiva = "Busca com certidão positiva";
    $codigo_busca_positiva = $codigo_certidao;
    $valor_busca_positiva = $valor_certidao;
    //Busca com certidão negativa
    $nome_busca_negativa = "Busca com certidão negativa";
    $codigo_busca_negativa = $codigo_certidao;
    $valor_busca_negativa = $valor_certidao;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Emolumentos</title>
</head>
<body>
    <h1>Certidões</h1>
    <form action="" method="post">
    <p>Escolha o tipo de Averbação:</p>
    <form action="" method="post">
        <p>Certidão Inteiro Teor de matrícula<input type="checkbox" name="inteiro"></p>
        <p>Certidão de Situação Jurídica<input type="checkbox" name="situacao"></p>
        <p>Certidão de Ônus<input type="checkbox" name="onus"></p>
        <p>Certidão Reipersecutória<input type="checkbox" name="reipersecutoria"></p>
        <p>Busca com certidão positiva<input type="checkbox" name="busca_positiva"></p>
        <p>Busca com certidão negativa<input type="checkbox" name="busca_negativa"></p>

        <button type="submit" name="calcular">Calcular</button>
        <button><a href="principal.php" style="text-decoration: none; color: black;">Voltar</a></button>
    </form>
        
<?php
    if(isset($_POST['calcular'])){
        if(isset($_POST['inteiro'])){
            $custo_total += $valor_certidao;

        }
        if(isset($_POST['situacao'])){
            $custo_total += $valor_certidao;

        }
        if(isset($_POST['reipersecutoria'])){
            $custo_total += $valor_certidao;

        }
        if(isset($_POST['busca_positiva'])){
            $custo_total += $valor_certidao;

        }
        if(isset($_POST['inteiro'])){
            $custo_total += $valor_certidao;

        }
?>
    <table>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Valor</th>
        </tr>
<?php
    if(isset($_POST['inteiro'])){
?>
        <tr>
            <th><?php echo $codigo_inteiro?></th>
            <th><?php echo $nome_inteiro?></th>
            <th><?php echo $valor_inteiro?></th>
        </tr>
<?php
    }

    }
?>
    </table>
</body>
</html>