<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schoolyear;

class SchoolYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schoolyears = [
            [
                'year' => strval(date('Y') -4)
            ],
            [
                'year' =>strval(date('Y') -3)
            ],
            [
                'year' => strval(date('Y') -2)
            ],
            [
                'year' => strval(date('Y') -1)
            ],
            [
                'year' => strval(date('Y'))
            ],
        ];

        foreach($schoolyears as $key=> $value)
        {
            $user = Schoolyear::create($value);
        }
    }
}
