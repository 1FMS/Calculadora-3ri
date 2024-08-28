<?php
    include("tipos_servico/valor_fixo.php");

    $custo_total = 0;

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

    <style>
        body{
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;

            margin: 20px;

            background-color: #f5f5f5;
        }
        #logo {
            width: 360px;
            height: auto;
        }
        h1{
            color: #8A997A;
            text-align: center;
        }
        .form-area{

            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;

            margin-bottom: 10px;

            background-color: white;
            padding: 15px;
            border: 2px solid #314b33;
            border-radius: 5px;
        }
        .bt-servico{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: center;

            width: auto;
            height: 40px;
            margin-bottom: 10px;
            padding: 10px;

            border: 2px solid #314b33;
            border-radius: 5px;

            background-color: #9DAF89;

            color: white;
            font-size: 17px;
            font-weight: 600;
        }
        #text-servico{
            color: #8A997A;
            font-size: larger;
        }
        .text-servico{
            color: #8A997A;
            
        }
        .bt-input-radio{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-between;
            align-items: center;

            width: auto;
            height: 40px;
            margin-bottom: 10px;
            padding: 10px;

            border: 2px solid #314b33;
            border-radius: 5px;

            background-color: #9DAF89;

            color: white;
            font-size: 17px;
            font-weight: 600;
        }
        input{
            transform: scale(1.5);
            border: 2px solid red;
        }
        button{
            border: 2px solid #314b33;
            border-radius: 5px;

            background-color: #9DAF89;

            color: white;
            font-size: 17px;
            font-weight: 600;
        }
        .bt-final{
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-evenly;
            align-items: center;
        }
        table{
            border: 2px solid black;
            border-collapse: collapse
        }
        table, td, th{
            border: 2px solid #314b33;
        }
        td,th{
            padding: 4px;
        }
    </style>
</head>
<body>
    <img src="assets/LOGO_3RI 1_layerstyle.svg" alt="" srcset="" id="logo">
    <h1>Certidões</h1>
    <div class="form-area">
        <p id="text-servico">Escolha o tipo de Averbação:</p>
        <form action="" method="post">
            
            <form action="" method="post">
                <div class="bt-servico">
                    <p>Certidão Inteiro Teor de matrícula</p><input type="checkbox" name="inteiro">
                </div>
                <div class="bt-servico">
                    <p>Certidão de Situação Jurídica</p><input type="checkbox" name="situacao">
                </div>
                <div class="bt-servico">
                    <p>Certidão de Ônus</p><input type="checkbox" name="onus">
                </div>
                <div class="bt-servico">
                    <p>Certidão Reipersecutória</p><input type="checkbox" name="reipersecutoria">
                </div>
                <div class="bt-servico">
                    <p>Busca com certidão positiva</p><input type="checkbox" name="busca_positiva">
                </div>
                <div class="bt-servico">
                    <p>Busca com certidão negativa</p><input type="checkbox" name="busca_negativa">
                </div>
            
                <div class="bt-final">
                    <button type="submit" name="calcular">Calcular</button>
                    <button><a href="principal.php" style="text-decoration: none; color: white;">Voltar</a></button>
                </div>
        </form>
    </div>
    
        
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
            <td><?php echo "R$ ".$valor_inteiro = number_format($valor_inteiro, 2, ',', '.')?></td>
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
            <td><?php echo "R$ ".$valor_situacao = number_format($valor_situacao, 2, ',', '.')?></td>
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
            <td><?php echo "R$ ".$valor_onus = number_format($valor_onus, 2, ',', '.')?></td>
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
            <td><?php echo "R$ ".$valor_reipersecutoria = number_format($valor_reipersecutoria, 2, ',', '.')?></td>
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
            <td><?php echo "R$ ".$valor_busca_positiva = number_format($valor_busca_positiva, 2, ',', '.')?></td>
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
            <td><?php echo "R$ ".$valor_busca_negativa = number_format($valor_busca_negativa, 2, ',', '.')?></td>
        </tr>
<?php
    }
?>
    <tr style=" background-color: #314b33; color:white">
        <th>Emolumentos Totais</th>
        <th></th>
        <th><?php echo "R$ ".$custo_total = number_format($custo_total, 2, ',', '.')?></th>
    </tr>
<?php
    }
?>
    </table>
</body>
</html>