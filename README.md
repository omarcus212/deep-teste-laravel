# Deep – Sistema de Autenticação e Perfil de Usuário (Laravel)

Projeto desenvolvido com Laravel com foco em Back-end, integrando um front-end responsivo para demonstrar um fluxo completo de autenticação e gerenciamento de perfil de usuário.

## O objetivo deste projeto é demonstrar boas práticas em:

Estruturação de autenticação

Manipulação de dados do usuário

Atualização segura de senha

Upload de imagem de perfil

UI/UX responsivo

## Funcionalidades

- ✅ Cadastro de usuário (Register)
- ✅ Login com validação
- ✅ Logout
- ✅ Edição de perfil

Atualizar nome
Atualizar e-mail

- ✅ Redefinição de senha

Verificação da senha atual
Nova senha com confirmação

- ✅ Upload de foto de perfil (avatar)
- ✅ Dashboard do usuário
- ✅ Interface responsiva (UI/UX)
- ✅ Validações no back-end
- ✅ Proteção de rotas autenticadas

## Regras de Negócio

Apenas usuários autenticados podem acessar o dashboard.

### A redefinição de senha exige:

Senha atual correta
Confirmação da nova senha

### A imagem de perfil aceita apenas:

JPG, JPEG, PNG ou WEBP
Tamanho máximo de 2MB
Caso o usuário não tenha foto, é exibida uma letra inicial do nome como avatar.

🛠️ Tecnologias Utilizadas

- Laravel 11
- PHP 8+
- MySQL
- Blade (templates)
- Bootstrap (layout e responsividade)
- Vite (build front-end)
- Storage público para upload de imagens

## Estrutura de Funcionalidades

Autenticação
Login
Registro
Logout
Perfil
Atualizar nome e e-mail
Atualizar senha
Upload de foto de perfil
Dashboard
Visualização dos dados do usuário
Interface limpa e responsiva

## Como rodar o projeto

```
git clone https://github.com/seu-usuario/deep-teste-laravel.git
cd deep-teste-laravel

composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate --seed

php artisan storage:link

npm run dev
php artisan serve
```

## Acesse em:

👉 http://127.0.0.1:8000

### As imagens são salvas em:

storage/app/public/photo_profile

## Objetivo do Projeto

Este projeto foi criado com foco em portfólio para vagas de Desenvolvedor Back-end / Full Stack Júnior, demonstrando:

Estrutura de autenticação real
Boas práticas de validação
Organização de controllers e views
Integração back-end + front-end
Preocupação com UX/UI

# 👨‍💻 Autor

Projeto desenvolvido por Marcus Vinnicius
💼 Desenvolvedor com foco em Back-end

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
