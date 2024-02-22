<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event = new \App\Models\Event([
            'name' => 'Event #1',
            'description' => 'Description 1'
        ]);
        $event->save(); 

        $event = new \App\Models\Event([
            'name' => 'Event #2',
            'description' => 'Description 2'
        ]);
        $event->save(); 

        $event = new \App\Models\Event([
            'name' => 'Event #3',
            'description' => 'Description 3'
        ]);
        $event->save(); 
    }
}
