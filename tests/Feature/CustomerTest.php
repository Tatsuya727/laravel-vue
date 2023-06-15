<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A test example for search customers.
     */
    public function test_search_customers()
    {
        // Arrange: Prepare data for the test
        $user = User::factory()->create();
        $customer1 = Customer::factory()->create([
            'kana' => 'Yamada',
            'tel' => '0123456789'
        ]);
        $customer2 = Customer::factory()->create([
            'kana' => 'Suzuki',
            'tel' => '9876543210'
        ]);

        // Act: Execute the test code
        $response = $this->actingAs($user)->get('/customers?page=21');

        $response->dump();

        // Assert: Verify the test result
        $response->assertStatus(200);
    }

    /**
     * A test example for store customer.
     */
    public function test_store_customer()
    {
        // Arrange: Prepare data for the test
        $user = User::factory()->create();
        $customerData = [
            'name' => 'John Doe',
            'kana' => 'ジョン',
            'tel' => '0123456789',
            'email' => 'john@example.com',
            'postcode' => '1234567',
            'address' => 'Tokyo',
            'birthday' => '1990-01-01',
            'gender' => 1,
            'memo' => 'test memo',
        ];

        // Act: Execute the test code
        $response = $this->actingAs($user)->post('/customers', $customerData);

        // Assert: Verify the test result
        $response->assertRedirect('/customers');
        $this->assertDatabaseHas('customers', $customerData);
    }
}
