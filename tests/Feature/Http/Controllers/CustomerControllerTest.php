<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Testing\Fluent\AssertableJson;
use Database\Seeders\TestCustomerSeeder;
use App\Entities\Customer;
use Illuminate\Support\Str;
use LaravelDoctrine\ORM\Facades\EntityManager;

class CustomerControllerTest extends TestCase
{
    use WithFaker;

    /**
     * 
     *
     * @return void
     */
    public function testShouldReturnAllCustomers()
    {
        $entity = new Customer([
            'username'  => Str::random(10),
            'email'     => $this->faker->unique()->safeEmail(),
            'password'  => md5('password'),
            'firstname' => $this->faker->firstName(),
            'lastname'  => $this->faker->lastName(),
            'gender'    => 'male',
            'country'   => 'Australia',
            'city'      => 'Canberra',
            'phone'     => '00-1234-5678'
        ]);

        EntityManager::persist($entity);
        EntityManager::flush();

        $response = $this->getJson('/customers');

        $jsonStructure = ['*' => ['fullname', 'email', 'country']];

        $response->assertStatus(200)
            ->assertJsonStructure($jsonStructure, $response['data']);
    }

    public function testCustomerIsShownCorrectly()
    {
        $response = $this->getJson('/customers/1');
        $this->assertTrue(true);
    }

    public function testShouldReturnMessageIfNoCustomer()
    {
        $response = $this->getJson('/customers/0');

        $response->assertStatus(404)
            ->assertJson(function (AssertableJson $json) {
                $json->has('error');
            });

        $this->assertEquals(
            'Customer does not exist.',
            $response['error']
        );
    }
}
