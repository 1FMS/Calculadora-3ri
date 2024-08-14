<?php
    include("tipos_servico/valor_fixo.php");

    $custo_total = 0;

    //Averb. construção
    $codigo_servico_averb_contrucao;
    $nome_servico_averb_construcao = "Averbação de construção";
    $valor_servico_averb_construcao;
    $valor_averb_construcao;

   
    $numero_averbacoes;

    $valor_arquivamento_final;
    $valor_conferencia_final;
    $valor_averbacao_final;;

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Calculadora de Emolumentos</title>
</head>
<body>
    <h1>Averbação de construção</h1>

    <form action="" method="post">
        <p>Valor da construção: <input type="text" name="valor_construcao" id="valor_construcao"></p>
        <script>
            $(document).ready(function() {
                $('#valor_construcao').on('input', function() {
                    const valor = $(this).val().replace(/\D/g, ''); // Remove caracteres não numéricos
                    const valorFormatado = (Number(valor) / 100).toLocaleString('pt-BR', {
                        style: 'currency',
                        currency: 'BRL',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2
                    });
                    $(this).val(valorFormatado);
                });
            });
        </script>

        <p>Possui matrícula aberta no 3° Registro?</p>
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
            

            if(empty($_POST['valor_construcao']) || empty($_POST['abertura_matricula'])){
    ?>
            
                <p>Preencha todos os campos</p>
    <?php
                die();
            }

            $valor_averb_construcao = $_POST['valor_construcao'];
            $valorNumericoconstrucao = preg_replace('/[^0-9]/', '', $_POST['valor_construcao']);
            $valorFormatadoconstrucao = number_format($valorNumericoconstrucao / 100, 2, ",", "");
            $valorFormatadoconstrucao = floatval(str_replace(",", ".", $valorFormatadoconstrucao));
            
            if($valorFormatadoconstrucao>=7387676.85){
                $valor_servico_averb_construcao = 21729.18;
                $codigo_servico_averb_contrucao = "16.3.36";
                
                $custo_total += $valor_servico_averb_construcao;
    
            }elseif($valorFormatadoconstrucao<7387676.85){
                $sql_code_verificar_restricao = "SELECT * FROM servico_valor_torrens WHERE restricao_inicial_torrens <='$valorFormatadoconstrucao' AND restricao_final_torrens >= '$valorFormatadoconstrucao'";
                $sql_exec__verificar_restricao = $mysqli->query($sql_code_verificar_restricao);
                $dados_verificar_restricoes = $sql_exec__verificar_restricao -> fetch_assoc();

                $codigo_servico_averb_contrucao = $dados_verificar_restricoes['codigo_torrens'];
                $valor_servico_averb_construcao = $dados_verificar_restricoes['total_valor_torrens'];
                $custo_total +=$valor_servico_averb_construcao;
            }

            if($_POST['adicionar_averbacao']!= 'nao'){
                $numero_averbacoes = $_POST['adicionar_averbacao'];

                $valor_averbacao_final = $valor_semvalor * $numero_averbacoes;
                $custo_total += $valor_averbacao_final;
    

            }

            if($_POST['abertura_matricula']=='sim'){
                $multiplicador_arquivamento = 6;
                $multiplicador_conferencia = 3;

                $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
                $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;
                $custo_total += $valor_arquivamento * $multiplicador_arquivamento;
                $custo_total += $valor_conferencia * $multiplicador_conferencia;
            }elseif($_POST['abertura_matricula']== 'nao'){
                $multiplicador_arquivamento = 8;
                $multiplicador_conferencia = 4;

                $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
                $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;
                $custo_total += $valor_arquivamento * $multiplicador_arquivamento;
                $custo_total += $valor_conferencia * $multiplicador_conferencia;

                $custo_total += $valor_matricula;// abertura
                $custo_total += $valor_semvalor;// encerramento
                $custo_total += $valor_comunicacao;//comunicação
                $custo_total += $valor_arquivamento;//1ri
                $custo_total += $valor_prenotacao;//1ri
            }
    ?>
            <table>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Valor</th>
                </tr>
                <tr>
                    <td><?php echo $codigo_servico_averb_contrucao?></td>
                    <td><?php echo $nome_servico_averb_construcao?></td>
                    <td><?php echo "R$ ".$valor_servico_averb_construcao = number_format($valor_servico_averb_construcao, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_prenotacao?></td>
                    <td><?php echo $nome_prenotacao?></td>
                    <td><?php echo "R$ ".$valor_prenotacao = number_format($valor_prenotacao, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_arquivamento?></td>
                    <td><?php echo $nome_arquivamento . " ($multiplicador_arquivamento x)"?></td>
                    <td><?php echo "R$ ".$valor_arquivamento_final = number_format($valor_arquivamento_final, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_conferencia?></td>
                    <td><?php echo $nome_conferencia . " ($multiplicador_conferencia x) "?></td>
                    <td><?php echo "R$ ".$valor_conferencia_final = number_format($valor_conferencia_final, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_certidao?></td>
                    <td><?php echo $nome_certidao?></td>
                    <td><?php echo "R$ ".$valor_certidao = number_format($valor_certidao, 2, ',', '.')?></td>
                </tr>
                <?php
            if($_POST['abertura_matricula']=='nao'){
    ?>
                <tr>
                    <td><?php echo $codigo_prenotacao?></td>
                    <td><?php echo $nome_prenotacao. '(1º Registro de Imóveis)'?></td>
                    <td><?php echo "R$ ".$valor_prenotacao?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_matricula?></td>
                    <td><?php echo $nome_matricula. "(3º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_matricula = number_format($valor_matricula, 2, ',', '.')?></td>
                </tr>
            
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo " Encerramento de matrícula (1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_semvalor = number_format($valor_semvalor, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo " Transporte de ônus (1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_semvalor?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_arquivamento?></td>
                    <td><?php echo $nome_arquivamento . "(1º Registro de Imóveis)"?></td>
                    <td ><?php echo "R$ ".$valor_arquivamento = number_format($valor_arquivamento, 2, ',', '.')?></td>
                </tr>
                <tr>
                    <td><?php echo $codigo_comunicacao?></td>
                    <td><?php echo $nome_comunicacao. "(1º Registro de Imóveis)"?></td>
                    <td><?php echo "R$ ".$valor_comunicacao = number_format($valor_comunicacao, 2, ',', '.')?></td>
                </tr>
    <?php
            }
            if($_POST["adicionar_averbacao"] != "nao"){
    ?>
                <tr>
                    <td><?php echo $codigo_semvalor?></td>
                    <td><?php echo "Averbações". "($numero_averbacoes x)"?></td>
                    <td><?php echo "R$ ".$valor_averbacao_final = number_format($valor_averbacao_final, 2, ',', '.')?></td> 
                </tr>
    <?php
            }
    ?>
            <tr>
                <th>Emolumentos Totais</th>
                <th></th>
                <th>
                    <?php echo "R$ ".$custo_total = number_format($custo_total, 2, ',', '.')  ?>
                </th>
            </tr>
            </table>
    <?php
        }
    
    ?>
</body>
</html>