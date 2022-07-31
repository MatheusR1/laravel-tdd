<?php
namespace Tests\Feature;

use App\Models\City;
use App\Models\State;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class CityCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  get all cities
     *
     * @return void
     */
    public function test_get_all_cities(): void
    {
        State::factory(3)->create();
        City::factory(3)->create();

        $response = $this->getJson('api/cities');

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * create a new city
     * @return void
     */
    public function test_create_city() : void
    {
        $state = State::factory(1)->create();

        $data = [
            'name' => 'nova city',
            'state_id' => $state[0]->id
        ];

        $response = $this->postJson('api/cities', $data);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * update a city
     *
     * @return void
     */
    public function test_update_city() : void
    {
        $states = State::factory(2)->create();
        $city = City::factory(1)->create()[0]->id;

        $data = [
            'name' => 'nova city',
            'state_id' => $states[1]->id
        ];

        $response = $this->putJson("api/cities/$city", $data);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(['city' => true]);
    }

    /**
     * show a city
     *
     * @return void
     */
    public function test_show_city() : void
    {
        State::factory(1)->create();
        $city = City::factory(1)->create()[0]->id;

        $response = $this->getJson("api/cities/$city");

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * delete a city
     *
     * @return void
     */
    public function test_delete_city() : void
    {
        State::factory(1)->create();
        $city = City::factory(1)->create()[0]->id;

        $response = $this->deleteJson("api/cities/$city");

        $response->assertStatus(Response::HTTP_OK);
    }
}
