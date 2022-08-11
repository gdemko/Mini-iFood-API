<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cadastro de Produtos

        DB::table('products')->insert([
            'name' => 'X-Bacon',
            'value' => 28,
            'description' => 'milho, ervilha, bacon, queijo, hamburguer',
        ]);

        DB::table('products')->insert([
            'name' => 'X-Picanha',
            'value' => 30,
            'description' => 'milho, ervilha, picanha, queijo, hamburguer',
        ]);

        DB::table('products')->insert([
            'name' => 'X-Costela',
            'value' => 35,
            'description' => 'milho, ervilha, costela, queijo, hamburguer',
        ]);

        DB::table('products')->insert([
            'name' => 'X-Coração',
            'value' => 27,
            'description' => 'milho, ervilha, coração, queijo, hamburguer',
        ]);

        DB::table('products')->insert([
            'name' => 'X-Calabresa',
            'value' => 25.7,
            'description' => 'milho, ervilha, calabresa, queijo, hamburguer',
        ]);

        DB::table('products')->insert([
            'name' => 'X-Egg',
            'value' => 15,
            'description' => 'milho, ervilha, ovo, queijo, hamburguer',
        ]);

        DB::table('products')->insert([
            'name' => 'X-Salada',
            'value' => 15,
            'description' => 'milho, ervilha, salada, queijo, hamburguer',
        ]);
    }
}
