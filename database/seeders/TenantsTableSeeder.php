<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      => 'Cleison',
            'email'     => 'admin@admin.com',
            'password'  => bcrypt('123456'),
        ]);
    }
}
