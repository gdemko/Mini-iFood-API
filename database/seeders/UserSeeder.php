<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Faz o cadastro no BD dos usuarios no sistema
        User::updateOrCreate(['id' => 1], [
            'name' => 'Maicon Cerutti',
            'email' => 'cerutti.maicon@gmail.com',
            'password' => app('hash')->make('secret'),
        ]);

        User::updateOrCreate(['id' => 2], [
            'name' => 'Guilherme',
            'email' => 'guilherme@gmail.com',
            'password' => app('hash')->make('secret'),
        ]);

        //criar factory para criar usuarios
        User::factory()->make()->save();
    }
}
