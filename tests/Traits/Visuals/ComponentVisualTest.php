<?php

namespace Rappasoft\LaravelLivewireTables\Tests\Traits\Visuals;

use Livewire\Livewire;
use Rappasoft\LaravelLivewireTables\Tests\Http\Livewire\PetsTable;
use Rappasoft\LaravelLivewireTables\Tests\TestCase;

class ComponentVisualTest extends TestCase
{

    /** @test */
    public function empty_message_does_not_show_with_results(): void
    {
        Livewire::test(PetsTable::class)
            ->assertDontSee('No items found. Try to broaden your search.');
    }

    /** @test */
    public function empty_message_shows_with_no_results(): void
    {
        // TODO: After search is done
//        Livewire::test(PetsTable::class)
//            ->call('search', 'sdfsdfsdf')
//            ->assertSeeSee('No items found. Try to broaden your search.');
    }

    /** @test */
    public function debugging_shows_when_enabled(): void
    {
        Livewire::test(PetsTable::class)
            ->assertDontSee('Debugging Values')
            ->call('setDebugEnabled')
            ->assertSee('Debugging Values');
    }

    /** @test */
    public function offline_message_is_available_when_needed(): void
    {
        Livewire::test(PetsTable::class)
            ->assertSeeHtml('<div wire:offline.class.remove="hidden" class="hidden">');
    }
}
