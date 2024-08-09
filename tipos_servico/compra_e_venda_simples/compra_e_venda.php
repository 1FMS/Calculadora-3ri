<?php
    //chamada BD e tabela de valor fixo
    include("tipos_servico/valor_fixo.php");
    
    $valor_compra_e_venda;
    $valor_itbi;
    $valor_base;
    $custo_total = 0;

    $custo_servico;
    $codigo_servico;
    $nome_servico = "Compra e Venda";

    $numero_averbacoes;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de emolumentos</title>
</head>
<body>
    <h1>Compra e Venda - Simples</h1>

    <form action="" method="post">
        <p>Valor da compra e venda:<input type="number" name="valor_compra_e_venda" id=""></p>
    
        <p>Valor ITBI:<input type="number" name="valor_itbi" id=""></p>

        <p>Possui matrícula aberta no 3º Registro?</p>
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


        $valor_compra_e_venda = $_POST['valor_compra_e_venda'];
        $valor_itbi = $_POST['valor_itbi'];
        
    

    
        if(empty($valor_compra_e_venda) || empty($valor_itbi) || $_POST['abertura_matricula']==''){
           
    ?>
            <p>Preencha todos os campos</p>
    <?php
            die();   
        }
        
        if($valor_compra_e_venda>$valor_itbi){
            $valor_base = $valor_compra_e_venda;
        }else{
            $valor_base = $valor_itbi;
        }
        $valor_base = floatval(str_replace(",", ".", $valor_base));

        
        if($_POST['abertura_matricula']=='nao'){
            $multiplicador_arquivamento = 8;
            $multiplicador_conferencia = 8;
        }elseif($_POST['abertura_matricula']=='sim'){
            $multiplicador_conferencia = 8;
            $multiplicador_arquivamento = 6;
        }


        if($_POST['adicionar_averbacao'] != 'nao'){
            $numero_averbacoes =  $_POST['adicionar_averbacao'];
        }

        if($valor_base>7387676.85){
            $custo_servico = 21729.18;
            $codigo_servico = "16.3.36";
            $custo_total +=$custo_servico;
            $custo_total+=($valor_arquivamento * $multiplicador_arquivamento);
            $custo_total+=$valor_certidao;
            $custo_total+=($valor_conferencia * $multiplicador_conferencia);
            $custo_total+=$valor_prenotacao;

        }
        elseif($valor_base<7387676.85){
            $sql_code_verificar_restricao = "SELECT * FROM servico_valor_declarado WHERE restricao_inicial <='$valor_base' AND restricao_final >= '$valor_base'";
            $sql_exec__verificar_restricao = $mysqli->query($sql_code_verificar_restricao);
            $dados_verificar_restricoes = $sql_exec__verificar_restricao -> fetch_assoc();


            $codigo_servico = $dados_verificar_restricoes['codigo_valor_declarado'];
            $custo_servico = $dados_verificar_restricoes['total_valor_declarado'];
            $custo_total += $custo_servico;
            $custo_total+=($valor_arquivamento * $multiplicador_arquivamento);
            $custo_total+=$valor_certidao;
            $custo_total+=($valor_conferencia * $multiplicador_conferencia);
            $custo_total+=$valor_prenotacao;
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
            <td><?php echo $nome_certidao?></td>
            <td><?php echo "R$ ".$valor_certidao?></td>
        </tr>
        <tr>
            <td><?php echo $codigo_servico?></td>
            <td><?php echo $nome_servico?></td>
            <td><?php echo "R$ ".$custo_servico?></td>
        </tr>
        <?php
            if($_POST['abertura_matricula']=='nao'){
                $custo_total += $valor_matricula;
                $custo_total += $valor_semvalor;
                $custo_total += $valor_comunicacao;
        ?>
            <tr>
                <td><?php echo $codigo_matricula?></td>
                <td><?php echo $nome_matricula. "(3º Registro de Imóveis)"?></td>
                <td><?php echo "R$ ".$valor_matricula?></td>
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
            }
            if($_POST['adicionar_averbacao'] != 'nao'){
                $custo_total += $valor_semvalor * $numero_averbacoes;
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
            <th>
                Emolumentos Totais
            </th>
            <th>
                
            </th>
            <th>
                <?php echo "R$ ".$custo_total ?>
            </th>
        </tr>
        

    </table>
    <?php
    

    
    } 
    
    ?>

</body>
</html>
