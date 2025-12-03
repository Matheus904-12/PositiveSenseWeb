# 🚀 Deploy PositiveSense via FTP

## 📋 Informações de Conexão

```
Host FTP: ftpupload.net
Usuário: if0_40192662
Senha: 0k9Y00tDgU
Porta: 21
```

## 🔧 Passo 1: Instalar Cliente FTP

### FileZilla (Recomendado)
1. Baixe: https://filezilla-project.org/download.php?type=client
2. Instale normalmente (Next, Next, Finish)

### Alternativa: WinSCP
- Download: https://winscp.net/eng/download.php

## 🌐 Passo 2: Conectar ao FTP

### No FileZilla:
1. Abra o FileZilla
2. Clique em **File** → **Site Manager** (ou Ctrl+S)
3. Clique em **New Site**
4. Configure:
   - **Protocol**: FTP - File Transfer Protocol
   - **Host**: `ftpupload.net`
   - **Port**: `21`
   - **Encryption**: Use explicit FTP over TLS if available
   - **Logon Type**: Normal
   - **User**: `if0_40192662`
   - **Password**: `0k9Y00tDgU`
5. Clique em **Connect**

### No WinSCP:
1. Abra o WinSCP
2. New Site
3. Configure:
   - **File protocol**: FTP
   - **Host name**: `ftpupload.net`
   - **Port number**: `21`
   - **User name**: `if0_40192662`
   - **Password**: `0k9Y00tDgU`
4. Clique em **Login**

## 📤 Passo 3: Upload dos Arquivos

### Estrutura de Pastas no InfinityFree:
```
/ (raiz)
└── htdocs/          ← TUDO VAI AQUI!
    ├── index.php
    ├── login.php
    ├── registro.php
    ├── config/
    ├── components/
    ├── css/
    ├── js/
    ├── img/
    └── uploads/
```

### Arquivos para Upload:
✅ **ENVIAR TUDO, EXCETO:**
- ❌ `.git/` (pasta Git)
- ❌ `docs/` (documentação)
- ❌ `database/` (scripts SQL - já estão no banco)
- ❌ `.gitignore`
- ❌ `LICENSE`
- ❌ Arquivos de teste (`teste_*.php`, `debug_*.php`)

### Lista de Arquivos Essenciais:
```
✓ *.php (todos os arquivos PHP da raiz)
✓ config/ (database.php, google_oauth.php, session.php, etc)
✓ components/ (header.php, footer.php, etc)
✓ css/ (styles.css, accessibility.css, etc)
✓ js/ (main.js, chatbot.js, etc)
✓ img/ (avatars/, logos, ícones)
✓ uploads/ (criar pasta vazia)
```

## 📁 Passo 4: Estrutura no Servidor

### 4.1. Limpar htdocs
**IMPORTANTE**: Delete o arquivo `default.php` que vem no InfinityFree!

### 4.2. Upload dos Arquivos PHP
Na **pasta htdocs**, envie:
- `index.php`
- `login.php`
- `registro.php`
- `perfil.php`
- `processar_*.php`
- E todos os outros `.php` da raiz

### 4.3. Upload das Pastas
Arraste as pastas inteiras:
- `config/`
- `components/`
- `css/`
- `js/`
- `img/`

### 4.4. Criar Pasta de Uploads
1. Dentro de `htdocs`, crie a pasta: `uploads`
2. Dentro de `uploads`, crie: `avatars`
3. **Importante**: Configure permissões 755 para `uploads/avatars/`

## 🔐 Passo 5: Configurar Permissões

### No FileZilla:
1. Clique com botão direito na pasta `uploads/avatars/`
2. Selecione **File Permissions**
3. Configure: `755` ou marque:
   - ✅ Owner: Read, Write, Execute
   - ✅ Group: Read, Execute
   - ✅ Public: Read, Execute
4. ✅ Marque: "Recurse into subdirectories"
5. Clique em **OK**

## 🧪 Passo 6: Testar o Deploy

### 6.1. Acessar o Site
Seu site estará em uma dessas URLs:
- `http://if0-40192662.infinityfreeapp.com`
- `http://seudominio.infinityfreeapp.com`

### 6.2. Verificar Páginas
Teste cada página principal:
- ✓ `index.php` - Página inicial
- ✓ `login.php` - Sistema de login
- ✓ `registro.php` - Cadastro de usuários
- ✓ `perfil.php` - Perfil do usuário

### 6.3. Testar Cadastro
1. Acesse `registro.php`
2. Preencha o formulário
3. Clique em "Cadastrar"
4. Deve redirecionar para login ou dashboard

### 6.4. Testar Login
Use o usuário admin padrão:
- **Email**: `admin@positivesense.com`
- **Senha**: `admin123`

## ⚠️ Possíveis Problemas e Soluções

### Problema: "Access Denied" ao conectar FTP
**Solução**:
- Verifique se copiou a senha corretamente: `0k9Y00tDgU`
- Tente reconectar após alguns minutos
- Use modo "Passive" no FileZilla (Settings → Connection → FTP)

### Problema: "Permission Denied" ao fazer upload
**Solução**:
- Certifique-se de estar dentro da pasta `htdocs`
- Não tente enviar arquivos para a raiz `/`

### Problema: Erro 500 ao acessar o site
**Solução**:
1. Verifique se todos os arquivos PHP foram enviados
2. Verifique se `config/database.php` está correto
3. Verifique permissões da pasta `uploads/`

### Problema: Imagens não aparecem
**Solução**:
- Verifique se enviou a pasta `img/` completa
- Certifique-se de que enviou `img/avatars/`
- Verifique caminhos no código (devem ser relativos)

### Problema: CSS não carrega
**Solução**:
- Verifique se enviou a pasta `css/` completa
- Abra o DevTools (F12) e veja se há erros 404
- Verifique caminhos no `<link>` dos arquivos HTML/PHP

## 🎯 Checklist Final

Antes de considerar o deploy completo:

```
□ Conectei ao FTP com sucesso
□ Limpei a pasta htdocs (removi default.php)
□ Enviei todos os arquivos PHP da raiz
□ Enviei a pasta config/ completa
□ Enviei a pasta components/ completa
□ Enviei a pasta css/ completa
□ Enviei a pasta js/ completa
□ Enviei a pasta img/ completa
□ Criei a pasta uploads/avatars/
□ Configurei permissões 755 em uploads/avatars/
□ Testei acessar index.php
□ Testei acessar login.php
□ Testei acessar registro.php
□ Testei fazer um cadastro
□ Testei fazer login com admin
```

## 📊 Estatísticas do Deploy

```
Total de Arquivos PHP: ~40
Total de Pastas: 7
Tempo Estimado: 5-10 minutos
Tamanho Total: ~5-10 MB
```

## 🔄 Atualizações Futuras

Para atualizar o site depois:
1. Conecte ao FTP
2. Envie apenas os arquivos modificados
3. Substitua quando perguntado

## 📞 Suporte

**InfinityFree:**
- Painel: https://dash.infinityfree.com
- Fórum: https://forum.infinityfree.com
- Status: https://status.infinityfree.com

**Erros Comuns:**
- Erro 403/404: Arquivo não encontrado ou sem permissão
- Erro 500: Erro de PHP ou configuração
- Erro 503: Servidor temporariamente indisponível

---

## 🎉 Pronto!

Após seguir todos os passos, seu site estará no ar!

Acesse: **http://if0-40192662.infinityfreeapp.com**

Bom deploy! 🚀
