<?php

namespace Modules\Service\Http\Livewire;

use Livewire\Component;
use Modules\Service\Entities\Service;

class IndexService extends Component
{
    public function render()
    {
        $services = Service::all();
        return view('service::livewire.index-service', compact('services'));
    }
}
