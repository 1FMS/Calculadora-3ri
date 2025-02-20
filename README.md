# Sistema de Estimativa de Custos - 3º Registro de Imóveis de São Luís

Este é um sistema web desenvolvido para gerar estimativas de valores de serviços do **3º Registro de Imóveis de São Luís**. Ele permite que os usuários insiram informações e obtenham uma previsão aproximada dos custos envolvidos nos serviços do cartório.

## 🛠️ Tecnologias Utilizadas

- **Linguagem Backend:** PHP (versão 5.5.19)
- **Banco de Dados:** MySQL (phpMyAdmin)
- **Frontend:** HTML, CSS
- **Ambiente de Desenvolvimento:** WampServer (versão 5.5.19)

## 🚀 Funcionalidades

- Cálculo estimado do valor dos serviços do cartório.
- Interface simples e acessível para consulta rápida.
- Compatível com ambientes baseados em PHP 5.5.19.

## 📦 Instalação e Configuração

1. **Clone o repositório:**
   ```bash
   git clone https://github.com/1fms/Calculadora-3ri.git
   ```
2. **Configure o ambiente:**
   - Instale o XAMPP 5.5.19
   - Certifique-se de que o PHP 5.5.19 está ativado.
   - Inicie os serviços do WAMP.

3. **Importe o banco de dados:**
   - Acesse o **phpMyAdmin**.
   - Crie um banco de dados (exemplo: `cartorio`).
   - Importe o arquivo `.sql` fornecido no repositório.

4. **Configure o acesso ao banco de dados no arquivo de conexão (exemplo: `config.php`):**
   ```php
   <?php
   $conn = new mysqli("localhost", "usuario", "senha", "cartorio");
   if ($conn->connect_error) {
       die("Falha na conexão: " . $conn->connect_error);
   }
   ?>
   ```

5. **Acesse o sistema no navegador:**
   ```
   http://localhost/seuprojeto
   ```
