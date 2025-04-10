<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cliente::create([
            'nome' => 'Cliente 1',
            'endereco' => 'Rua exemplo, 123',
            'telefone' => '11999888999',
            'cpf' => '12345678901',
            'email' => 'cliente@exemplo.com',
            'senha' => bcrypt('123456')
        ]);

        Cliente::create([
            'nome' => 'Cliente 2',
            'endereco' => 'Rua exemplo 2, 456',
            'telefone' => '11999777999',
            'cpf' => '12345678902',
            'email' => 'cliente2@exemplo.com',
            'senha' => bcrypt('123456')
        ]);

        Cliente::create([
            'nome' => 'Cliente 3',
            'endereco' => 'Rua exemplo 3, 789',
            'telefone' => '11999777888',
            'cpf' => '12345678903',
            'email' => 'cliente3@exemplo.com',
            'senha' => bcrypt('123456')
        ]);
    }
}
