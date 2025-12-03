# 🔐 Sistema de Login - PositiveSense

Sistema completo de autenticação com banco de dados MySQL para o site PositiveSense.

## 📋 Pré-requisitos

-   XAMPP instalado (Apache + MySQL + PHP)
-   PHP 7.4 ou superior
-   Extensão PDO do PHP habilitada

## 🚀 Instalação do Banco de Dados

### Passo 1: Iniciar Serviços XAMPP

1. Abra o XAMPP Control Panel
2. Inicie o **Apache**
3. Inicie o **MySQL**

### Passo 2: Criar o Banco de Dados

**Opção A - Via phpMyAdmin (Recomendado):**

1. Acesse: http://localhost/phpmyadmin
2. Clique em "SQL" no menu superior
3. Copie todo o conteúdo do arquivo `database/positivesense.sql`
4. Cole na área de SQL e clique em "Executar"

**Opção B - Via Linha de Comando:**

```bash
# Entre no diretório do MySQL
cd C:\xampp\mysql\bin

# Execute o script SQL
mysql -u root -p < C:\xampp\htdocs\tcc\database\positivesense.sql
```

### Passo 3: Verificar Instalação

1. No phpMyAdmin, verifique se o banco `positivesense` foi criado
2. Confirme que as seguintes tabelas existem:
    - ✅ usuarios
    - ✅ sessoes
    - ✅ logs_acesso

## 📂 Estrutura de Arquivos

```
tcc/
├── config/
│   └── database.php          # Configuração de conexão com BD
├── database/
│   └── positivesense.sql     # Script de criação do banco
├── login.php                 # Página de login
├── registro.php              # Página de cadastro
├── processar_login.php       # Processa autenticação
├── processar_registro.php    # Processa cadastro
└── logout.php                # Encerra sessão
```

## 🔑 Credenciais Padrão

**Usuário Administrador:**

-   Email: `admin@positivesense.com`
-   Senha: `admin123`

⚠️ **IMPORTANTE:** Altere esta senha imediatamente após o primeiro acesso!

## 🎯 Como Usar

### Cadastrar Novo Usuário

1. Acesse: http://localhost:8000/registro.php
2. Preencha o formulário com:
    - Nome completo
    - E-mail válido
    - Senha (mínimo 6 caracteres)
    - Confirme a senha
    - Selecione o tipo de perfil (Aluno/Professor/Responsável)
    - Aceite os termos de uso
3. Clique em "Criar conta"

### Fazer Login

1. Acesse: http://localhost:8000/login.php
2. Digite seu e-mail e senha
3. Marque "Lembrar-me" para ficar conectado por 7 dias
4. Clique em "Entrar"

### Sair da Conta

-   Clique em "Sair" ou acesse: http://localhost:8000/logout.php

## 👥 Tipos de Usuário

| Tipo            | Descrição                                  |
| --------------- | ------------------------------------------ |
| **Aluno**       | Estudante que usará os jogos educativos    |
| **Professor**   | Educador com acesso a recursos pedagógicos |
| **Responsável** | Pais ou tutores acompanhando o progresso   |
| **Admin**       | Administrador com acesso total ao sistema  |

## 🔒 Segurança

✅ **Senhas criptografadas** com PASSWORD_DEFAULT do PHP
✅ **Proteção contra SQL Injection** usando PDO Prepared Statements
✅ **Validação de dados** no servidor e cliente
✅ **Sessões seguras** com tokens aleatórios
✅ **Log de acessos** para auditoria
✅ **Cookies HttpOnly** para sessão persistente

## 🗄️ Estrutura do Banco de Dados

### Tabela: usuarios

-   `id` - ID único do usuário
-   `nome` - Nome completo
-   `email` - E-mail (único)
-   `senha` - Senha criptografada
-   `tipo_usuario` - Perfil (aluno/professor/responsavel/admin)
-   `status` - Status da conta (ativo/inativo/pendente)
-   `data_cadastro` - Data de criação da conta
-   `ultimo_acesso` - Último login

### Tabela: sessoes

-   `id` - ID da sessão
-   `usuario_id` - Referência ao usuário
-   `token_sessao` - Token único da sessão
-   `ip_address` - IP do acesso
-   `user_agent` - Navegador/dispositivo
-   `data_expiracao` - Quando a sessão expira

### Tabela: logs_acesso

-   `id` - ID do log
-   `usuario_id` - Quem realizou a ação
-   `acao` - Tipo de ação (login_sucesso, login_falha, logout, etc.)
-   `ip_address` - IP do acesso
-   `data_hora` - Quando ocorreu

## ⚙️ Configuração

Edite o arquivo `config/database.php` se necessário:

```php
define('DB_HOST', 'localhost');    // Host do MySQL
define('DB_NAME', 'positivesense'); // Nome do banco
define('DB_USER', 'root');          // Usuário do MySQL
define('DB_PASS', '');              // Senha do MySQL (vazio por padrão no XAMPP)
```

## 🐛 Solução de Problemas

### Erro: "Erro ao conectar com o banco de dados"

-   ✅ Verifique se o MySQL está rodando no XAMPP
-   ✅ Confirme que o banco `positivesense` foi criado
-   ✅ Verifique as credenciais em `config/database.php`

### Erro: "E-mail já está cadastrado"

-   ℹ️ Este e-mail já existe no sistema
-   ✅ Use outro e-mail ou faça login

### Erro: "As senhas não coincidem"

-   ✅ Digite a mesma senha nos dois campos

### Página em branco ao fazer login

-   ✅ Verifique os logs de erro do PHP em: `C:\xampp\php\logs\php_error_log`
-   ✅ Ative exibição de erros no PHP para debug

## 📊 Estatísticas

Para ver estatísticas de usuários cadastrados:

```sql
SELECT * FROM estatisticas_usuarios;
```

Retorna:

-   Total de usuários
-   Total por tipo (alunos, professores, responsáveis)
-   Usuários ativos
-   Cadastros de hoje
-   Acessos de hoje

## 🔄 Próximos Passos

-   [ ] Implementar recuperação de senha por e-mail
-   [ ] Adicionar autenticação de dois fatores (2FA)
-   [ ] Integrar login com Google/Facebook
-   [ ] Sistema de permissões granulares
-   [ ] Dashboard administrativo
-   [ ] Relatórios de uso e atividade

## 📞 Suporte

Em caso de dúvidas ou problemas:

-   Email: positivesense@gmail.com
-   WhatsApp: +55 11 99999-9999

---

**Desenvolvido com ❤️ pela equipe PositiveSense**
