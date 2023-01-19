<?php

namespace Modules\Service\Http\Livewire;

use Livewire\Component;
use Modules\Service\Entities\Service;

class Table extends Component
{
    public function render()
    {
        $services = Service::paginate(12);
        return view('service::livewire.table', compact('services'));
    }

    public function deleteService($id)
    {
        abort_if_cannot('delete_services');
        Service::findOrFail($id)->delete();
        $this->dispatchBrowserEvent('close-modal');
    }
}
