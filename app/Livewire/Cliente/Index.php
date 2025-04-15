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

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    public function render()
    {
        $clientes = Cliente::where('nome', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orWhere('cpf', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.cliente.index', compact('clientes'));
    }

    public function salvar()
    {
        $cliente = Cliente::find($this->clienteId);

        if ($cliente) {
            $cliente->update([
                'nome' => $this->nome,
                'telefone' => $this->telefone,
                'endereco' => $this->endereco
            ]);
        }
        return redirect()->route('clientes.index')->with(['success' => 'Cliente Atualizado']);
    }

    public function Edit($clienteId)
    {
        $cliente = Cliente::find($clienteId);

        $cliente->clienteId = $this->clienteId;
        $cliente->nome = $this->nome;
        $cliente->telefone = $this->telefone;
        $cliente->endereco = $this->endereco;
    }

    public function delete($id)
    {
        Cliente::findOrFail($id)->delete();
        session()->flash('message', 'Cliente deletado com sucesso.');
    }
}
