<?php

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $city = City::create([
            'name'=>"São Miguel do Oeste" ,
            'state'=>"SC"
        ]);

        User::create([
            'name' => "Nome do usuario",
            'email' => "teste@teste.com",
            'city_id' => $city->id,
            'password' => Hash::make("SenhaSegura"),
        ]);
    }
}
