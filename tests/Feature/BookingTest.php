<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Festival;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_gebruiker_kan_festival_boeken_met_voldoende_punten()
    {
        // Arrange
        $user = User::factory()->create(['points' => 50]);
        $festival = Festival::factory()->create();
        $this->actingAs($user);

        // Voeg festival toe aan winkelmand (sessie)
        session(['cart' => [['id' => $festival->id]]]);

        // Act
        $response = $this->post(route('cart.checkout'));

        // Assert
        $response->assertRedirect(route('dashboard'));
        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'festival_id' => $festival->id,
        ]);

        $user->refresh();
        $this->assertEquals(42, $user->points); // 50 - 10 + 2
    }


    public function test_gebruiker_kan_geen_festival_boeken_met_onvoldoende_punten()
    {
        $user = User::factory()->create(['points' => 5]);
        $festival = Festival::factory()->create();

        $this->actingAs($user)
            ->post(route('cart.add', $festival->id));

        $response = $this->post(route('cart.checkout'));

        $response->assertRedirect(route('cart.index'));
        $response->assertSessionHas('error', 'Niet genoeg punten!');

        $this->assertDatabaseMissing('orders', [
            'user_id' => $user->id,
            'festival_id' => $festival->id,
        ]);
    }
}
