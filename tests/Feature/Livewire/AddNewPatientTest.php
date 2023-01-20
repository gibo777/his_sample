<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\AddNewPatient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AddNewPatientTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(AddNewPatient::class);

        $component->assertStatus(200);
    }
}
