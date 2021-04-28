<p align="center"><a href="https://udv.org.br/" target="_blank"><img src="https://udv.org.br/wp-content/uploads/2016/09/centro-espirita-beneficente-uniao-do-vegetal1.png" width="400"></a></p>

## DESAFIO CARGO ANALISTA DE DESENVOLVIMENTO DE SISTEMAS

O desafio tem como objetivo avaliar a fluência, as técnicas de desenvolvimento bem e a agilidade dos candidatos na
resolução de problemas. O cenário do software é hipotético e visa meramente a aplicação de técnicas e conceitos de
desenvolvimento próximos aos aplicados no dia-a-dia dos projetos do Escritório da Diretoria Geral.

## O desafio:

Desenvolver um software simples de cadastro de funcionários conforme escopo descrito abaixo, utilizando o framework
PHP Laravel na sua versão 6.0 ou mais recente e banco de dados PostgreSql ou MySQL;

## Escopo:

Usuários

CRUD: Nome, Perfil de acesso, E-mail, Senha

=> Perfis de acesso:
- Administrador: Pode ver e editar todos os dados sistema;
- Supervisor: Pode ver seu Departamento e seus Funcionários podendo editar os dados no seu escopo;
- Funcionário: Pode ver apenas os seus dados, sem permissão de edição.

Regras:
O usuário deverá realizar a autenticação utilizando e-mail e senha. Todos os dados são obrigatórios.

Departamentos

CRUD: Nome, Telefone(s)

Regras:
Na listagem de departamentos deverá constar o total de funcionários e o custo total com salários de cada
departamento.
Apenas o nome do Departamento é obrigatório.
Departamentos podem ter um ou mais telefones.

Cargos

CRUD: Departamento, Nome, Salário base

Regras:
Na listagem de cargos deverá constar o número de funcionários e o custo total com salários de cada cargo.
Todos os dados são obrigatórios.

Funcionários

CRUD: Nome, Data de nascimento, Sexo, E-mail, Senha, Salário, Endereços, Telefone(s), Cargo, Categoria,
Situação

=> Categorias: Treinee, Júnior, Pleno, Sênior, Master;
=> Situações: Ativo, Inativo, Em férias, Aposentado;

Regras:
No cadastro apenas o Nome, Data de nascimento, Sexo, E-mail, Senha são obrigatórios;
Os campos Cargo, Categoria, Situação, Salário só poderão ser modificados pelos históricos;
A senha deverá ter 8 dígitos e ser gerada aleatoriamente.
Funcionário pode ter um ou mais endereços.
Funcionário pode ter um ou mais telefones.

Histórico do Funcionário

CRUD: Data, Tipo histórico, Descrição

=> Tipos de histórico:
- Admissão: Seta o Cargo, Categoria, Situação, Salário e data de admissão do funcionário;
- Promoção: Mudar para q categoria acima com incremento de 25% no salário;
- Reajuste de salário: Aumenta salário do funcionário;
- Entrou/Retornou de férias: Mudar a situação do funcionário;
- Aposentou-se: Mudar permanentemente a situação do funcionário;
- Demissão: Muda a situação do funcionário para Inativo.

Regras:
A data do histórico é obrigatória em todos os registros que deverão ser listados em ordem cronológica da mais
recente para a mais antiga.

## Dashboard

Deverá apresentar de forma resumida os dados do sistema tais como: Nº total de Departamentos, Cargos,
Funcionários, Funcionários por situação, Funcionários por categoria, Valor total da folha de pagamento e lista de últimos
registros de histórico com filtro por datas e tipo de histórico.

Prazo para entrega do desafio: 4 dias

Deve ter:
- Dados de teste para popular o banco de dados;
- Frameworks front-end como Bootstrap ou Tailwind;
- Requisições assíncronas sempre que possível;

Bom se tiver:
- Formulários de cadastro e edição abrindo em janelas modais;

Pontos de avaliação:
- Exploração dos recursos e ferramentas do framework Laravel;
- Modelagem;
- Boas práticas de programação e domínio da linguagem PHP;
- Clareza, Simplicidade e objetividade do código;
- Reutilização de código;
- Usabilidade e experiência do usuário.
