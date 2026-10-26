# Livewire Contacts

Agenda de contatos em Laravel + Livewire 3: cadastro, busca em tempo real, edição e exclusão sem recarregar a página.

## Contexto

Projeto de estudo para aplicar os conceitos de Livewire 3 junto ao Laravel 11: componentes, validação com atributos, eventos entre componentes e paginação.

## Funcionalidades

- **Cadastro de contatos** (nome, e-mail e telefone) com validação via atributos `#[Validate]`.
- **Bloqueio de duplicados**: não cria um contato com o mesmo nome e e-mail.
- **Notificações** de sucesso e erro com SweetAlert2, disparadas por eventos do Livewire.
- **Lista atualizada automaticamente** quando um contato é criado (evento `contactAdded`).
- **Busca em tempo real** por nome, e-mail ou telefone (`wire:model.live`).
- **Paginação** de 5 contatos por página.
- **Edição** e **exclusão com tela de confirmação**, em componentes de página inteira.

## Stack

- PHP 8.2+ e Laravel 11
- Livewire 3
- Bootstrap 5 e SweetAlert2
- SQLite por padrão (MySQL também funciona via `.env`)

## Como rodar localmente

```bash
git clone https://github.com/MatheusDiamantino/Livewire.git
cd Livewire
composer install
cp .env.example .env
php artisan key:generate

# banco SQLite padrão
touch database/database.sqlite
php artisan migrate

php artisan serve
```

Acesse `http://localhost:8000`.

## Componentes Livewire

| Componente | Função |
| --- | --- |
| `MainComponent` | Página inicial, junta o formulário e a lista |
| `FormContact` | Formulário de novo contato |
| `Contacts` | Lista com busca e paginação |
| `EditContact` | Edição de um contato |
| `ConfirmDelete` | Confirmação de exclusão |
