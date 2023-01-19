<?php

namespace Modules\Service\Http\Livewire;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Service\Entities\Service;
use Illuminate\Support\Str;
use Modules\Article\Entities\Article;

class ServiceForm extends Component
{
    use WithFileUploads;
    /**
     * The unique identifier for a specific resource within a module.
     * Can be a int or null if no value is assigned.
     *
     * @var int|null
     */
    public $resource_id;

    public Service $service;
    public $image;
    public $resource_title = '';
    protected $listeners = ['resourceAdded' => 'resourceAdded'];

    public function rules()
    {
        return [
            'service.title' => 'required|max:255|unique:services,title,' . $this->service->id,
            'service.image' => 'nullable',
            'service.alias' => 'nullable',
            'service.description' => 'nullable|max:120'
        ];
    }

    public function mount(Service $service)
    {
        $this->service = $service;
        $article = Article::find($service->association?->resource_id);
        $this->resource_title = $article?->title;
        $this->resource_id = $service->association?->resource_id;
    }

    public function render()
    {
        return view('service::livewire.service-form');
    }

    public function store()
    {
        $this->validate();

        $this->service->alias = Str::slug($this->service->title);
        $this->service->association = json_encode([
            'module_id' => 1,
            'resource_id' => $this->resource_id
        ]);
        $this->saveImage();
        $this->service->save();

        flash('Servicio registrado o actualizado correctamente')->success();

        return redirect()->route('services.edit', $this->service);
    }

    private function saveImage()
    {
        // Check if there is a new image in the object's "image" property
        if ($this->image) {
            // Delete any existing image associated with the object
            $this->deleteImage();
            $path = $this->image->storeAs('/public/service', $this->image->hashName());
            // Assign the newly saved image's path to the "image" property of a related "service" object
            $this->service->image = $path;
        }
    }


    private function deleteImage()
    {
        if ($this->service->image) {
            Storage::delete($this->service->image);
        }
    }

    public function openResourceModal()
    {
        $this->emit('openModal', 'menuitem::resource',  ['table' => 'articles']);
    }

    public function resourceAdded($resource)
    {
        $this->resource_id = $resource['id'];
        $this->resource_title = $resource['title'];
        $this->emit('closeModal');
    }
}
