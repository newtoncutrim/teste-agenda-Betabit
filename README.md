
#Projeto Teste-Agenda
Este é um guia passo a passo para configurar e executar o projeto Teste-Agenda localmente usando Docker.

Pré-requisitos
Docker Desktop instalado e configurado na sua máquina.
Git instalado na sua máquina.
Instalação
Clone o repositório do projeto Teste-Agenda do GitHub:

```
git clone https://github.com/newtoncutrim/teste-agenda-Betabit.git
```
Navegue até o diretório do projeto clonado:
```
cd teste-agenda-Betabit
```
Execute o seguinte comando para iniciar os contêineres Docker e construir as imagens:
```
docker compose up -d --build
```

link
```
docker compose exec app php artisan storage:link
```

Instale as dependências do Composer executando o seguinte comando:
```
docker compose exec app composer install
```
Copie o arquivo de ambiente de exemplo .env.example para .env:
```
docker compose exec app cp .env.example .env
```
Gere a chave de criptografia do Laravel executando o seguinte comando:
```
docker compose exec app php artisan key:generate
```
Configure o banco de dados no arquivo .env com as seguintes credenciais:
```
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
```
Execute as migrações do banco de dados com o seguinte comando:
```
docker compose exec app php artisan migrate
```
Acesso Local
Depois de seguir as etapas acima, você pode acessar o projeto Teste-Agenda localmente no seguinte endereço:

http://localhost:3000/
