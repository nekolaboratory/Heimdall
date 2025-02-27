<?php

namespace Tests\Feature;

use App\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemListTest extends TestCase
{
    use RefreshDatabase;

    protected function addItemWithTitleToDB($title)
    {
        Item::factory()
            ->create([
                'title' => $title
            ]);
    }

    public function test_displays_items_on_the_item_list_page()
    {
        $this->addItemWithTitleToDB('Item 1');
        $this->addItemWithTitleToDB('Item 2');
        $this->addItemWithTitleToDB('Item 3');

        $response = $this->get('/items');

        $response->assertStatus(200);
        $response->assertSee('Item 1');
        $response->assertSee('Item 2');
        $response->assertSee('Item 3');
    }
}
