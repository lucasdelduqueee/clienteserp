# Plano de Testes - Sistema de Cadastro e Listagem de Clientes

## 1. Objetivo

Garantir que o sistema permita que cooperativas cadastrem, listem e filtrem clientes de forma segura, válida e controlada por autenticação e aprovação administrativa.

## 2. Escopo

### Incluído:
- Cadastro de clientes com validação de dados (nome, CNPJ, e-mail)
- Controle de autenticação para cadastro
- Verificação de unicidade e validade de CNPJ
- Listagem de clientes com paginação e filtros por nome, CNPJ e status
- Aprovação e rejeição de cadastros por administradores

### Excluído:
- Fluxos financeiros ou integração com sistemas externos
- Interface gráfica detalhada (foco na API)

## 3. Estratégia de Teste

- **Testes Manuais**: para validação de fluxo, mensagens e UI simulada.
- **Testes Automatizados**: com Laravel/PHPUnit para validação de regras e retornos da API.
- **Testes Negativos**: validar erros como campos obrigatórios, CNPJ inválido, usuário não autenticado.
- **Testes Positivos**: validar cadastros corretos e filtros funcionais.

## 4. Ambiente de Teste

- Laravel 10
- PHP >= 8.1
- PHPUnit
- SQLite (banco em memória para testes)
- Docker/Laravel Sail (opcional)

## 5. Critérios de Entrada

- Ambiente configurado
- API funcional simulada (mock/fake)

## 6. Critérios de Saída

- Todos os testes críticos passando (automatizados e manuais)
- Lista de bugs críticos resolvida
- Funcionalidades principais testadas: cadastro, filtro, autenticação, aprovação

## 7. Recursos

- 1 QA (manual e automação)
- 1 Dev (para suporte aos testes)
- Ferramentas: VSCode, Postman, PHPUnit, Docker

## 8. Riscos

- API ainda não implementada (testes por simulação)
- Possível variação na validação de CNPJ
- Inconsistência entre front-end e lógica back-end

## 9. Casos de Teste Relacionados

Ver arquivo `docs/CasosDeTesteManuais.md` com os 7 cenários principais.

## 10. Cronograma (estimado)

| Etapa                     | Duração Estimada |
|--------------------------|------------------|
| Escrita do plano e casos | 1 dia            |
| Implementação dos testes | 2 dias           |
| Execução + ajustes       | 1 dia            |
| Total                    | 4 dias úteis     |
