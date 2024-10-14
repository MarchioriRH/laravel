<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cliente;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use RefreshDatabase;
use App\Models\User;



class ClienteControllerTest extends TestCase
{


    /**
     * Test index method.
     */
    public function testIndex()
    {
        // $user = User::factory()->createOne();
        // $this->actingAs($user);
         $this->withoutMiddleware();

        Cliente::factory()->count(10)->create();

        $response = $this->get(route('clientes.index'));

        $response->assertStatus(200);
        $response->assertViewHas('clientes');
    }

    /**
     * Test store method.
     */
    public function testStore()
    {
        $data = [
            'nombre' => 'John Doe',
            'telefono' => '1234567890',
            'email' => 'john@example.com',
        ];

        $response = $this->post(route('clientes.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('clientes', $data);
    }

    /**
     * Test edit method.
     */
    public function testEdit()
    {
        $cliente = Cliente::factory()->create();

        $response = $this->get(route('clientes.edit', $cliente->id));

        $response->assertStatus(200);
        $response->assertViewHas('cliente');
    }

    /**
     * Test update method.
     */
    public function testUpdate()
    {
        $cliente = Cliente::factory()->create();

        $data = [
            'nombre' => 'Jane Doe',
            'telefono' => '0987654321',
            'email' => 'jane@example.com',
        ];

        $response = $this->put(route('clientes.update', $cliente->id), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('clientes', $data);
    }

    /**
     * Test destroy method.
     */
    public function testDestroy()
    {
        $cliente = Cliente::factory()->create();

        $response = $this->delete(route('clientes.destroy', $cliente->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('clientes', ['id' => $cliente->id]);
    }
}
