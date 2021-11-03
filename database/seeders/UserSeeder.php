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
            'name'                    => 'Carmen',
            'lastname'                => 'Soto',
            'email'                   => 'cs@admin.com',
            'document_identification' => '0962597001',
            'password'                => Hash::make('123456'),
            'phone'                   => '+593963631319',
            'type'                    => 'admin'
        ]);

        User::factory(15)->create();
    }
}
