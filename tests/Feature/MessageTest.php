<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Message;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MessageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithFaker;
  // use RefreshDatabase;
    public function test_add_message_to_database(): void
    {
        $data = [
            'name' => $this->faker->name,
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->regexify('^01[0-9]{9}$'),
            'message' => $this->faker->text(),
        ];

        $response = $this->post('/contact', $data);

        $response->assertStatus(302); // Check that the request was successful and redirected
        $this->assertDatabaseHas('messages', $data);
    }
    public function test_see_message_in_admin_page(){

        $this->get('/admin/messages')
            ->assertStatus(302);

    }




}
