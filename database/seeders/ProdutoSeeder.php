<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Produto::create([
            'nome' => 'Hambúrguer Classico',
            'ingredientes' => 'Pão, hambúrguer, queijo, alface e tomate',
            'valor' => '15.90',
        ]);

        Produto::create([
            'nome' => 'Batata Frita',
            'ingredientes' => 'Batata e sal',
            'valor' => '8.50',
        ]);
        
        Produto::factory()->count(15)->create();
    }
}
