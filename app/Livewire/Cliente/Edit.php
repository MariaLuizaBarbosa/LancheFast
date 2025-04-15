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
    public $clienteId;

    public function mount($cliente)
    {
        $cliente = Cliente::find($cliente);
        
        $this->clienteId = $cliente->id; 
        $this->nome = $cliente->nome;
        $this->telefone = $cliente->telefone;
        $this->endereco = $cliente->endereco;

    }
    
    public function salvar()
    {
        $cliente = Cliente::find($this->clienteId);
       
        if ($cliente) {
            $cliente->nome = $this->nome;
            $cliente->telefone = $this->telefone;
            $cliente->endereco = $this->endereco;
            $cliente->update();
        }   

        return redirect()->route('clientes.index')->with(['success' => 'Cliente Atualizado']);
    }

    public function render()
    {
        return view('livewire.cliente.edit');
    }

}