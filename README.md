<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o PBClient

O PBClient é um aplicativo feito em PHP/Laravel e foi criado com o objetivo de ser um programa para cadastro e gerenciamento de clientes. 

## Pré-requisitos

Antes de começar, certifique-se de ter atendido aos seguintes requisitos:
- PHP (versão 8.1) - [Instalação](https://tecadmin.net/how-to-install-php-on-ubuntu-22-04/)
- Composer - [Instalação](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-22-04)
- Banco de Dados (PostgreSQL) - [Instalação](https://www.digitalocean.com/community/tutorials/how-to-install-postgresql-on-ubuntu-22-04-quickstart)
- PGAdmin 4 - [Instalação](https://www.pgadmin.org/download/pgadmin-4-apt/)
- Servidor Web - (por exemplo, Apache, Nginx, XAMPP)

## Configuração do Banco de Dados

1. Abra o PGAdmin 4 e crie um novo banco de dados chamado ``"pbclient"``. Caso você não tenha criado nenhum server anteriormente, você terá de seguir os seguintes passos:
2. Abra o pgAdmin 4 se ainda não estiver aberto.
3. No painel do navegador à esquerda, clique com o botão direito em "Servers" (Servidores) e selecione "Create" (Criar) e depois "Server" (Servidor).

4. Isso abrirá a janela de configuração do servidor. Preencha as seguintes informações:

    - **Name**: Dê um nome para o servidor. Pode ser um nome descritivo, como "Local PostgreSQL Server".

    - **Host name/address**: Deixe como "localhost" se o PostgreSQL estiver instalado na mesma máquina. Se estiver em outro servidor, insira o endereço IP ou nome do servidor.

    - **Port**: Deixe a porta padrão "5432".

    - **Maintenance Database**: Deixe em branco ou escolha "postgres" se não tiver um banco de dados de manutenção separado.

    - **Username**: Insira o nome de usuário do PostgreSQL (geralmente "postgres" por padrão).

    - **Password**: Insira a senha do usuário PostgreSQL.
5. Clique na guia "Advanced" (Avançado) e, na seção "DB restrictions", adicione o banco de dados de manutenção. Isso é necessário para criar outros bancos de dados.(**NÃO É OBRIGATÓRIO**)
6. Clique em "Save" (Salvar) para criar o servidor.
7. No painel do navegador à esquerda, expanda o novo servidor que você criou. Você verá a pasta "Databases" (Bancos de Dados).
8. Clique com o botão direito em "Databases" e selecione "Create" (Criar) e depois "Database" (Banco de Dados).
   Isso abrirá uma janela para criar um novo banco de dados. Preencha as seguintes informações:
    - **Database**: Insira o nome do novo banco de dados, por exemplo, ``"pbclient"``.
    - **Owner**: Selecione o dono do banco de dados na lista suspensa. Pode ser o usuário PostgreSQL padrão (geralmente "postgres") ou outro usuário que você tenha configurado.
    - **Comment**: Opcionalmente, você pode adicionar um comentário para descrever o banco de dados.
9. Clique em `"Save"` (Salvar) para criar o novo banco de dados.

Agora você criou o banco de dados `"pbclient"` no servidor PostgreSQL através do pgAdmin 4. Você pode usá-lo com as configurações especificadas no seu arquivo .env do Laravel para estabelecer uma conexão com ele a partir do seu aplicativo Laravel. Certifique-se de que as configurações no Laravel correspondam às configurações do banco de dados que você acabou de criar no pgAdmin 4.

## Clonando o projeto e configurando o ambiente

1. Instale e configure o SSH na sua máquina;
2. Se você está procurando as chaves SSH pessoais, que consistem em uma chave privada e uma chave pública, elas são geralmente armazenadas em arquivos com nomes como "id_rsa" (chave privada) e "id_rsa.pub" (chave pública) no diretório ~/.ssh/.
    - Abra um terminal no seu sistema.
    - Navegue até o diretório ~/.ssh/ (ou crie o diretório ~/.ssh/ se ele não existir):
   ```bash 
    mkdir -p ~/.ssh
    cd ~/.ssh
   ```
    - Gere um novo par de chaves SSH usando o seguinte comando:
   ```bash 
    ssh-keygen -t rsa -b 4096
   ```
    - Este comando criará uma nova chave SSH RSA de 4096 bits. Ele também perguntará onde você deseja salvar a chave e se deseja protegê-la com uma senha. Você pode aceitar as configurações padrão ou personalizá-las de acordo com suas preferências.
    - Após a geração bem-sucedida, você terá as chaves SSH no diretório ~/.ssh/. O arquivo da chave privada será "id_rsa" e o arquivo da chave pública será "id_rsa.pub". Certifique-se de proteger a chave privada com segurança.
    - Depois de gerar as chaves SSH, você pode configurá-las no GitHub ou em outros serviços que você deseja usar para autenticação SSH. Certifique-se de adicionar a chave pública ("id_rsa.pub") ao seu perfil no GitHub ou no serviço correspondente.
    - Para visualizar o conteúdo de uma chave SSH específica, você pode usar o comando cat seguido do nome do arquivo da chave, por exemplo:
   ```bash 
    cat id_rsa.pub
   ```
3. Navegue até o diretório onde fará o clone e clone o projeto;
    ```bash 
    git clone git@github.com:Doginnn/pbclient.git
    ```
4. Acesse o diretório e faça uma cópia do arquivo `.env.example` e renomeie-o para `.env`:
    ```bash 
    sudo cp .env.example .env
    ```
5. Abra o arquivo `.env` em um editor de texto e configure as variáveis de ambiente de acordo com as necessidades do seu projeto, como informações de banco de dados e outras configurações.
   ```bash 
    EXEMPLO DE CONFIGURAÇÃO DE BANCO POSTGRESQL
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=pbclient
    DB_USERNAME=postgres
    DB_PASSWORD=123Mudar!
    ```
6. Instale as dependências do projeto usando o Composer:
    ```bash 
    composer install
    ```
7. Rode os comandos NPM INSTALL
    ```bash 
    npm install
    ```
8. Rode os comandos NPM RUN BUILD
    ```bash 
    npm run build
    ```
9. Gere a chave da aplicação
    ```bash 
    php artisan key:generate
    ```
10. Rodando o comando para rodar as migrations e criar as tabelas no banco de dados
    ```bash 
    php artisan migrate
    ```
11. Inicie o servidor de desenvolvimento:
    ```bash 
    php artisan serve
    ```
O projeto estará disponível em [http://localhost:8000]([http://localhost:8000]).

## Contribuições

Contribuições são bem-vindas. Para contribuir, siga estas etapas:

1. Crie um fork do projeto.
2. Crie uma branch para sua contribuição: `git checkout -b upstream/nomeBranch`.
3. Faça suas alterações.
4. Faça um commit das alterações: `git commit -m "[FIX] - Descrição das alterações feitas."`.
5. Faça um push para a branch: `git push origin upstream/nomeBranch`.
6. Abra uma solicitação de pull.

## Licença

Este projeto está licenciado sob a Licença MIT - consulte o arquivo [LICENCE.MD](https://license.md/licenses/mit-license/) para obter detalhes.

## Contato
- Email: diogenesemmanuel@gmail.com
- Telefone: (83) 999 712 101
