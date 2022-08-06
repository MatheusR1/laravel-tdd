<?php
namespace Tests\API\Feature;

use App\Models\Campaign;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class CampaignCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  get all campaigns
     *
     * @return void
     */
    public function test_get_all_campaigns(): void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        Campaign::factory(3)->create();

        $response = $this->getJson('api/campaigns');

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * create a new campaign
     * @return void
     */
    public function test_create_campaign() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        $campaign = Campaign::factory(1)->create()->first();

        $data = [
            'name' => $campaign->name,
        ];

        $response = $this->postJson('api/campaigns', $data);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * update a campaign
     *
     * @return void
     */
    public function test_update_campaign() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        Campaign::factory(2)->create();
        $campaign = Campaign::factory(1)->create()->first();

        $data = [
            'name' => $campaign->name
        ];

        $response = $this->putJson("api/campaigns/$campaign->id", $data);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(['name' => $campaign->name]);
    }

    /**
     * show a campaign
     *
     * @return void
     */
    public function test_show_campaign() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        $campaign = Campaign::factory(1)->create()->first();

        $response = $this->getJson("api/campaigns/$campaign->id");

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * delete a campaign
     *
     * @return void
     */
    public function test_delete_campaign() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        Campaign::factory(1)->create();
        $campaign = Campaign::factory(1)->create()[0]->id;

        $response = $this->deleteJson("api/campaigns/$campaign");

        $response->assertStatus(Response::HTTP_OK);
    }
}
