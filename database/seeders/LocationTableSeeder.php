<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationTableSeeder extends Seeder
{
    private $data= [
        [
            'title'     => 'آمریکا' ,
            'image'     => '/images/static/countries/usa.png' ,
            'emoji'     => '🇺🇸' ,
            'is_active' => true ,
        ],
        [
            'title'     => 'هلند' ,
            'image'     => '/images/static/countries/netherlands.png' ,
            'emoji'     => '🇳🇱' ,
            'is_active' => true ,
        ],
        [
            'title'     => 'فنلاند' ,
            'image'     => '/images/static/countries/finland.png' ,
            'emoji'     => '🇫🇮' ,
            'is_active' => true ,
        ],
        [
            'title'     => 'آلمان' ,
            'image'     => '/images/static/countries/germany.png' ,
            'emoji'     => '🇩🇪' ,
            'is_active' => true ,
        ],
        [
            'title'     => 'کانادا' ,
            'image'     => '/images/static/countries/canada.png' ,
            'emoji'     => '🇨🇦' ,
            'is_active' => true ,
        ],
        [
            'title'     => 'انگلیس' ,
            'image'     => '/images/static/countries/uk.png' ,
            'emoji'     => 'uk' ,
            'is_active' => true ,
        ],
    ];
    public function run(): void
    {
        foreach ($this->data as $item){
            Location::query()->create($item);
        }
    }
}
