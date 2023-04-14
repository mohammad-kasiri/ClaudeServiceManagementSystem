<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Period;
use App\Models\Traffic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodTableSeeder extends Seeder
{
    private $data= [
        [
            'title'     => 'یک ماهه' ,
            'total_days'     => 30,
            'is_active' => true ,
        ],
        [
            'title'     => 'دو ماهه' ,
            'total_days'     => 60,
            'is_active' => true ,
        ],
        [
            'title'     => 'سه ماهه' ,
            'total_days'     => 90,
            'is_active' => true ,
        ],
        [
            'title'     => 'شش ماهه' ,
            'total_days'     => 180,
            'is_active' => true ,
        ],
    ];

    public function run(): void
    {
        foreach ($this->data as $item){
            Period::query()->create($item);
        }
    }
}
