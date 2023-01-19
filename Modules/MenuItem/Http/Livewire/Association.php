<?php

namespace Modules\MenuItem\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Modules\MenuItem\Entities\Module;

class Association extends Component
{

    public $module_id;
    public $resource_id;

    public string|null $table;
    public $title = '';
    
    protected $listeners = ['resourceAdded' => 'resourceAdded'];

    public function mount()
    {
        $module = $this->getModule();
        $this->setTable($module);
        $resource = null;
        if ($this->resource_id)
            // Buscamos el recurso dependiendo del modulo para asignar el título
            $resource = DB::table($this->table)->where('id', $this->resource_id)->first();
        if ($resource)
            $this->title = $resource->title;
    }

    public function render()
    {
        $modules = Module::select('id', 'label')->get();
        return view('menuitem::livewire.association', compact('modules'));
    }

    public function loadResources()
    {
        $this->table = null;
        $module = $this->getModule();
        $this->setTable($module);
    }

    private function setTable($module)
    {
        if ($module) {
            $this->table = $this->getTable($module->params);
        }
        $this->emit('module_id_event', $this->module_id);
    }

    private function getModule()
    {
        return Module::where('id', $this->module_id)->first();
    }

    private function getTable($params)
    {
        return $params->table ?? null;
    }

    public function openResourceModal()
    {
        $this->emit('openModal', 'menuitem::resource',  ['table' => $this->table]);
    }

    public function resourceAdded($resource)
    {
        $this->title = $resource['title'];
        $this->emit('resource_id_event', $resource['id']);
        $this->emit('closeModal');
    }
}
