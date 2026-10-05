<?php

namespace Tests\Feature;

use App\Models\Career;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class CareerPageTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_only_active_careers_are_displayed_in_sort_order(): void
    {
        Career::factory()->create([
            'title' => 'Store Assistant',
            'sort_order' => 2,
        ]);
        Career::factory()->create([
            'title' => 'Baker Artisan',
            'sort_order' => 1,
        ]);
        Career::factory()->inactive()->create([
            'title' => 'Closed Position',
        ]);

        $this->get(route('career'))
            ->assertOk()
            ->assertSeeInOrder(['Baker Artisan', 'Store Assistant'])
            ->assertDontSee('Closed Position');
    }
}
