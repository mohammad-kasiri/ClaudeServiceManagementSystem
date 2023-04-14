<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::factory()->superAdmin()->create();
        User::factory()->count(10)->customer()->create();
        $this->call(LocationTableSeeder::class);
        $this->call(PeriodTableSeeder::class);
        $this->call(TrafficTableSeeder::class);
        $this->call(PlanTableSeeder::class);
        $this->call(ServerTableSeeder::class);
    }
}
