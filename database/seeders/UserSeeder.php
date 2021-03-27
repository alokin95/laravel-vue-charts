<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin');
        $user->name = 'Nikola';

        $user->save();
    }
}
