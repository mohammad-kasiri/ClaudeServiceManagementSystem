<?php

namespace Database\Seeders;

use App\Models\Traffic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrafficTableSeeder extends Seeder
{
    private $data= [
        [
            'title'     => 'سی گیگ' ,
            'amount'     => 30,
            'is_active' => true ,
        ],
        [
            'title'     => 'شصت گیگ' ,
            'amount'     => 60,
            'is_active' => true ,
        ],
        [
            'title'     => 'نود گیگ' ,
            'amount'     => 90,
            'is_active' => true ,
        ],
        [
            'title'     => 'صد گیگ' ,
            'amount'     => 100,
            'is_active' => true ,
        ],

    ];

    public function run(): void
    {
        foreach ($this->data as $item){
            Traffic::query()->create($item);
        }
    }
}
