# 📦 Projeto de Testes - Cadastro e Listagem de Clientes

Este projeto Laravel contém testes automatizados para validar a funcionalidade fictícia de **cadastro e listagem de clientes** em um sistema ERP.

---

## 🔧 Requisitos

- PHP 8.1+
- Composer
- Laravel 10+
- Banco SQLite para testes (ou MySQL)
- (Opcional) Laravel Sail ou Docker

---

## 🚀 Instalação

```bash
git clone https://github.com/seu-usuario/clienteserp
.git
cd clienteserp
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate --env=testing





