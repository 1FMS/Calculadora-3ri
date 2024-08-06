<?php
    //chamada BD e tabela de valor fixo
    include("tipos_servico/valor_fixo.php");

    $multiplicador_arquivamento;
    $multiplicador_conferencia;

    $custo_abertura;
    $codigo_abertura;
    $nome_abertura;

    $custo_transporte = $valor_semvalor;
    $codigo_transporte = $codigo_semvalor;
    $nome_transporte = "Transporte de Ônus";

    $custo_cancelamento = $valor_semvalor;
    $codigo_cancelamento = $codigo_semvalor;
    $nome_cancelamento = "Cancelamento de Ônus";

    $custo_total = 0;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Emolumentos</title>
</head>
<body>
    <h1>Abertura de Matrícula</h1>
    <p>Selecione o tipo:</p>
    <form action="" method="post">
    <input type="hidden" name="tipo_abertura">
    <p>Abertura comum<input type="radio" name="tipo_abertura" value="comum"></p>
    <p>Abertura + Transporte de Ônus<input type="radio" name="tipo_abertura" value="transporte"></p>
    <p>Abertura + Transporte de Ônus + Cancelamento de Ônus<input type="radio" name="tipo_abertura" value="transporte_cancelamento"></p>
    
    <button type="submit" name="calcular">Calcular</button>
    <button><a href="principal.php" style="text-decoration: none; color: black;">Voltar</a></button>

    </form>
</body>

<?php
    if(isset($_POST['calcular'])){
        if($_POST['tipo_abertura']==''){
?>
             <p>Selecione algum campo</p>
<?php   
            die();
        }
       $tipo_de_abertura = $_POST['tipo_abertura'];
        if($tipo_de_abertura=="comum"){
            $custo_abertura = $valor_matricula;
            $codigo_abertura = $codigo_matricula;
            $nome_abertura = $nome_matricula;

            $multiplicador_arquivamento = 3;
            $multiplicador_conferencia = 2;

            $custo_total += $custo_abertura;
            $custo_total += ($valor_arquivamento*$multiplicador_arquivamento);
            $custo_total += ($valor_conferencia*$multiplicador_conferencia);
            $custo_total += $valor_prenotacao;
            $custo_total += $valor_certidao;
            $custo_total += $valor_semvalor;
            $custo_total += $valor_comunicacao;
        }elseif($tipo_de_abertura== "transporte"){
            $custo_abertura = $valor_matricula;
            $codigo_abertura = $codigo_matricula;
            $nome_abertura = $nome_matricula;

            $multiplicador_arquivamento = 3;
            $multiplicador_conferencia = 2;

            $custo_total += $custo_abertura;
            $custo_total += ($valor_arquivamento*$multiplicador_arquivamento);
            $custo_total += ($valor_conferencia*$multiplicador_conferencia);
            $custo_total += $valor_prenotacao;
            $custo_total += $valor_certidao;
            $custo_total += $valor_semvalor;
            $custo_total += $valor_semvalor;
            $custo_total += $valor_comunicacao;

    }elseif($tipo_de_abertura== "transporte_cancelamento"){
            $custo_abertura = $valor_matricula;
            $codigo_abertura = $codigo_matricula;
            $nome_abertura = $nome_matricula;

            $multiplicador_arquivamento = 9;
            $multiplicador_conferencia = 5;

            $custo_total += $custo_abertura;
            $custo_total += ($valor_arquivamento*$multiplicador_arquivamento);
            $custo_total += ($valor_conferencia*$multiplicador_conferencia);
            $custo_total += $valor_prenotacao;
            $custo_total += $valor_certidao;
            $custo_total += $valor_semvalor *2;
            $custo_total += $valor_semvalor;
            $custo_total += $valor_comunicacao;
    }


?>
<table>
        <tr>
            <th>Código</th>
            <th>Nome</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td><?php echo $codigo_prenotacao?></td>
            <td><?php echo $nome_prenotacao?></td>
            <td><?php echo "R$ ".$valor_prenotacao?></td>
        </tr>
        <tr>
            <td><?php echo $codigo_arquivamento?></td>
            <td><?php echo $nome_arquivamento . " ($multiplicador_arquivamento x)"?></td>
            <td><?php echo "R$ ".($valor_arquivamento * $multiplicador_arquivamento)?></td>
        </tr>
        <tr>
            <td><?php echo $codigo_conferencia?></td>
            <td><?php echo $nome_conferencia . " ($multiplicador_conferencia x) "?></td>
            <td><?php echo "R$ ".($valor_conferencia * $multiplicador_conferencia)?></td>
        </tr>
        <tr>
            <td><?php echo $codigo_certidao?></td>
            <td><?php echo $nome_certidao . ("(Certidão da Matrícula Atualizada)")?></td>
            <td><?php echo "R$ ".$valor_certidao?></td>
        </tr>
        <tr>
            <td><?php echo $codigo_abertura?></td>
            <td><?php echo $nome_abertura?></td>
            <td><?php echo "R$ ".$custo_abertura?></td>
        </tr>
        <tr>
            <td><?php echo $codigo_semvalor?></td>
            <td><?php echo " Encerramento de matrícula (1º Registro de Imóveis)"?></td>
            <td><?php echo "R$ ".$valor_semvalor?></td> 
        </tr>

            <tr>
                <td><?php echo $codigo_comunicacao?></td>
                <td><?php echo $nome_comunicacao. "(1º Registro de Imóveis)"?></td>
                <td><?php echo "R$ ".$valor_comunicacao?></td> 
            </tr>
        <?php
            if($tipo_de_abertura == 'transporte'){
        ?>
                <tr>
                    <td><?php echo $codigo_transporte?></td>
                    <td><?php echo $nome_transporte?></td>
                    <td><?php echo "R$ ".$custo_transporte?></td>
                </tr>
                
        <?php
            }elseif($tipo_de_abertura == 'transporte_cancelamento'){
        ?>
                <tr>
                    <td><?php echo $codigo_transporte?></td>
                    <td><?php echo $nome_transporte?></td>
                    <td><?php echo "R$ ".$custo_transporte?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_cancelamento?></td>
                    <td><?php echo $nome_cancelamento?></td>
                    <td><?php echo "R$ ".$custo_cancelamento?></td>
                </tr>
        <?php 
            }
         
        ?>
        <tr>
            <th>
                Emolumentos Totais
            </th>
            <th>
                
            </th>
            <th>
                <?php echo "R$ ".$custo_total ?>
            </th>
        </tr>
        <?php 
            }
         
        ?>
</table>    
</html>