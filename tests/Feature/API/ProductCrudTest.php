<?php
namespace Tests\API\Feature;

use App\Models\Campaign;
use App\Models\City;
use App\Models\GroupCity;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Laravel\Sanctum\Sanctum;
use PhpParser\Node\Stmt\GroupUse;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  get all products
     *
     * @return void
     */
    public function test_get_all_products(): void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        State::factory(3)->create();
        City::factory(3)->create();
        Campaign::factory(3)->create();
        GroupCity::factory(3)->create();
        Product::factory(3)->create();

        $response = $this->getJson('api/products');

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * create a new product
     * @return void
     */
    public function test_create_product() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        State::factory(3)->create();
        City::factory(3)->create();
        Campaign::factory(3)->create();
        $group = GroupCity::factory(3)->create()->random();

        $data = [
            'name' => 'nova product',
            'price' => 5.00,
            'description' => 'nova product description',
            'id_group_cities' => $group->id,
        ];

        $response = $this->postJson('api/products', $data);

        $response->assertStatus(Response::HTTP_CREATED);
    }

    /**
     * update a product
     *
     * @return void
     */
    public function test_update_product() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        State::factory(3)->create();
        City::factory(3)->create();
        Campaign::factory(3)->create();
        $group = GroupCity::factory(3)->create()->random();

        $product = Product::factory(3)->create()->first();

        $data = [
            'name' => 'bread',
            'price' => 5.65,
            'description' => 'bread description',
            'id_group_cities' => $group->id
        ];

        $response = $this->putJson("api/products/$product->id", $data);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment($data);
    }

    /**
     * show a product
     *
     * @return void
     */
    public function test_show_product() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        State::factory(3)->create();
        City::factory(3)->create();
        Campaign::factory(3)->create();
        GroupCity::factory(3)->create();
        $product = Product::factory(1)->create()->first();

        $response = $this->getJson("api/products/$product->id");

        $response->assertStatus(Response::HTTP_OK);
    }

    /**
     * delete a product
     *
     * @return void
     */
    public function test_delete_product() : void
    {
        $user = User::factory(3)->create()->random();

        Sanctum::actingAs($user);

        State::factory(3)->create();
        City::factory(3)->create();
        Campaign::factory(3)->create();
        GroupCity::factory(3)->create();
        $product = Product::factory(1)->create()->first();

        $response = $this->deleteJson("api/products/$product->id");

        $response->assertStatus(Response::HTTP_OK);
    }
}
