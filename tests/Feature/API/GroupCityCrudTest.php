<?php
namespace Tests\API\Feature;

use App\Models\City;
use App\Models\Campaign;
use App\Models\GroupCity;
use App\Models\State;
use COM;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class GroupCityCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  get all group_cities
     *
     * @return void
     */
    public function test_get_all_group_cities(): void
    {
        Campaign::factory(3)->create();
        State::factory(3)->create();
        City::factory(3)->create();

        GroupCity::factory(3)->create();

        $response = $this->getJson('api/group_cities');

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * create a new city
     * @return void
     */
    public function test_create_city() : void
    {
        State::factory(3)->create();

        $campaign = Campaign::factory(1)->create()->first();
        $city = City::factory(1)->create()->first();

        GroupCity::factory(2)->create();

        $data = [
            'name' => 'nova city',
            'city_id' => $city->id,
            'campaign_id' => $campaign->id
        ];

        $response = $this->postJson('api/group_cities', $data);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * update a city
     *
     * @return void
     */
    public function test_update_city() : void
    {
        State::factory(3)->create();

        $campaigns = Campaign::factory(2)->create();
        $city = City::factory(1)->create()->first();

        $group = GroupCity::factory(2)->create()->first();

        $data = [
            'name' => 'nova city',
            'city_id' => $city->id,
            'campaign_id' => $campaigns[1]->id
        ];

        $response = $this->putJson("api/group_cities/$group->id", $data);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(
                [
                    'name' => $data['name'],
                    'city_id' => $data['city_id'],
                    'campaign_id' => $data['campaign_id'],
                ]
            );
    }

    /**
     * show a city
     *
     * @return void
     */
    public function test_show_city() : void
    {
        State::factory(1)->create();
        Campaign::factory(1)->create();
        City::factory(1)->create()->first();

        $group = GroupCity::factory(1)->create()->first()->id;

        $response = $this->getJson("api/group_cities/$group");

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
        Campaign::factory(1)->create();
        City::factory(1)->create();

        $group = GroupCity::factory(1)->create()->first()->id;

        $response = $this->deleteJson("api/group_cities/$group");

        $response->assertStatus(Response::HTTP_OK);
    }
}
