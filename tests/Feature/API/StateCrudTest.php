<?php
namespace Tests\Feature;

use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class StateCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  get all states
     *
     * @return void
     */
    public function test_get_all_states(): void
    {
        $create = State::factory(3)->create()->toArray();

        $response = $this->getJson('api/states');

        $response->assertExactJson($create);

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * create a new state
     * @return void
     */
    public function test_create_state() : void
    {
        $data = [
            'name' => 'nova state',
            'uf' => 'NY'
        ];

        $response = $this->postJson('api/states', $data);

        $response->assertJsonFragment($data);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * update a state
     *
     * @return void
     */
    public function test_update_state() : void
    {
        State::factory(2)->create();
        $state = state::factory(1)->create()->first();
                
        $data = [
            'name' => 'nova state',
            'uf' => $state->uf
        ];

        $response = $this->putJson("api/states/$state->id", $data);

        $response->assertStatus(Response::HTTP_OK)
                ->assertJsonFragment($data);
    }

    /**
     * show a state
     *
     * @return void
     */
    public function test_show_state() : void
    {
        State::factory(1)->create();

        $state = state::factory(1)->create()[0]->id;

        $response = $this->getJson("api/states/$state");

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * delete a state
     *
     * @return void
     */
    public function test_delete_state() : void
    {
        State::factory(1)->create();
        $state = state::factory(1)->create()[0]->id;

        $response = $this->deleteJson("api/states/$state");

        $response->assertStatus(Response::HTTP_OK);
    }
}
