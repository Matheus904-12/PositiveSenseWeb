# 🚀 Deploy no InfinityFree - Guia Rápido

## ✅ Pré-requisitos

- [ ] Conta criada no [InfinityFree](https://www.infinityfree.net/)
- [ ] Site/domínio criado no painel
- [ ] Acesso ao File Manager ou FTP

---

## 📋 Passo a Passo

### 1️⃣ Criar Banco de Dados MySQL

1. Acesse o painel do InfinityFree
2. Vá em **MySQL Databases**
3. Clique em **Create Database**
4. Anote as informações:
   ```
   Host: sql200.infinityfreeapp.com (exemplo)
   Database: epiz_12345678_positivesense
   Username: epiz_12345678
   Password: sua_senha_gerada
   ```

---

### 2️⃣ Importar Banco de Dados

1. No painel, clique em **phpMyAdmin**
2. Faça login (use as credenciais do passo anterior)
3. Selecione seu banco de dados na lateral esquerda
4. Clique na aba **Import** (Importar)
5. Clique em **Choose File** e selecione: `database/positivesense.sql`
6. Clique em **Go** (Executar)
7. Aguarde a mensagem de sucesso

---

### 3️⃣ Configurar Credenciais do Banco

**IMPORTANTE:** Antes de fazer upload, edite o arquivo `config/database.php`:

```php
} else {
    // AMBIENTE PRODUÇÃO (INFINITYFREE)
    define('DB_HOST', 'sql200.infinityfreeapp.com'); // Cole o HOST do seu painel
    define('DB_PORT', null);
    define('DB_NAME', 'epiz_12345678_positivesense'); // Cole o DATABASE NAME
    define('DB_USER', 'epiz_12345678'); // Cole o USERNAME
    define('DB_PASS', 'sua_senha_aqui'); // Cole a PASSWORD
    define('DB_ENV', 'PRODUCTION-INFINITYFREE');
    define('USE_SSL', false);
}
```

---

### 4️⃣ Fazer Upload dos Arquivos

**Opção A - File Manager (Recomendado para iniciantes)**

1. Acesse **File Manager** no painel
2. Navegue até a pasta `htdocs` (root do site)
3. **Delete** os arquivos padrão (index.html, default.php, etc.)
4. Clique em **Upload**
5. Selecione **TODOS** os arquivos do projeto PositiveSense
   - ⚠️ **Não inclua** a pasta `.git` (muito pesada e desnecessária)
   - ⚠️ **Não inclua** `uploads/avatars/*.jpg` (avatares de teste locais)
6. Aguarde o upload completo

**Opção B - FTP (Mais rápido para muitos arquivos)**

1. No painel, vá em **FTP Details**
2. Anote:
   ```
   Host: ftp.seusite.infinityfreeapp.com
   Username: seu_username
   Password: sua_senha
   Port: 21
   ```
3. Use um cliente FTP (FileZilla, WinSCP, etc.)
4. Conecte e envie todos os arquivos para `/htdocs/`

---

### 5️⃣ Criar Pastas com Permissões

No File Manager ou FTP, crie as pastas:

```
htdocs/uploads/avatars/
```

Defina permissões (caso necessário):
- `uploads/` → 755
- `uploads/avatars/` → 755

---

### 6️⃣ Testar o Site

1. Acesse seu domínio: `http://seusite.infinityfreeapp.com`
2. Você deve ver a página inicial do PositiveSense
3. Teste o cadastro de usuário
4. Teste o login
5. Teste os jogos

---

## 🔧 Arquivos que DEVEM estar no servidor:

```
htdocs/
├── index.php ✅
├── login.php ✅
├── registro.php ✅
├── perfil.php ✅
├── jogo.php ✅
├── inicial.php ✅
├── chatbot_api.php ✅
├── config/
│   ├── database.php ✅ (COM CREDENCIAIS DO INFINITYFREE)
│   ├── session.php ✅
│   └── google_oauth.php ✅
├── components/ ✅
├── css/ ✅
├── js/ ✅
├── img/ ✅
├── data/ ✅
├── uploads/
│   └── avatars/ ✅ (pasta vazia inicialmente)
└── database/
    └── positivesense.sql ✅
```

---

## ❌ Arquivos que NÃO devem ir para o servidor:

```
.git/ ❌
.history/ ❌
.vscode/ ❌
*.md (arquivos de documentação) ❌ (opcional)
test_*.php ❌ (arquivos de teste)
uploads/avatars/*.jpg ❌ (avatares locais)
```

---

## 🐛 Solução de Problemas

### Erro: "Connection refused"

**Causa:** Credenciais do banco incorretas ou banco não importado.

**Solução:**
1. Verifique `config/database.php` → credenciais corretas?
2. Acesse phpMyAdmin → banco `positivesense` existe?
3. Verifique se as tabelas foram criadas (usuarios, sessoes, logs_acesso)

---

### Erro: "404 Not Found" nas páginas

**Causa:** Arquivos não foram enviados ou estão na pasta errada.

**Solução:**
1. Certifique-se que os arquivos estão em `/htdocs/` e não em `/htdocs/PositiveSense/`
2. URLs devem ser: `http://seusite.com/login.php` (sem pasta extra)

---

### Erro: "Permission denied" ao fazer upload de avatar

**Causa:** Pasta `uploads/avatars/` não existe ou sem permissão.

**Solução:**
```bash
# No File Manager:
1. Crie a pasta uploads/avatars/
2. Clique com botão direito → Permissions → 755
```

---

### Erro: Página em branco (white screen)

**Causa:** Erro de PHP não sendo exibido.

**Solução:**
1. Acesse o File Manager
2. Crie um arquivo `.htaccess` na raiz (htdocs) com:
```apache
php_flag display_errors on
php_value error_reporting E_ALL
```
3. Recarregue a página e veja o erro

---

### Chatbot não funciona

**Causa:** Servidor Live Server ainda rodando localmente.

**Solução:**
1. Acesse via domínio InfinityFree diretamente
2. NÃO use `localhost` ou `127.0.0.1`
3. URL correta: `http://seusite.infinityfreeapp.com`

---

## ⚙️ Configurações Importantes

### .htaccess (opcional, mas recomendado)

Crie um arquivo `.htaccess` na raiz:

```apache
# Proteger arquivos sensíveis
<FilesMatch "^(database\.php|session\.php|google_oauth\.php)$">
    Order Allow,Deny
    Deny from all
</FilesMatch>

# Forçar HTTPS (se tiver certificado SSL)
# RewriteEngine On
# RewriteCond %{HTTPS} off
# RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

# Remover extensão .php das URLs (opcional)
# RewriteEngine On
# RewriteCond %{REQUEST_FILENAME} !-d
# RewriteCond %{REQUEST_FILENAME}\.php -f
# RewriteRule ^(.*)$ $1.php [L]
```

---

## 📊 Checklist Final

Antes de considerar o deploy concluído:

- [ ] Banco de dados MySQL criado no InfinityFree
- [ ] SQL importado (tabelas: usuarios, sessoes, logs_acesso)
- [ ] Credenciais atualizadas em `config/database.php`
- [ ] Todos os arquivos PHP enviados para `/htdocs/`
- [ ] Pastas `uploads/avatars/` criadas com permissão 755
- [ ] Site carrega sem erro 500/404
- [ ] Cadastro de usuário funciona
- [ ] Login funciona
- [ ] Perfil carrega
- [ ] Jogos carregam
- [ ] Chatbot responde (teste com "oi")
- [ ] Upload de avatar funciona

---

## 🎉 Pronto!

Seu site **PositiveSense** agora está rodando no InfinityFree!

**URL do site:** `http://seusite.infinityfreeapp.com`

**Login admin padrão:**
- Email: `admin@positivesense.com`
- Senha: `admin123`

⚠️ **IMPORTANTE:** Altere a senha do admin após o primeiro login!

---

## 📞 Suporte

Se tiver problemas:

1. Verifique os logs de erro no painel do InfinityFree
2. Consulte `docs/TIDB_INFINITYFREE.md`
3. Revise este guia passo a passo
4. Verifique o fórum do InfinityFree

---

**Boa sorte! 🚀**
