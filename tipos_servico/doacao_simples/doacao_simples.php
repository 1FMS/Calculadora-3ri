<?php
    include("tipos_servico/valor_fixo.php");

    $custo_total = 0;

    $numero_averbacoes;

    $multiplicador_arquivamento;
    $multiplicador_conferencia;

    $valor_itcd;
    $custo_servico_doacao;
    $codigo_servico_doacao;
    $nome_doacao = "Doação Simples";
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
    <?php
    
        if(isset($_POST['calcular'])){
            $valor_itcd = $_POST['valor_itcd'];

            if(empty($valor_itcd) || $_POST['abertura_matricula']==''){
    ?>

                <p>Preencha os campos</p>
    <?php
                die();
            }

            if($valor_itcd>=7387676.85){
                $custo_servico_doacao = 21729.18;
                $codigo_servico_doacao = "16.3.36";
                $custo_total +=$custo_servico_doacao;

    
            }elseif($valor_itcd<7387676.85){
                $sql_code_verificar_restricao = "SELECT * FROM servico_valor_declarado WHERE restricao_inicial <='$valor_itcd' AND restricao_final >= '$valor_itcd'";
                $sql_exec__verificar_restricao = $mysqli->query($sql_code_verificar_restricao);
                $dados_verificar_restricoes = $sql_exec__verificar_restricao -> fetch_assoc();

                $codigo_servico_doacao = $dados_verificar_restricoes['codigo_valor_declarado'];
                $custo_servico_doacao = $dados_verificar_restricoes['total_valor_declarado'];
                $custo_total +=$custo_servico_doacao;

            }

            if($_POST['adicionar_averbacao']!= 'nao'){
                $numero_averbacoes = $_POST['adicionar_averbacao'];

                $custo_total += ($numero_averbacoes * $valor_semvalor);
    

            }

            if($_POST['abertura_matricula']=='sim'){
                $multiplicador_arquivamento = 6;
                $multiplicador_conferencia = 8;

                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;
                $custo_total += $valor_arquivamento * $multiplicador_arquivamento;
                $custo_total += $valor_conferencia * $multiplicador_conferencia;
            }elseif($_POST['abertura_matricula']== 'nao'){
                $multiplicador_arquivamento = 8;
                $multiplicador_conferencia = 8;

                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;
                $custo_total += $valor_arquivamento * $multiplicador_arquivamento;
                $custo_total += $valor_conferencia * $multiplicador_conferencia;

                $custo_total += $valor_matricula;
                $custo_total += $valor_comunicacao;
                $custo_total += $valor_semvalor;//encerramento
                $custo_total += $valor_prenotacao;
            }
    ?>
            <table>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Valor</th>
                </tr>
                <tr>
                    <td><?php echo $codigo_servico_doacao?></td>
                    <td><?php echo $nome_doacao?></td>
                    <td><?php echo $custo_servico_doacao?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_prenotacao?></td>
                    <td><?php echo $nome_prenotacao?></td>
                    <td><?php echo $valor_prenotacao?></td>
                </tr>
                
                <tr>
                    <td><?php echo $codigo_arquivamento?></td>
                    <td><?php echo $nome_arquivamento. " ($multiplicador_arquivamento x)"?></td>
                    <td><?php echo $valor_arquivamento * $multiplicador_arquivamento?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_conferencia?></td>
                    <td><?php echo $nome_conferencia. " ($multiplicador_conferencia x)"?></td>
                    <td><?php echo $valor_conferencia * $multiplicador_conferencia?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_certidao?></td>
                    <td><?php echo $nome_certidao?></td>
                    <td><?php echo $valor_certidao?></td>
                </tr>

    <?php
            if($_POST['abertura_matricula']=='nao'){
    ?>
                <tr>
                    <td><?php echo $codigo_matricula?></td>
                    <td><?php echo $nome_matricula?></td>
                    <td><?php echo $valor_matricula?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_prenotacao?></td>
                    <td><?php echo $nome_prenotacao. '(1º RI)'?></td>
                    <td><?php echo $valor_prenotacao?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo "Encerramento Matrícula (1º RI)"?></td>
                    <td><?php echo $valor_semvalor?></td>
                </tr>

                <tr>
                    <td><?php echo $codigo_comunicacao?></td>
                    <td><?php echo $nome_comunicacao. "(1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_comunicacao?></td> 
                </tr>
    <?php
            }
            if($_POST["adicionar_averbacao"] != "nao"){
    ?>
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo "Averbações". "($numero_averbacoes x)"?></td>
                    <td><?php echo "R$ ".($valor_semvalor * $numero_averbacoes)?></td> 
                </tr>
    <?php
            }
    ?>
            <tr>
                <th>Emolumentos Totais</th>
                <th></th>
                <th><?php echo $custo_total?></th>
            </tr>
            </table>
    <?php
        }
    
    ?>

</body>
</html>