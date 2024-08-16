<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>

    <style>
        body{
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-items: center;

            margin-top: 20px;

            background-color: #f5f5f5;
        }
        #logo {
            width: 360px;
            height: auto;
        }
        h1 ,h2 {
            font-size: 25px;
            color: #8A997A;
        }
        button{
            width: 350px;
            height: auto;
            margin-bottom: 10px;
            padding: 3px;

            border: 2px solid #314b33;
            border-radius: 5px;

            background-color: #9DAF89;

            color: white;
            font-size: 17px;
            font-weight: 600;
        }
    </style>
</head>

<body>
    <img src="assets/LOGO_3RI 1_layerstyle.svg" alt="" srcset="" id="logo">
    <h1>Calculadora de Emolumentos</h1>
    <h2>Selecione seu serviço:</h2>
    <div class="bt-area">
        <div class="bt-servico">
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Abertura de matrícula">
                <button type="submit">Abertura de matrícula</button>
            </form>
        </div>
        <div class="bt-servico"></div>
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Escritura de Compra e Venda - Simples">
                <button type="submit">Escritura de Compra e Venda - Sem cláusulas</button>
            </form>
        <div class="bt-servico">
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Escritura de Compra e Venda + Alienação">
                <button type="submit">Contrato de Compra e Venda + Alienação</button>
            </form>
        </div>

        <div class="bt-servico">
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Cancelamento de Ônus">
                <button type="submit">Cancelamento de Ônus</button>
            </form>
        </div>

        <div class="bt-servico">
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Averbação de Construção">
                <button type="submit">Averbação de Construção</button>
            </form>
        </div>

        <div class="bt-servico">
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Averbações">
                <button type="submit">Averbações</button>
            </form>
        </div>

        <div class="bt-servico">
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Doação - Simples">
                <button type="submit">Doação pura</button>
            </form>
        </div>

        <div class="bt-servico">
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Resgate de Aforamento">
                <button type="submit">Resgate de Aforamento</button>
            </form>
        </div>

        <div class="bt-servico">
            <form action="calculadora.php" method="get">
                <input type="hidden" name="bt-servico" value="Certidões">
                <button type="submit">Certidões</button>
            </form>
        </div>

    </div>

</body>

</html>