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
    $codigo_busca_positiva = "($codigo_certidaounica) e ($codigo_busca)";
    $valor_busca_positiva = $valor_certidaounica + $valor_busca;
    //Busca com certidão negativa
    $nome_busca_negativa = "Busca com certidão negativa";
    $codigo_busca_negativa = "($codigo_certidaounica) e ($codigo_busca)";
    $valor_busca_negativa = $valor_certidaounica + $valor_busca;
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
        if(isset($_POST['onus'])){
            $custo_total += $valor_certidao;

        }
        if(isset($_POST['busca_positiva'])){
            $custo_total += $valor_certidaounica;
            $custo_total += $valor_busca;

        }
        if(isset($_POST['busca_negativa'])){
            $custo_total += $valor_certidaounica;
            $custo_total += $valor_busca;

        }

    if($custo_total==0){
?>
        <p>Selecione algum campo</p>
<?php
        die();
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
            <td><?php echo $codigo_inteiro?></td>
            <td><?php echo $nome_inteiro?></td>
            <td><?php echo $valor_inteiro?></td>
        </tr>
<?php
    }
?>
<?php
    if(isset($_POST['situacao'])){
?>
        <tr>
            <td><?php echo $codigo_situacao?></td>
            <td><?php echo $nome_situacao?></td>
            <td><?php echo $valor_situacao?></td>
        </tr>
<?php
    }
?>
<?php
    if(isset($_POST['onus'])){
?>
        <tr>
            <td><?php echo $codigo_onus?></td>
            <td><?php echo $nome_onus?></td>
            <td><?php echo $valor_onus?></td>
        </tr>
<?php
    }
?>
<?php
    if(isset($_POST['reipersecutoria'])){
?>
        <tr>
            <td><?php echo $codigo_reipersecutoria?></td>
            <td><?php echo $nome_reipersecutoria?></td>
            <td><?php echo $valor_reipersecutoria?></td>
        </tr>
<?php
    }
?>
<?php
    if(isset($_POST['busca_positiva'])){
?>
        <tr>
            <td><?php echo $codigo_busca_positiva?></td>
            <td><?php echo $nome_busca_positiva?></td>
            <td><?php echo $valor_busca_positiva?></td>
        </tr>
<?php
    }
?>
<?php
    if(isset($_POST['busca_negativa'])){
?>
        <tr>
            <td><?php echo $codigo_busca_negativa?></td>
            <td><?php echo $nome_busca_negativa?></td>
            <td><?php echo $valor_busca_negativa?></td>
        </tr>
<?php
    }
?>
    <tr>
        <th>Emolumentos Totais</th>
        <th></th>
        <th><?php echo $custo_total?></th>
    </tr>
<?php
    }
?>
    </table>
</body>
</html>