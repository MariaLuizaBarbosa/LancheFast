<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Edit extends Component
{

    public $nome;
    public $endereco;
    public $telefone;

    public function mount(){
        $cliente = Cliente::find(Auth::user()->cliente->id);
   
        $this->nome = $cliente->nome;
        $this->telefone = $cliente->telefone;
        $this->endereco = $cliente->endereco;
       }

       public function salvar()
       {
           $cliente = Cliente::find();
   
           $cliente->nome = $this->nome;
           $cliente->telefone = $this->telefone;
           $cliente->endereco = $this->endereco;
           $cliente->save();
           $cliente->user->save();
           session()->flash('succes', 'Cliente Atualizado');
   
       }

    public function render()
    {
        return view('livewire.cliente.edit');
    }
   
}
