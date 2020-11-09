<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class HostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Host::factory()->count(1)->create();
    }
}