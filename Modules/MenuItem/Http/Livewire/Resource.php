<?php

namespace Modules\MenuItem\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class Resource extends ModalComponent
{
    public $query;
    public $table;
    public $title;

    public function mount($table)
    {
        $this->table = $table;
    }
    public function render()
    {
        return view('menuitem::livewire.resource');
    }

    
}
