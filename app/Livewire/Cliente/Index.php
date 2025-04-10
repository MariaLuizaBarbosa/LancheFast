<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $nome;
    public $endereco;
    public $telefone;

    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString =[
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    protected $listeners = [
        'abrirModalEdicao',
        'cadastroAtualizada' => 'render'
    ];

    public function render()
    {
        $clientes = Cliente::where('nome', 'like', "%{$this->search}%")
        ->orWhere('email', 'like', "%{$this->search}%")
        ->orWhere('cpf', 'like', "%{$this->search}%")
        ->paginate($this->perPage);

        return view('livewire.cliente.index', compact('clientes'));
    }

    public function abrirModalVisualizar ($clienteId){
        $cliente = Cliente::find($clienteId);

        if($cliente){
            $this->nome = $cliente->nome;
            $this->endereco = $cliente->endereco;
            $this->telefone = $cliente->telefone;
        }
    }

    public function delete($id){
        Cliente::findOrFail($id)->delete();
        session()->flash('message', 'Cliente deletado com sucesso.');
    }
    
}
