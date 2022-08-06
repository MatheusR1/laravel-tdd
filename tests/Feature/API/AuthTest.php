<?php
namespace Tests\API\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  verify if login do login
     *
     * @return void
     */
    public function test_do_login()
    {
        $data = User::factory(3)
            ->create()
            ->random()
            ->toArray();

        $data['password'] = 'password';

        $response = $this->post('api/login', $data);

        $response->assertStatus(200);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_do_logout()
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        $response = $this->post('api/logout');

        $response->assertStatus(200);
    }
}
