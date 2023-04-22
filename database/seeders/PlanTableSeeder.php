<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Period;
use App\Models\Plan;
use App\Models\Traffic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanTableSeeder extends Seeder
{
    public function run(): void
    {
        $locations= Location::all();
        $traffics=Traffic::all();
        $periods= Period::all();

        foreach ($locations as $location){
            foreach ($periods as $period){
                foreach ($traffics as $traffic){
                    Plan::query()->create([
                        'location_id' =>$location->id,
                        'period_id'   => $period->id,
                        'traffic_id'  => $traffic->id,
                        'rrp_price'   => 200000,
                        'price'       => 100,
                    ]);
                }
            }
        }
    }
}
