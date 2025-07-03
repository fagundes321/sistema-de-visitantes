# 📋 Sistema de Cadastro de Usuários

 Este é um sistema simples de **cadastro de usuários em PHP**, com conexão a um banco de dados **MySQL** <!-- hospedado na **Render** -->.O sistema permite cadastrar as seguintes informações dos visitantes:  **CPF, nome, destino, responsável, hora da entrada, hora da saída e data visita**, salvando os dados diretamente no banco de dados.

---

<!-- ## 🔗 Projeto Online

➡️ Acesse aqui: [https://cadastro-de-usuarios-1us6.onrender.com](https://cadastro-de-usuarios-1us6.onrender.com) -->

---

## ⚙️ Tecnologias Utilizadas

- PHP 8.x
- MySQL (Render)
- HTML5 / CSS3
- Bootstrap 5
- Font Awesome

---

## 📁 Estrutura do Projeto

```
📁 actions/
├── 📁 pdf/                   
│   ├── 🐘 gerarPdf.php         # Responsável por gerar o PDF
│   └── 🐘 pdf.php              # Contém o layout/HTML do PDF
├── 🐘 create.php              # Página com o formulário de cadastro
├── 🐘 delete.php              # Exclusão de registros
├── 🐘 read.php                # Visualização de registros
└── 🐘 update.php              # Atualização de registros



📁 src/
 ├── db.php              # Arquivo de conexão com o banco de dados
 └── processa.php        # Processamento e inserção dos dados
📁 sql/
 └── criar_tabela.sql    # Script para criar a tabela no banco
README.md
```

---

## 🗃️ Script SQL – Criação da Tabela

```sql
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

<!-- ## 🌐 Banco de Dados (Render)

Estas são as informações genéricas de conexão que você precisa adaptar no arquivo `src/db.php`:

```php
$host = 'mysql-xxxx.onrender.com';
$user = 'seu_usuario';
$pass = 'sua_senha';
$db   = 'nome_do_banco';
```

> 💡 Para segurança, você pode usar variáveis de ambiente ou arquivos `.env`.

--- -->

## 🛠️ Rodando Localmente

> Para testar em seu ambiente local com PHP e MySQL:

1. Clone o repositório:
```bash
git https://github.com/fagundes321/sistema-de-visitantes.git
```

2. Configure os dados de conexão no `src/db.php`.

3. Suba um servidor local:
```bash
docker compose up -d --build
```

4. Acesse: `http://localhost:661`

---

## 💻 Funcionalidades

- [x] Cadastro de usuários (RG, Visitante, Responsável, Horário de Entrada, Horário de Saída e Data)
- [x] Armazenamento dos dados em banco MySQL
- [x] Interface responsiva com Bootstrap
- [ ] Listagem e edição de usuários *(em desenvolvimento)*

---

## 📎 Autor

Feito por **Victor Fagundes**  
🔗 GitHub: [@fagundes321](https://github.com/fagundes321)  
📧 Email: victorfagundes123@gmail.com

---

## ✅ Licença

Distribuído sob a licença MIT. Veja `LICENSE` para mais informações.