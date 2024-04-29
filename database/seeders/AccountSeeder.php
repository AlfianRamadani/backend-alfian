<?php

namespace Database\Seeders;

use App\Models\AccountModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 10 ; $i++) { 
            # code...
            AccountModel::create([
                'id' => $faker->uuid,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($faker->password),
            ]);
        }
    }
}
