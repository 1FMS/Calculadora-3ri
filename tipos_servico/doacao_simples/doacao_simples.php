<?php
    include("tipos_servico/valor_fixo.php");

    $custo_total = 0;

    $numero_averbacoes;

    $valor_arquivamento_final;
    $valor_conferencia_final;
    $valor_averbacao_final;

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        .texto-input{
            color: #8A997A;
        }
        #valor_itcd{
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
        select{
            background-color: #9DAF89;

            color: white;
            font-size: 15px;

            width: 200px;
            height: auto;

            border: 2px solid #314b33;
            border-radius: 5px;
        }
        button{
            border: 2px solid #314b33;
            border-radius: 5px;

            background-color: #9DAF89;

            color: white;
            font-size: 17px;
            font-weight: 600;
        }
        .averbacao{
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;

            margin-bottom: 10px;
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
    <h1>Doação - Pura</h1>
    <div class="form-area">
        <form action="" method="post">
            <div class="bt-input">
                <p class="texto-input">Valor do ITCD:</p><input type="text" name="valor_itcd" id="valor_itcd">
            </div>
            
            

                <p class="texto-input">Possui matrícula aberta no 3º Registro?</p>
                <input type="hidden" name="abertura_matricula">
                <div class="bt-input-radio">
                    <p>Sim</p><input type="radio" name="abertura_matricula" id="" value="sim">
                </div>
                <div class="bt-input-radio">
                    <p>Não</p><input type="radio" name="abertura_matricula" id="" value="nao">
                </div>
                

                <p class="texto-input">Deseja adicionar alguma averbação?</p>
                <div class="averbacao">
                    <select name="adicionar_averbacao" id="">
                        <option value="nao">Não</option>
                        <option value="1">1 Averbação</option>
                        <option value="2">2 Averbação</option>
                        <option value="3">3 Averbação</option>
                    </select>
                </div>
                    
                    
                <div class="bt-final">
                    <button type="submit" name="calcular">Calcular</button>
                    <button><a href="principal.php" style="text-decoration: none; color: white;">Voltar</a></button>
                </div>
        </form>


    </div>
    
        <script>
            $(document).ready(function() {
                $('#valor_itcd').on('input', function() {
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
    <?php
    
        if(isset($_POST['calcular'])){
            

            if(empty($_POST['valor_itcd']) || empty($_POST['abertura_matricula'])){
    ?>

                <p>Preencha os campos</p>
    <?php
                die();
            }

            $valor_itcd = $_POST['valor_itcd'];
            $valorNumericodoacao = preg_replace('/[^0-9]/', '', $_POST['valor_itcd']);
            $valorFormatadodoacao = number_format($valorNumericodoacao / 100, 2, ",", "");
            $valorFormatadodoacao = floatval(str_replace(",", ".", $valorFormatadodoacao));

            if($valorFormatadodoacao>=7387676.85){
                $custo_servico_doacao = 21729.18;
                $codigo_servico_doacao = "16.3.36";
                $custo_total +=$custo_servico_doacao;

    
            }elseif($valorFormatadodoacao<7387676.85){
                $sql_code_verificar_restricao = "SELECT * FROM servico_valor_declarado WHERE restricao_inicial <='$valorFormatadodoacao' AND restricao_final >= '$valorFormatadodoacao'";
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

                $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
                $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;
                $custo_total += $valor_arquivamento_final;
                $custo_total += $valor_conferencia_final;
            }elseif($_POST['abertura_matricula']== 'nao'){
                $multiplicador_arquivamento = 8;
                $multiplicador_conferencia = 8;

                $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
                $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

                $custo_total += $valor_prenotacao;
                $custo_total += $valor_certidao;
                $custo_total += $valor_arquivamento_final;
                $custo_total += $valor_conferencia_final;

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
                    <td><?php echo "R$ ".$custo_servico_doacao = number_format($custo_servico_doacao, 2, ',', '.')?></td>
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
            <tr style=" background-color: #314b33; color:white">
                <th>Emolumentos Totais</th>
                <th></th>
                <th><?php echo "R$ ".$custo_total = number_format($custo_total, 2, ',', '.')?></th>
            </tr>
            </table>
    <?php
        }
    
    ?>

</body>
</html>