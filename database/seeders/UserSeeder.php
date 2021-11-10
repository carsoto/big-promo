<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'                  => 'Administrador',
            'lastname'              => 'Big Cola',
            'phone'                 => '+593963631319',
            'aditional_phone'       => '+593963631319',
            'city_id'               => 1,
            'birthday'              => '2021-11-15',
            'email'                 => 'admin@bigpromo.ec',
            'email_verified_at'     => now(),
            'password'              => Hash::make('123456'),
            'is_admin'              => true
        ]);

        User::factory(15)->create();
    }
}
