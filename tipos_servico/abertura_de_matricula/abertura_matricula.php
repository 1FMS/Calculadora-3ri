<?php
    //chamada BD e tabela de valor fixo
    include("tipos_servico/valor_fixo.php");

    $multiplicador_arquivamento;
    $multiplicador_conferencia;

    $valor_arquivamento_final;
    $valor_conferencia_final;

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
    <main>
    <img src="assets/logo-calculadora-nome.svg" alt="" srcset="" id="logo">
    <h1>CALCULADORA DE EMOLUMENTOS</h1>
    <h2>Abertura de Matrícula</h2>
    <div class="form-area">
        <p class="text-servico">Selecione o tipo:</p>
        <form action="" method="post">
            <input type="hidden" name="tipo_abertura">
            <label for="comum"><div class="bt-type-radio">
                <p class="text-type-radio">Abertura comum</p><input type="radio" name="tipo_abertura" value="comum" id="comum">
            </div></label>
            <label for="transporte"><div class="bt-type-radio">
                <p class="text-type-radio">Abertura + Transporte de Ônus</p><input type="radio" name="tipo_abertura" value="transporte" id="transporte">
            </div></label>
            <label for="transporte_cancelamento"><div class="bt-type-radio">
                <p class="text-type-radio">Abertura + Transporte de Ônus + Cancelamento de Ônus</p><input type="radio" name="tipo_abertura" value="transporte_cancelamento" id="transporte_cancelamento">
            </div></label>
            
            
            
            <div class="bt-final-area">

                <label for="voltar"><button class="bt-final"><a id="voltar" href="principal.php" style="text-decoration: none; color: white;">Voltar</a></button></label>

                <label for="calcular"><button type="submit" name="calcular" class="bt-final" id="calcular">Calcular</button></label>

            </div>
            

        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#calculadora-form').on('submit', function(e) {
                e.preventDefault(); // Impede o envio padrão do formulário

                $.ajax({
                    type: 'POST',
                    url: 'processa_calculo.php', // Crie um arquivo separado para processar os dados
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#result-table').html(response); // Atualiza o conteúdo da tabela
                    }
                });
            });
        });
    </script>
    
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

            $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
            $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

            $custo_total += $custo_abertura;
            $custo_total += $valor_arquivamento_final;
            $custo_total += $valor_conferencia_final;
            $custo_total += $valor_prenotacao;//3ri
            $custo_total += $valor_prenotacao;//1ri
            $custo_total += $valor_certidao;
            $custo_total += $valor_semvalor;//encerramento 1ri
            $custo_total += $valor_comunicacao;
            $custo_total += $valor_arquivamento;// arquivamento 1ri
        }elseif($tipo_de_abertura== "transporte"){
            $custo_abertura = $valor_matricula;
            $codigo_abertura = $codigo_matricula;
            $nome_abertura = $nome_matricula;

            $multiplicador_arquivamento = 3;
            $multiplicador_conferencia = 2;

            $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
            $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

            $custo_total += $custo_abertura;
            $custo_total += $valor_arquivamento_final;
            $custo_total += $valor_conferencia_final;
            $custo_total += $valor_prenotacao;//3ri
            $custo_total += $valor_prenotacao;//1ri
            $custo_total += $valor_certidao;
            $custo_total += $valor_semvalor;
            $custo_total += $valor_semvalor;
            $custo_total += $valor_comunicacao;
            $custo_total += $valor_arquivamento;// arquivamento 1ri

    }elseif($tipo_de_abertura== "transporte_cancelamento"){
            $custo_abertura = $valor_matricula;
            $codigo_abertura = $codigo_matricula;
            $nome_abertura = $nome_matricula;

            $multiplicador_arquivamento = 9;
            $multiplicador_conferencia = 5;
            $valor_arquivamento_final = $multiplicador_arquivamento * $valor_arquivamento;
            $valor_conferencia_final = $multiplicador_conferencia * $valor_conferencia;

            $custo_total += $custo_abertura;
            $custo_total += $valor_arquivamento_final;
            $custo_total += $valor_conferencia_final;
            $custo_total += $valor_prenotacao;//3ri
            $custo_total += $valor_prenotacao;//1ri
            $custo_total += $valor_certidao;
            $custo_total += $valor_semvalor *2;
            $custo_total += $valor_semvalor;
            $custo_total += $valor_comunicacao;
            $custo_total += $valor_arquivamento;// arquivamento 1ri
    }


?>
<table id="table">
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
                <td><?php echo "Comunicação ao registro de origem"?></td>
                <td><?php echo "R$ ".$valor_comunicacao = number_format($valor_comunicacao, 2, ',', '.')?></td>
            </tr>
        <?php
            if($tipo_de_abertura == 'transporte'){
        ?>
                <tr>
                    <td><?php echo $codigo_transporte?></td>
                    <td><?php echo $nome_transporte?></td>
                    <td><?php echo "R$ ".$custo_transporte = number_format($custo_transporte, 2, ',', '.')?></td>
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
                    <td><?php echo "R$ ".$custo_cancelamento = number_format($custo_cancelamento, 2, ',', '.')?></td>
                </tr>
        <?php 
            }
         
        ?>
        <tr >
            <th class="end-table">
                Emolumentos Totais
            </th>
            <th class="end-table">
                
            </th >
            <th class="end-table">
                <?php echo "R$ ".$custo_total = number_format($custo_total, 2, ',', '.') ?>
            </th>
        </tr>
        <?php 
            }
         
        ?>
</table> 
</main>   
