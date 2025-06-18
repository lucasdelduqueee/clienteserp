# Casos de Teste Manuais – Cadastro e Listagem de Clientes

## Cenário 1: Cadastro com dados válidos realizado por usuário autenticado
**DADO** que o usuário autenticado cadastra:
- Nome: "João Silva"
- E-mail: joao.silva@email.com
- CNPJ: 12.345.678/0001-90
- Telefone: 11999999999  
**QUANDO** clica em "Salvar"  
**ENTÃO** deve receber a mensagem:  
**"Pré-cadastro feito com sucesso, aguardando a aprovação do administrador"**  
E o cliente deve constar no painel do administrador com status **"Pendente"**.

---

## Cenário 2: Cadastro com dados válidos realizado por usuário não autenticado
**DADO** que um usuário não autenticado tenta cadastrar:
- Nome: "Maria Souza"
- E-mail: maria.souza@email.com
- CNPJ: 98.765.432/0001-10
- Telefone: 11988887777  
**QUANDO** clica em "Salvar"  
**ENTÃO** deve receber a mensagem:  
**"Usuário sem permissão para realizar pré-cadastro, pois não está autenticado no sistema"**

---

## Cenário 3: Cadastro com todos os campos obrigatórios em branco
**DADO** que o usuário deixa em branco os campos:
- Nome
- E-mail
- CNPJ
- Telefone  
**QUANDO** clica em "Salvar"  
**ENTÃO** deve receber a mensagem:  
**"É obrigatório o preenchimento dos campos: nome, e-mail, CNPJ e telefone"**

---

## Cenário 4: Cadastro com CNPJ inválido
**DADO** que o usuário autenticado cadastra:
- Nome: "Carlos Lima"
- E-mail: carlos.lima@email.com
- CNPJ: 00.000.000/0000-00 (inválido)
- Telefone: 11977776666  
**QUANDO** clica em "Salvar"  
**ENTÃO** deve receber a mensagem:  
**"CNPJ inválido"**

---

## Cenário 5: Cadastro de um CNPJ já cadastrado
**DADO** que o usuário autenticado cadastra:
- Nome: "Fernanda Torres"
- E-mail: fernanda.torres@email.com
- CNPJ: 12.345.678/0001-90 (já existente)
- Telefone: 11977778888  
**QUANDO** clica em "Salvar"  
**ENTÃO** deve receber a mensagem:  
**"CNPJ já está cadastrado"**

---

## Cenário 6: Listagem de clientes com paginação
**DADO** que existem mais de 10 clientes cadastrados  
**E** o usuário acessa a tela de listagem de clientes  
**QUANDO** visualiza a lista  
**ENTÃO** deve ver apenas os **10 primeiros registros**  
**E** deve existir a opção de navegar para a **próxima página**

---

## Cenário 7: Filtro de clientes por status "Pendente"
**DADO** que existem clientes com os status "Aprovado", "Rejeitado" e "Pendente"  
**QUANDO** o usuário aplica o filtro por status **"Pendente"** na listagem  
**ENTÃO** a listagem deve exibir **apenas** os clientes com status "Pendente"  
**E** não deve exibir clientes com outros status
