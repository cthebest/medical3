<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\MenuItem\Entities\MenuItem;

class Menu extends Component
{
    public function render()
    {
        $menuItems = MenuItem::orderBy('order', 'ASC')->get();
        return view('livewire.menu', compact('menuItems'));
    }
}
