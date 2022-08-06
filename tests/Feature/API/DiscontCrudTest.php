<?php
namespace Tests\API\Feature;

use App\Models\Campaign;
use App\Models\Discont;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DiscontCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  get all disconts
     *
     * @return void
     */
    public function test_get_all_disconts(): void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        Campaign::factory(3)->create();
        Discont::factory(3)->create();

        $response = $this->getJson('api/disconts');

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * create a new discont
     * @return void
     */
    public function test_create_discont() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        $Campaign = Campaign::factory(1)->create()->first();

        $data = [
            'percenty' => rand(10, 100) / 100,
            'campaign_id' => $Campaign->id
        ];

        $response = $this->postJson('api/disconts', $data);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * update a discont
     *
     * @return void
     */
    public function test_update_discont() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        $Campaigns = Campaign::factory(2)->create();
        $discont = Discont::factory(1)->create()[0]->id;

        $data = [
            'percenty' => rand(10, 100) / 100,
            'campaign_id' => $Campaigns[1]->id
        ];

        $response = $this->putJson("api/disconts/$discont", $data);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment(['discont' => true]);
    }

    /**
     * show a discont
     *
     * @return void
     */
    public function test_show_discont() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        Campaign::factory(1)->create();
        $discont = Discont::factory(1)->create()[0]->id;

        $response = $this->getJson("api/disconts/$discont");

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * delete a discont
     *
     * @return void
     */
    public function test_delete_discont() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        Campaign::factory(1)->create();
        $discont = Discont::factory(1)->create()[0]->id;

        $response = $this->deleteJson("api/disconts/$discont");

        $response->assertStatus(Response::HTTP_OK);
    }
}
