<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tags extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['title' => 'АвтоЛенак']);
        Tag::create(['title' => 'АвтоЛюбитель']);
        Tag::create(['title' => 'ТачкаМечты']);
        Tag::create(['title' => 'АвтоПутешествия']);
        Tag::create(['title' => 'ТюнингАвто']);
        Tag::create(['title' => 'АвтоСовет']);
        Tag::create(['title' => 'ДрайвИэмоции']);
    }
}
