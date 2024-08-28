<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Nova+Round&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Palanquin+Dark:wght@400;500;600;700&display=swap');

        body{
            height: 95vh;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            align-content: center;
            justify-content: center;

            margin: 20px;
            padding-left: 20px;
            padding-right: 20px;
            

            background-color: #C0CEBB;
        }
        main{
            width: auto;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            align-content: center;

            padding-top: 30px;
            padding-bottom: 30px;
            padding-left: 5%;
            padding-right: 5%;
            

            border-radius: 11px;
            background-color: white;

            box-shadow: -6px 4px 15px -4px rgba(0, 0, 0, 0.75);
            
        }
        #logo{
            width: 218px;
            height: auto;
        }
        h1{
            font-family: "Nova Round", system-ui;
            font-size: 22px;
            color: #62715C;
            text-align: center;

            text-shadow: -1px 1px 1px rgba(0,0,0,0.24);
        }
        button{
            width: 40vh;
            height: auto;
            margin-bottom: 10px;
            padding: 3px;


            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            border-radius: 5px;
            border: none;
            background-color: #62715C;
            
            font-family: "Palanquin Dark", sans-serif;
            color: white;
            font-size: 20px;
            font-weight: normal;
            text-align: center;

        }
        
    </style>
</head>

<body>
    <main>
        <img src="assets/logo-calculadora-nome.svg" alt="" srcset="" id="logo">
        <h1>CALCULADORA DE EMOLUMENTOS</h1>
        <div class="bt-area">
            <div class="bt-servico">
                <form action="calculadora.php" method="get">
                    <input type="hidden" name="bt-servico" value="Abertura de matrícula">
                    <button type="submit">Abertura de matrícula</button>
                </form>
            </div>

            </div>
                <form action="calculadora.php" method="get">
                    <input type="hidden" name="bt-servico" value="Resgate de Aforamento">
                    <button type="submit">Resgate de Aforamento</button>
                </form>
            </div>

            <div class="bt-servico">
                <form action="calculadora.php" method="get">
                    <input type="hidden" name="bt-servico" value="Escritura de Compra e Venda - Simples">
                    <button type="submit">Escritura de Compra e Venda</button>
                </form>
            </div>

            <div class="bt-servico">
                <form action="calculadora.php" method="get">
                    <input type="hidden" name="bt-servico" value="Doação - Simples">
                    <button type="submit"> Escritura de Doação</button>
                </form>
            </div>

            <div class="bt-servico">
                <form action="calculadora.php" method="get">
                    <input type="hidden" name="bt-servico" value="Escritura de Compra e Venda + Alienação">
                    <button type="submit">Contrato de Compra e Venda c/ Alienação</button>
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
                    <input type="hidden" name="bt-servico" value="Cancelamento de Ônus">
                    <button type="submit">Cancelamento de Ônus</button>
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
                    <input type="hidden" name="bt-servico" value="Certidões">
                    <button type="submit">Certidões</button>
                </form>
            </div>

    </main>

</body>

</html>