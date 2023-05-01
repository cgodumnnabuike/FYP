<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Meter;
use InteractsWithViews;

class MeterTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testIndex()
    {
        $user = User::factory()->create();
        $meter1 = Meter::factory()->create(['user_id' => $user->id]);
        $meter2 = Meter::factory()->create(['user_id' => $user->id]);

        // Authenticate the user
        $this->actingAs($user);

        // Get request to the index method
        $response = $this->get(route('meters.index'));

        $response->assertStatus(200);
        $response->assertSee($meter1->name);
        $response->assertSee($meter2->name);

    }

    public function testCreate()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get(route('meters.create'));
        $response->assertStatus(200);
        $response->assertSeeText('Add Meter');
    }

    public function testStore()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $meterData = [
            'name' => 'Test Meter',
            'location' => 'Test Location',
        ];
        $response = $this->post(route('meters.store'), $meterData);
        $this->assertDatabaseHas('meters', $meterData);
        $response->assertRedirect(route('meters.index'));
    }
    
    public function testShow()
    {
        $user = User::factory()->create();
        $meter = Meter::factory()->create(['user_id' => $user->id]);

        $this->actingAs($user);

        $response = $this->get(route('meters.show', $meter->id));

        $response->assertStatus(200);

        $response->assertSee($meter->name);
        $response->assertSee($meter->location);
    }

    public function testUpdate()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
    
        $meter = Meter::factory()->create(['user_id' => $user->id]);
    
        $updatedData = [
            'name' => 'Updated Meter',
            'location' => 'Updated Location',
        ];
    
        $response = $this->put(route('meters.update', $meter->id), $updatedData);
    
        $this->assertDatabaseHas('meters', $updatedData);
    
        $response->assertRedirect(route('meters.index'));
    }
    
        public function testDelete()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $meter = Meter::factory()->create(['user_id' => $user->id]);

        $response = $this->delete(route('meters.destroy', $meter->id));

        $this->assertDatabaseMissing('meters', ['id' => $meter->id]);

        $response->assertRedirect(route('meters.index'));
    }

}
