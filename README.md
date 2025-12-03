# PositiveSense 🌟

Sistema web de apoio à saúde mental com jogos interativos, chatbot, recursos de acessibilidade e integração com IoT.

## 🚀 Demonstração

- **Site:** [positivesense.vercel.app](https://positivesense.vercel.app) _(em breve)_
- **Repositório:** [github.com/heloisamachado155/PositiveSense](https://github.com/heloisamachado155/PositiveSense)

## ✨ Funcionalidades

### 🎮 Jogos Interativos
- **Jogo da Memória** - Exercite a memória com cartas temáticas
- **Caça-Palavras** - Encontre palavras relacionadas à saúde mental
- **Jogo da Velha** - Clássico jogo de estratégia
- **Quebra-Cabeça** - Monte imagens relaxantes
- **Jogo da Sequência** - Teste sua memória sequencial
- **Fruit Ninja** - Jogo de reflexos e coordenação

### 💬 Chatbot Inteligente
- Assistente virtual para suporte emocional
- Respostas contextuais sobre saúde mental
- Interface amigável e acessível

### ♿ Acessibilidade
- **Painel de Acessibilidade** completo
- Alto contraste
- Ajuste de tamanho de fonte
- Tradução para LIBRAS via VLibras
- Leitor de tela compatível
- Navegação por teclado

### 👤 Sistema de Usuários
- Cadastro e login seguro
- Integração com Google OAuth
- Sistema de avatares personalizáveis
- Perfil de usuário editável
- Gerenciamento de sessões

### 📚 Recursos Educacionais
- Biblioteca de artigos sobre saúde mental
- Vídeos educativos
- Galeria de recursos visuais

### 🔌 Integração IoT
- Monitoramento de dispositivos ESP32
- Dashboard em tempo real
- Controle remoto de dispositivos

## 🛠️ Tecnologias

### Frontend
- HTML5, CSS3, JavaScript (ES6+)
- Design responsivo (Mobile First)
- Animações suaves e transições
- Loading screens personalizadas

### Backend
- PHP 8.x
- PDO para acesso ao banco de dados
- Arquitetura MVC
- API REST para chatbot

### Banco de Dados
- MySQL / TiDB Cloud
- Estrutura normalizada
- Sistema de sessões
- Logs de acesso
- Suporte a OAuth

### Deploy
- Vercel (Serverless PHP)
- TiDB Cloud (Database)
- GitHub Actions (CI/CD)
- SSL/HTTPS automático

## 📁 Estrutura do Projeto

```
PositiveSense/
├── components/          # Componentes reutilizáveis
│   ├── header.php      # Cabeçalho com navegação
│   ├── footer.php      # Rodapé
│   ├── accessibility-panel.php
│   └── loading-screen.php
├── config/             # Configurações
│   ├── database.php    # Conexão com banco
│   ├── session.php     # Gerenciamento de sessão
│   ├── google-oauth.php
│   └── isrgrootx1.pem  # Certificado SSL TiDB
├── css/                # Estilos
│   ├── styles.css      # Estilos principais
│   ├── accessibility.css
│   ├── chatbot.css
│   └── utilities.css
├── js/                 # Scripts
│   ├── main.js         # Script principal
│   ├── accessibility.js
│   ├── chatbot.js
│   ├── jogo-memoria.js
│   └── libras.js
├── img/                # Imagens
│   └── avatars/        # Avatares predefinidos
├── uploads/            # Uploads de usuários
│   └── avatars/        # Avatares personalizados
├── database/           # Scripts SQL
│   └── positivesense.sql
├── docs/               # Documentação
├── vercel.json         # Configuração Vercel
└── README.md
```

## 🚀 Como Executar Localmente

### Pré-requisitos
- PHP 8.0 ou superior
- MySQL 5.7+ ou XAMPP
- Composer (opcional)

### Instalação

1. **Clone o repositório**
```bash
git clone https://github.com/heloisamachado155/PositiveSense.git
cd PositiveSense
```

2. **Configure o banco de dados**
```bash
# Importe o schema SQL
mysql -u root -p < database/positivesense.sql
```

3. **Configure as credenciais**

Edite `config/database.php` se necessário (ambiente local usa localhost por padrão)

4. **Inicie o servidor PHP**
```bash
php -S localhost:8000
```

5. **Acesse no navegador**
```
http://localhost:8000
```

### Usuário Admin Padrão
- **Email:** admin@positivesense.com
- **Senha:** admin123

## 🌐 Deploy no Vercel

### Pré-requisitos
- Conta no [Vercel](https://vercel.com)
- Conta no [TiDB Cloud](https://tidbcloud.com)
- Repositório no GitHub

### Passo a Passo

1. **Criar banco TiDB Cloud**
   - Acesse https://tidbcloud.com
   - Create Cluster: Serverless (FREE)
   - Nome: positivesense
   - Importe `database/positivesense.sql`

2. **Fazer push para GitHub**
```bash
git add .
git commit -m "Deploy para Vercel"
git push origin main
```

3. **Configurar Vercel**
   - Acesse https://vercel.com
   - Import projeto do GitHub
   - Configure variáveis de ambiente:

```env
DB_HOST=gateway01.us-east-1.prod.aws.tidbcloud.com
DB_PORT=4000
DB_NAME=positivesense
DB_USER=seu_usuario_tidb
DB_PASS=sua_senha_tidb
SSL_CA_CONTENT=conteudo_do_certificado_ssl
```

4. **Deploy**
   - Clique em "Deploy"
   - Aguarde a finalização
   - Acesse sua URL: `seu-projeto.vercel.app`

## 📝 Variáveis de Ambiente

### Produção (Vercel)
```env
DB_HOST=gateway01.us-east-1.prod.aws.tidbcloud.com
DB_PORT=4000
DB_NAME=positivesense
DB_USER=<seu_usuario_tidb>
DB_PASS=<sua_senha_tidb>
SSL_CA_CONTENT=<certificado_ssl_completo>
```

### Google OAuth (Opcional)
```env
GOOGLE_CLIENT_ID=seu_client_id
GOOGLE_CLIENT_SECRET=seu_client_secret
GOOGLE_REDIRECT_URI=https://seu-site.com/google_callback.php
```

## 🧪 Testes

### Validar Sintaxe PHP
```bash
# Arquivo individual
php -l arquivo.php

# Todos os arquivos
Get-ChildItem -Path '*.php' -Recurse | ForEach-Object { php -l $_.FullName }
```

### Testar Conexão com Banco
```bash
php teste_db.php
```

## 📚 Documentação Adicional

- [Guia de Deploy](docs/project/QUICK_START.md)
- [Sistema de Avatares](docs/project/SISTEMA_AVATARES.md)
- [Chatbot](docs/project/CHATBOT_DOCUMENTACAO.md)
- [Padrões de Código](docs/STYLE_GUIDE.md)
- [Estrutura do Projeto](docs/STRUCTURE.md)

## 🤝 Contribuindo

Contribuições são bem-vindas! Para contribuir:

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/MinhaFeature`)
3. Commit suas mudanças (`git commit -m 'Adiciona MinhaFeature'`)
4. Push para a branch (`git push origin feature/MinhaFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 👥 Autores

- **Heloísa Machado** - [@heloisamachado155](https://github.com/heloisamachado155)

## 🙏 Agradecimentos

- VLibras pela integração de LIBRAS
- TiDB Cloud pelo banco de dados gratuito
- Vercel pela hospedagem
- Comunidade open source

## 📞 Contato

- **GitHub:** [@heloisamachado155](https://github.com/heloisamachado155)
- **Email:** admin@positivesense.com

## 🔗 Links Úteis

- [TiDB Cloud](https://tidbcloud.com)
- [Vercel](https://vercel.com)
- [VLibras](https://www.gov.br/governodigital/pt-br/vlibras)
- [PHP Documentation](https://www.php.net/docs.php)

---

**Desenvolvido com ❤️ para apoio à saúde mental**
