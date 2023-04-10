<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Table extends Component
{
    public $table;
    public $systemKeys = ['id'];

    public function mount($dataTable)
    {
        $this->table = $dataTable;
    }

    public function render()
    {
        return view('livewire.table');
    }
}
