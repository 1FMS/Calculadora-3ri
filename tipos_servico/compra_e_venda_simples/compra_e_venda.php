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

    $valorFormatadocev;
    $valorFormatadoitbi;

    $valor_arquivamento_final;
    $valor_conferencia_final;
    $valor_averbacao_final;

?>
<main>
    <img src="assets/logo-calculadora-nome.svg" alt="" srcset="" id="logo">
    <h1>CALCULADORA DE EMOLUMENTOS</h1>
    <h2>Escritura de Compra e Venda</h2>

    
        <div class="form-area">
            <form action="" method="post">
                <div class="area-input">
                    <p class="texto-input-value">Valor da compra e venda: </p><input type="text" name="valor_compra_e_venda" id="valor_cev" class="input-value">
                </div>
                <div class="area-input">
                    <p class="texto-input-value">Valor de avaliação(ITBI): </p><input type="text" name="valor_itbi" id="valor_itbi" class="input-value">
                </div>
                
                <p class="texto-input-value">Possui matrícula aberta no 3º Registro?</p>
                <input type="hidden" name="abertura_matricula">
                <label for="abertura_matricula_sim"><div class="bt-type-radio">
                    <p class="text-type-radio">Sim</p><input type="radio" name="abertura_matricula" id="abertura_matricula_sim" value="sim">
                </div></label>
                <label for="abertura_matricula_nao"><div class="bt-type-radio">
                    <p class="text-type-radio">Não</p><input type="radio" name="abertura_matricula" id="abertura_matricula_nao" value="nao">
                </div></label>
                    

                <p class="texto-input-value">Deseja adicionar alguma averbação?</p>
                <div>
                    <select name="adicionar_averbacao" id="" class="input-type-select">
                        <option value="nao">Não</option>
                        <option value="1">1 Averbação</option>
                        <option value="2">2 Averbação</option>
                        <option value="3">3 Averbação</option>
                    </select>
                </div>
                        
                        
                <div class="bt-final-area">

                    <label for="voltar"><button class="bt-final"><a id="voltar" href="principal.php" style="text-decoration: none; color: white;">Voltar</a></button></label>

                    <label for="calcular"><button type="submit" name="calcular" class="bt-final" id="calcular">Calcular</button></label>

                </div>
                
        
            </form>
        </div>
        
        <script>
            $(document).ready(function() {
                $('#valor_cev').on('input', function() {
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
            $(document).ready(function() {
                $('#valor_itbi').on('input', function() {
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


        if(empty($_POST['valor_compra_e_venda']) || empty($_POST['valor_itbi']) || empty($_POST['abertura_matricula'])){
           
    ?>
            <p>Preencha todos os campos</p>
    <?php
            die();   
        }
        $valor_compra_e_venda = $_POST['valor_compra_e_venda'];
        $valorNumericocev = preg_replace('/[^0-9]/', '', $_POST['valor_compra_e_venda']);
        $valorFormatadocev = number_format($valorNumericocev / 100, 2, ",", "");
        


        $valor_itbi = $_POST['valor_itbi'];
        $valorNumericoitbi = preg_replace('/[^0-9]/', '', $_POST['valor_itbi']);
        $valorFormatadoitbi = number_format($valorNumericoitbi / 100, 2, ",", "");

        if($valorFormatadocev>$valorFormatadoitbi){
            $valor_base = $valorFormatadocev;
        }else{
            $valor_base = $valorFormatadoitbi;
        }

        $valor_base = floatval(str_replace(",", ".", $valor_base));
    

        

        
        if($_POST['abertura_matricula']=='nao'){
            $multiplicador_arquivamento = 8;
            $multiplicador_conferencia = 8;

            $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
            $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

            $custo_total += $valor_matricula;// abertura
            $custo_total += $valor_semvalor;// encerramento
            $custo_total += $valor_comunicacao;//comunicação
            $custo_total += $valor_arquivamento;//1ri
            $custo_total += $valor_prenotacao;//1ri
        }elseif($_POST['abertura_matricula']=='sim'){
            $multiplicador_conferencia = 8;
            $multiplicador_arquivamento = 6;

            $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
            $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;
        }


        if($_POST['adicionar_averbacao'] != 'nao'){
            $numero_averbacoes =  $_POST['adicionar_averbacao'];

            $valor_averbacao_final = $valor_semvalor * $numero_averbacoes;
            $custo_total += $valor_averbacao_final;
        }

        if($valor_base>7387676.85){
            $custo_servico = 21729.18;
            $codigo_servico = "16.3.36";
            $custo_total += $custo_servico;
            $custo_total += $valor_arquivamento_final;
            $custo_total += $valor_certidao;
            $custo_total += $valor_conferencia_final;
            $custo_total += $valor_prenotacao;

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
    <table id="tabela">
        <tr>
            <th class="start-table" id="primeiro-table">Código</th>
            <th class="start-table">Ato</th>
            <th class="start-table" id="ultimo-table">Valor</th>
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
        <tr>
            <td><?php echo $codigo_servico?></td>
            <td><?php echo $nome_servico?></td>
            <td><?php echo "R$ ".$custo_servico = number_format($custo_servico, 2, ',', '.')?></td>
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
            if($_POST['adicionar_averbacao'] != 'nao'){
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
                <th class="end-table" id="inicio-result">
                    Emolumentos Totais
                </th>
                <th class="end-table"></th>  
                <th class="end-table" id="fim-result">
                    <?php echo "R$ ".$custo_total = number_format($custo_total, 2, ',', '.') ?>
                </th>
            </tr>
        

    </table>
</main>
    <?php
    

    
    } 
    
    ?>
    
</body>
</html>
