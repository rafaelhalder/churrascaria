<?php

use Illuminate\Database\Seeder;
use App\Entities\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'cpf' => "12345678901",
            'name' => 'rafa',
            'phone' => '123456123',
            'email' => 'rafa@rafa.com',
            'password' => bcrypt('senha'),
        ]);

        // $this->call(UserSeeder::class);
    }
}
