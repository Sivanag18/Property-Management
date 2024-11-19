<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use function Symfony\Component\Translation\t;

class PropertyTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use WithFaker;
   // use RefreshDatabase;
    public function test_logged_user_can_see_propertyPage(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user)
           ->get('/property')
           ->assertStatus(200);
    }

    public function testStore()
    {
        Storage::fake('public'); // Mock the public disk for file uploads
        $user = User::factory()->create();

        Auth::login($user); // Log the user in

        $data = [
            'user_id'=>Auth::user()->id,
            'user_name'=>Auth::user()->name,
            'property_name' => 'SAKANY Property',
            'address' => '123 Main St',
            'price' => 100000,
            'type' => 'House',
            'offer' => 'Sale',
            'status' => 'Available',
            'furnished' => 'Fully Furnished',
            'bhk' => 3,
            'deposite' => 50000,
            'bedroom' => 3,
            'bathroom' => 2,
            'balcony' => 1,
            'carpet' => 1000,
            'age' => 5,
            'total_floors' => 10,
            'room_floor' => 5,
            'loan' => 'Yes',
            'lift' => 'Yes',
            'security_guard' => 'Yes',
            'play_ground' => 'Yes',
            'description'=>'lpdddd'

        ];

        $image = UploadedFile::fake()->image('property.jpg'); // Create a fake image for testing

        $response = $this->post('/property/store', array_merge($data, ['image_01' => $image])); // Make a POST request to the store method

        $response->assertRedirect('/'); // Assert that the response redirects to the properties index page

        $property = Property::latest()->first(); // Get the first property from the database

Storage::disk('public')->assertExists($property->image); // Assert that the property image was stored in the public disk

        $this->assertEquals($user->id, $property->user_id); // Assert that the property was created by the logged in user

        $this->assertEquals($data['property_name'], $property->property_name); // Assert that the property name was stored correctly
        $this->assertEquals($data['address'], $property->address); // Assert that the property address was stored correctly
        $this->assertEquals($data['price'], $property->price); // Assert that the property price was stored correctly
        $this->assertEquals($data['type'], $property->type); // Assert that the property type was stored correctly
        $this->assertEquals($data['offer'], $property->offer); // Assert that the property offer was stored correctly
        $this->assertEquals($data['status'], $property->status); // Assert that the property status was stored correctly
        $this->assertEquals($data['furnished'], $property->furnished); // Assert that the property furnished status was stored correctly
        $this->assertEquals($data['bhk'], $property->bnk); // Assert that the property BHK count was stored correctly
        $this->assertEquals($data['deposite'], $property->deposite); // Assert that the property deposit amount was stored correctly
        $this->assertEquals($data['bedroom'], $property->bedroom); // Assert that the property bedroom count was stored correctly
        $this->assertEquals($data['bathroom'], $property->bathroom); // Assert that the property bathroom count was stored correctly
        $this->assertEquals($data['balcony'], $property->balcony); // Assert that the property balcony count was stored correctly
        $this->assertEquals($data['carpet'], $property->carpet); // Assert that the property carpet area was stored correctly
        $this->assertEquals($data['age'], $property->age); // Assert that the property age was stored correctly
        $this->assertEquals($data['total_floors'], $property->total_floors); // Assert that the property total floors was stored correctly
        $this->assertEquals($data['room_floor'], $property->room_floor); // Assert that the property room floor was stored correctly
        $this->assertEquals($data['loan'], $property->loan); // Assert that the property loan availability was stored correctly
        $this->assertEquals($data['lift'], $property->lift); // Assert that the property lift availability was stored correctly
        $this->assertEquals($data['security_guard'], $property->security_guard); // Assert that the property security guard availability was stored correctly
        $this->assertEquals($data['play_ground'], $property->play_guard); // Assert that the property playground availability was stored correctly
    }
}
