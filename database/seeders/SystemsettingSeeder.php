<?php

namespace Database\Seeders;
use App\Models\Systemsetting;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Systemsetting::create([
            'currentyear' => date('Y'),
            'currentsemester' => 1 ,
        ]);
    }
}
