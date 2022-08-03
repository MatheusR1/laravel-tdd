<?php
namespace Tests\API\Feature;

use App\Models\Campaign;
use App\Models\Discont;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
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
        Campaign::factory(1)->create();
        $discont = Discont::factory(1)->create()[0]->id;

        $response = $this->deleteJson("api/disconts/$discont");

        $response->assertStatus(Response::HTTP_OK);
    }
}
