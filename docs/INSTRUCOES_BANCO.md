# 🗄️ Configuração do Banco de Dados MySQL

## 📋 Pré-requisitos

O **PositiveSense** agora depende **exclusivamente** do MySQL via phpMyAdmin do XAMPP.

---

## 🚀 Passo a Passo para Configurar

### 1️⃣ Iniciar o XAMPP

1. Abra o **XAMPP Control Panel**
2. Clique em **Start** no módulo **Apache**
3. Clique em **Start** no módulo **MySQL**

Aguarde até ambos ficarem com fundo **verde** e status **Running**.

---

### 2️⃣ Acessar o phpMyAdmin

1. Abra seu navegador
2. Acesse: `http://localhost/phpmyadmin`
3. Você verá a interface do phpMyAdmin

---

### 3️⃣ Criar o Banco de Dados

**Opção A - Importar arquivo SQL (RECOMENDADO)**

1. No phpMyAdmin, clique na aba **Importar**
2. Clique em **Escolher arquivo**
3. Navegue até: `C:\xampp\htdocs\PositiveSense\database\positivesense.sql`
4. Clique em **Executar** no final da página
5. Aguarde a mensagem de sucesso

**Opção B - Via linha de comando**

```bash
# No PowerShell ou CMD
cd C:\xampp\mysql\bin
.\mysql -u root -p < C:\xampp\htdocs\PositiveSense\database\positivesense.sql
```

**Opção C - Manual (copiar e colar)**

1. Abra o arquivo `database/positivesense.sql`
2. Copie todo o conteúdo
3. No phpMyAdmin, clique na aba **SQL**
4. Cole o conteúdo
5. Clique em **Executar**

---

### 4️⃣ Verificar Criação

Após importar, você deve ver:

- ✅ Banco de dados `positivesense` na lista lateral esquerda
- ✅ Tabelas criadas:
  - `usuarios`
  - `sessoes`
  - `logs_acesso`
  - `oauth_users` (se migrations_oauth.sql foi executado)

---

## ⚙️ Configuração de Credenciais

O arquivo `config/database.php` já está configurado com os padrões do XAMPP:

```php
define('DB_HOST', 'localhost');
define('DB_NAME', 'positivesense');
define('DB_USER', 'root');
define('DB_PASS', ''); // Senha vazia por padrão no XAMPP
```

Se você configurou senha para o MySQL, edite a linha `DB_PASS`.

---

## 🧪 Testar Conexão

1. Inicie o servidor PHP:
   ```bash
   php -S localhost:8000
   ```

2. Acesse no navegador:
   ```
   http://localhost:8000/index.php
   ```

3. Se aparecer uma **página de erro vermelha**, verifique:
   - MySQL está rodando no XAMPP?
   - Banco `positivesense` foi criado?
   - Credenciais estão corretas?

4. Se a página carregar normalmente, **está funcionando!** ✅

---

## 👤 Usuário Padrão

Após criar o banco, um usuário administrador é criado automaticamente:

- **Email:** `admin@positivesense.com`
- **Senha:** `admin123`

⚠️ **IMPORTANTE:** Altere esta senha após o primeiro login!

---

## 🐛 Solução de Problemas

### Erro: "Access denied for user 'root'@'localhost'"

**Causa:** Senha do MySQL está incorreta.

**Solução:**
1. Verifique a senha do MySQL no XAMPP
2. Edite `config/database.php` e ajuste `DB_PASS`

---

### Erro: "Unknown database 'positivesense'"

**Causa:** O banco de dados não foi criado.

**Solução:**
1. Acesse phpMyAdmin
2. Importe o arquivo `database/positivesense.sql`

---

### Erro: "Can't connect to MySQL server"

**Causa:** MySQL não está rodando.

**Solução:**
1. Abra o XAMPP Control Panel
2. Clique em **Start** no MySQL
3. Se não iniciar, verifique se a porta 3306 está livre

---

### Erro: "Table 'positivesense.usuarios' doesn't exist"

**Causa:** As tabelas não foram criadas.

**Solução:**
1. No phpMyAdmin, selecione o banco `positivesense`
2. Clique na aba **SQL**
3. Execute o conteúdo de `database/positivesense.sql`

---

## 📂 Estrutura do Banco

```
positivesense
├── usuarios (dados dos usuários)
├── sessoes (controle de login)
├── logs_acesso (histórico de acessos)
└── oauth_users (login com Google - opcional)
```

---

## 🔧 Comandos Úteis MySQL

### Ver todos os bancos de dados
```sql
SHOW DATABASES;
```

### Selecionar banco positivesense
```sql
USE positivesense;
```

### Ver todas as tabelas
```sql
SHOW TABLES;
```

### Ver estrutura da tabela usuarios
```sql
DESCRIBE usuarios;
```

### Ver todos os usuários cadastrados
```sql
SELECT id, nome, email, tipo_usuario FROM usuarios;
```

### Resetar senha do admin
```sql
UPDATE usuarios
SET senha = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
WHERE email = 'admin@positivesense.com';
-- Nova senha: admin123
```

---

## 📊 Backup do Banco

### Exportar via phpMyAdmin
1. Selecione o banco `positivesense`
2. Clique em **Exportar**
3. Método: **Rápido**
4. Formato: **SQL**
5. Clique em **Executar**

### Exportar via linha de comando
```bash
cd C:\xampp\mysql\bin
.\mysqldump -u root positivesense > backup.sql
```

---

## ✅ Checklist de Verificação

Antes de usar o sistema, confirme:

- [ ] XAMPP instalado e rodando
- [ ] Apache e MySQL com status **Running** (verde)
- [ ] Banco `positivesense` criado no phpMyAdmin
- [ ] Tabelas criadas (usuarios, sessoes, logs_acesso)
- [ ] Arquivo `config/database.php` com credenciais corretas
- [ ] Servidor PHP rodando na porta 8000
- [ ] Página index.php carregando sem erros

---

## 📞 Suporte

Se encontrar problemas:

1. Verifique os logs de erro em `php_error.log`
2. Consulte a documentação do XAMPP
3. Revise o arquivo `database/README_BD.md`

---

**Sistema:** PositiveSense
**Versão:** 1.0
**Data:** Novembro 2025
