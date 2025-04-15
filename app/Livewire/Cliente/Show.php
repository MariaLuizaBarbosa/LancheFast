<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Show extends Component
{

    public $cliente;
    public $id;

    public function mount($id)
    {
        $this->cliente = Cliente::findOrFail($id);
    }

    public function show($id){
       $cliente = Cliente::all();
    }

}
