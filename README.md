# Integrantes da equipe: Daniel Stabile, Gabriel Braga, Gustavo Miranda, João Paulo Marmontelo, Kaue Alves, Marcus Vinicius.

# Gestão Hogwarts

Sistema de gerenciamento escolar inspirado no universo de Hogwarts, implementado em PHP.

# Módulos Implementados

O sistema está dividido em múltiplos módulos, localizados em `src/Model/`:

# Classes (Entidades principais)
Contém definições das classes PHP que representam as entidades do sistema:
- `Admin`, `Aluno`, `Professor`
- `Casa`, `Turma`, `Disciplina`
- `Desafio`, `Desempenho`, `Nota`, `Ocorrencia`, `Ranking`, etc.

# Módulo 1 — Cadastro de Alunos
Funcionalidades relacionadas ao cadastro de novos alunos no sistema.

# Módulo 2 — Cadastro de Professores e Disciplinas
Gerencia os dados de professores e disciplinas ofertadas.

# Módulo 3 — Lançamento de Notas e Desempenho
Permite que professores registrem o desempenho e notas dos alunos.

# Módulo 4 — Sistema de Casas e Ranking
Gerencia o sistema de pontuação entre casas, incluindo o ranking geral.

# Módulo 5 — Notificações e Ocorrências
Permite o envio de notificações e o registro de ocorrências escolares.

# Módulo 6 — Torneios e Desafios
Gerencia a organização e participação dos alunos em torneios e desafios especiais.

------------------------------------------------------------------------------------------------------

# Instruções de Execução

1. Requisitos:
   - Servidor com suporte a PHP (ex: XAMPP, WAMP, Laragon)
   - PHP 7.4 ou superior

2. Passos para execução:
   - Extraia o conteúdo do projeto em seu diretório raiz do servidor (ex: `htdocs/` no XAMPP).
   - Inicie o servidor Apache.
   - Acesse o projeto via navegador:
     ```
     http://localhost/Gest-o---Hogwarts-main/
     ```

