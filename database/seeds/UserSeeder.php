<?php

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
        // Faz o cadastro no BD dos usuarios no sistema
        DB::table('users')->insert([
            'name' => 'Maicon Cerutti',
            'email' => 'cerutti.maicon@gmail.com',
            'password' => app('hash')->make('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Guilherme',
            'email' => 'guilherme@gmail.com',
            'password' => app('hash')->make('secret'),
        ]);

        factory(App\User::class, 10)->create();
    }
}
