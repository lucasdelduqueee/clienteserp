<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ClienteTest extends TestCase
{
    use WithFaker;

    private function autenticar($admin = false)
    {
        return ['Authorization' => 'Bearer fake-token' . ($admin ? '-admin' : '')];
    }

    // Cenário 1
    public function testCadastroValidoComUsuarioAutenticado()
    {
        $payload = [
            'nome' => 'João Silva',
            'email' => 'joao.silva@email.com',
            'cnpj' => '12.345.678/0001-90',
            'telefone' => '11999999999'
        ];

        $response = $this->json('POST', '/api/clientes', $payload, $this->autenticar());

        $response->assertStatus(201)
                 ->assertJsonFragment([
                     'mensagem' => 'Pré-cadastro feito com sucesso, aguardando a aprovação do administrador',
                     'status' => 'pendente'
                 ]);
    }

    // Cenário 2
    public function testCadastroValidoComUsuarioNaoAutenticado()
    {
        $payload = [
            'nome' => 'Maria Souza',
            'email' => 'maria.souza@email.com',
            'cnpj' => '98.765.432/0001-10',
            'telefone' => '11988887777'
        ];

        $response = $this->json('POST', '/api/clientes', $payload);

        $response->assertStatus(401)
                 ->assertJsonFragment([
                     'mensagem' => 'Usuário sem permissão para realizar pré-cadastro, pois não está autenticado no sistema'
                 ]);
    }

    // Cenário 3
    public function testCadastroComCamposObrigatoriosEmBranco()
    {
        $payload = [
            'nome' => '',
            'email' => '',
            'cnpj' => '',
            'telefone' => ''
        ];

        $response = $this->json('POST', '/api/clientes', $payload, $this->autenticar());

        $response->assertStatus(422)
                 ->assertJsonFragment([
                     'mensagem' => 'É obrigatório o preenchimento dos campos: nome, e-mail, CNPJ e telefone'
                 ]);
    }

    // Cenário 4
    public function testCadastroComCnpjInvalido()
    {
        $payload = [
            'nome' => 'Carlos Lima',
            'email' => 'carlos.lima@email.com',
            'cnpj' => '00.000.000/0000-00',
            'telefone' => '11977776666'
        ];

        $response = $this->json('POST', '/api/clientes', $payload, $this->autenticar());

        $response->assertStatus(422)
                 ->assertJsonFragment([
                     'mensagem' => 'CNPJ inválido'
                 ]);
    }

    // Cenário 5
    public function testCadastroComCnpjDuplicado()
    {
        $payload = [
            'nome' => 'Fernanda Torres',
            'email' => 'fernanda.torres@email.com',
            'cnpj' => '12.345.678/0001-90', // mesmo do teste anterior
            'telefone' => '11977778888'
        ];

        $response = $this->json('POST', '/api/clientes', $payload, $this->autenticar());

        $response->assertStatus(409)
                 ->assertJsonFragment([
                     'mensagem' => 'CNPJ já está cadastrado'
                 ]);
    }

    // Cenário 6
    public function testListagemClientesComPaginacao()
    {
        $response = $this->json('GET', '/api/clientes?page=1', [], $this->autenticar());

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data',
                     'meta' => ['page', 'per_page', 'total']
                 ]);
    }

    // Cenário 7
    public function testFiltroClientesPorStatusPendente()
    {
        $response = $this->json('GET', '/api/clientes?status=pendente', [], $this->autenticar());

        $response->assertStatus(200)
                 ->assertJsonFragment([
                     'status' => 'pendente'
                 ]);
    }
}
