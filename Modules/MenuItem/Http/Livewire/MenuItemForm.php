<?php

namespace Modules\MenuItem\Http\Livewire;

use Livewire\Component;
use Modules\MenuItem\Entities\MenuItem;
use Illuminate\Support\Str;

class MenuItemForm extends Component
{

    // ---------------------------------------------------------------
    // Variables for model binding in association livewire component

    /**
     * The unique identifier for a specific module.
     * Can be a int or null if no value is assigned.
     *
     * @var int|null
     */
    public $module_id;

    /**
     * The unique identifier for a specific resource within a module.
     * Can be a int or null if no value is assigned.
     *
     * @var int|null
     */
    public $resource_id;
    // ---------------------------------------------------------------

    public MenuItem $menuItem;

    public $menuItemOrders = [];

    protected $listeners = ['module_id_event' => 'module_id_event', 'resource_id_event' => 'resource_id_event'];

    public int $currentOrder;
    function rules()
    {
        return [
            'menuItem.title' => 'required|max:255|unique:menu_items,title,' . $this->menuItem->id,
            'menuItem.icon' => 'nullable',
            'menuItem.order' => 'nullable|exists:menu_items,order',
        ];
    }


    public function mount(MenuItem $menuItem)
    {
        $this->menuItem = $menuItem;
        $this->module_id = $menuItem->association?->module_id;
        $this->resource_id = $menuItem->association?->resource_id;
        $this->currentOrder = $menuItem->order ?? -1;
    }

    public function loadOrder()
    {
        $menuItemFounded = MenuItem::where('order', $this->menuItem->order)->first();
        $menuItemFounded->order = $this->currentOrder;
        $this->updateOrderFounded($menuItemFounded);
    }

    public function updateOrderFounded(MenuItem $menuItem)
    {
        $menuItem->save();
        $this->menuItem->update();
    }

    public function getOrders()
    {
        if ($this->menuItem->id) {
            $this->menuItemOrders = MenuItem::select('order')->orderBy('order', 'ASC')->get();
        }
    }

    public function render()
    {
        $this->getOrders();
        return view('menuitem::livewire.menu-item-form');
    }

    public function store()
    {
        $this->validate();
        $attributes = $this->getAttributes();

        $this->menuItem->alias = $attributes['alias'];
        $this->menuItem->order = $attributes['order'];
        $this->menuItem->path = $attributes['path'];
        $this->menuItem->association = $attributes['association'];

        $this->menuItem->save();
        flash('Ítem de menú listo')->success();
        return redirect()->route('menuitems.edit', $this->menuItem);
    }

    private function getAttributes()
    {
        $particles = [];
        // If a resource is specified, retrieve it and add its alias to the particles array
        if ($this->module_id) {
            $particles[] = Str::slug($this->menuItem->title);
        }

        // Concatenate the particles into a path string
        $path = implode('/', $particles);

        return [
            'alias' => Str::slug($this->menuItem->title),
            'order' => $this->menuItem->order ?? MenuItem::count() + 1,
            'path' => $path,
            'association' => json_encode([
                'module_id' => $this->module_id,
                'resource_id' => $this->resource_id
            ])
        ];
    }

    /**
     * Listeners methods
     */
    public function module_id_event($module_id)
    {
        $this->module_id = $module_id;
    }

    public function resource_id_event($resource_id)
    {
        $this->resource_id = $resource_id;
    }
}
