<?php

namespace Modules\MenuItem\Http\Livewire;

use App\Http\Livewire\Menu;
use Livewire\Component;
use Modules\MenuItem\Entities\MenuItem;

class Table extends Component
{

    public function render()
    {
        $menuItems = MenuItem::orderBy('order', 'ASC')->paginate(12);
        return view('menuitem::livewire.table', compact('menuItems'));
    }


    public function deleteMenuItem($id)
    {
        abort_if_cannot('delete_menus');
        MenuItem::findOrFail($id)->delete();
        $this->dispatchBrowserEvent('close-modal');
    }
}
