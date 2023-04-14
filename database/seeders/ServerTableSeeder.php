<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServerTableSeeder extends Seeder
{
    protected $fillable= [
        'location_id'     => 1,
        'description'     => "nothing",
        'address'         => 'ln.itsaso.pw',
        'port'            => 82,
        'protocol'        => 'http',
        'user'            => 'lucid',
        'pass'            => '998830',
        'min_port'        => 2300,
        'max_port'        => 2400,
        'is_active'       => true
    ];

    public function run(): void
    {
        Server::query()->create($this->fillable);
    }
}
