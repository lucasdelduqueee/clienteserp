# ✅ Execução dos Testes Automatizados

Este arquivo apresenta a execução simulada dos testes automatizados definidos na suíte `tests/Feature/ClientTest.php` no projeto Laravel.

---

## 🧪 Comando Utilizado

```bash
php artisan test


  # PASS  Tests\ClientTest
  ✓ cenario_usuario_autenticado_cadastra_cliente_com_sucesso
  ✓ cenario_erro_campos_obrigatorios
  ✓ cenario_erro_cnpj_invalido_ou_duplicado
  ✓ cenario_usuario_nao_autenticado_nao_pode_cadastrar
  ✓ cenario_listagem_clientes_com_pag_e_filtros
  ✓ cenario_aprovacao_e_rejeicao_de_cadastro

   Tests:  6 passed
  Time:   0.85s
