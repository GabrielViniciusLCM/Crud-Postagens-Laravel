# Rede Social - PHP/Laravel

Este projeto é uma aplicação Laravel que simula uma rede social básica, permitindo que os usuários criem contas, publiquem postagens e interajam com o conteúdo.

---

## Funcionalidades

- **Autenticação de Usuários:**
  - Registro e login de usuários.

- **Postagens:**
  - Criar, editar e excluir postagens.
  - Listar todas as postagens no feed principal.

---

## Requisitos

- [XAMPP](https://www.apachefriends.org/index.html) (servidor local e banco de dados) (recomendo)
- PHP 8.1 ou superior
- Composer
- Laravel 10.x

---

## Configuração do Projeto

### 1. Clone o Repositório
```bash
git clone https://github.com/GabrielViniciusLCM/rede-social-laravel.git
cd rede-social-laravel
```

### 2. Instale as Dependências
Certifique-se de que o Composer está instalado e execute:
```bash
composer install
```

### 3. Configure o Ambiente
Crie o arquivo `.env` a partir do `.env.example`:
```bash
cp .env.example .env
```

Edite o arquivo `.env` para configurar o banco de dados local do XAMPP. Exemplo:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rede_social
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Crie o Banco de Dados
1. Abra o **phpMyAdmin** (geralmente em [http://localhost/phpmyadmin](http://localhost/phpmyadmin)).
2. Crie um banco de dados chamado `rede_social`.

---

### 5. Execute as Migrações
Crie as tabelas no banco de dados:
```bash
php artisan migrate
```


### 6. Inicie o Servidor
Execute o servidor de desenvolvimento do Laravel:
```bash
php artisan serve
```

Acesse o projeto no navegador em [http://localhost:8000](http://localhost:8000).

---
