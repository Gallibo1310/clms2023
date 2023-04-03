<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;


class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
        [
            [
                'email' => 'student@gmail.com',
                'password' => '$2y$10$vyTUooe/gsBlbwMlV0wh4OPA.DnRCNQBH7zE/xe7hyGUZot2lfiL2',
                'name' => 'student'
            ],
            [
                'email' =>'admin@gmail.com',
                'password' => '$2y$10$vyTUooe/gsBlbwMlV0wh4OPA.DnRCNQBH7zE/xe7hyGUZot2lfiL2',
                'name' => 'admin'
            ],
            [
                'email' =>'instructor@gmail.com',
                'password' => '$2y$10$vyTUooe/gsBlbwMlV0wh4OPA.DnRCNQBH7zE/xe7hyGUZot2lfiL2',
                'name' => 'instructor'
            ],
            [
                'email' => 'administrator@gmail.com',
                'password' => '$2y$10$vyTUooe/gsBlbwMlV0wh4OPA.DnRCNQBH7zE/xe7hyGUZot2lfiL2',
                'name' => 'System Administrator'
            ],
        ];

        foreach($users as $key=> $value)
        {
            $user = User::create($value);
            if($user->name == 'student')
            {
                $user->assignRole('Student');
            }
            else   if($user->name == 'admin')
            {
                $user->assignRole('Admin');
            }
            else   if($user->name == 'instructor')
            {
                $user->assignRole('Instructor');
            }
            else   if($user->name == 'System Administrator')
            {
                $user->assignRole('System Admin');
            }
        }
    }
}
