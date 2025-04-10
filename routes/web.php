<?php

use App\Models\Cliente;
use Database\Seeders\ClienteSeeder;
use Illuminate\Support\Facades\Route;

Route::prefix('clientes')->group(function() {
   Route::get('/', \App\Livewire\Cliente\Index::class)->name('clientes.index'); 
   Route::get('/create', \App\Livewire\Cliente\Create::class)->name('clientes.create'); 
   Route::get('/{cliente}', \App\Livewire\Cliente\Show::class)->name('clientes.show'); 
   Route::get('/{cliente}/edit', \App\Livewire\Cliente\Edit::class)->name('clientes.edit'); 
});