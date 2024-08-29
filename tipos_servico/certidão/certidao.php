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


<main>
<img src="assets/logo-calculadora-nome.svg" alt="" srcset="" id="logo">
    <h1>CALCULADORA DE EMOLUMENTOS</h1>
    <h2>Certidões</h2>
    <div class="form-area">
        <p class="text-servico">Escolha o tipo de Averbação:</p>
        <form action="" method="post">
            
            <form action="" method="post">
                <label for="inteiro"><div class="bt-type-radio">
                    <p class="text-type-radio">Certidão Inteiro Teor de matrícula</p><input type="checkbox" name="inteiro" id="inteiro">
                </div></label>
                <label for="situacao"><div class="bt-type-radio">
                    <p class="text-type-radio">Certidão de Situação Jurídica</p><input type="checkbox" name="situacao" id="situacao">
                </div></label>
                <label for="onus"><div class="bt-type-radio">
                    <p class="text-type-radio">Certidão de Ônus</p><input type="checkbox" name="onus" id="onus">
                </div></label>
                <label for="reipersecutoria"><div class="bt-type-radio">
                    <p class="text-type-radio">Certidão Reipersecutória</p><input type="checkbox" name="reipersecutoria" id="reipersecutoria">
                </div></label>
                <label for="busca_positiva"><div class="bt-type-radio">
                    <p class="text-type-radio">Busca com certidão positiva</p><input type="checkbox" name="busca_positiva" id="busca_positiva">
                </div></label>
                <label for="busca_negativa"><div class="bt-type-radio">
                    <p class="text-type-radio">Busca com certidão negativa</p><input type="checkbox" name="busca_negativa" id="busca_negativa">
                </div></label>
            
                <div class="bt-final-area">

                    <label for="voltar"><button class="bt-final"><a id="voltar" href="principal.php" style="text-decoration: none; color: white;">Voltar</a></button></label>
                    <label for="calcular"><button type="submit" name="calcular" class="bt-final" id="calcular">Calcular</button></label>

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
    <table id="tabela">
                <tr>
                    <th class="start-table" id="primeiro-table">Código</th>
                    <th class="start-table">Ato</th>
                    <th class="start-table" id="ultimo-table">Valor</th>
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
    <tr>
                <th class="end-table" id="inicio-result">
                    Emolumentos Totais
                </th>
                <th class="end-table"></th>  
                <th class="end-table" id="fim-result">
                    <?php echo "R$ ".$custo_total = number_format($custo_total, 2, ',', '.') ?>
                </th>
            </tr>
<?php
    }
?>
    </table>
</main>
</html>