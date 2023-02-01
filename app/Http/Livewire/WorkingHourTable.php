<?php

namespace App\Http\Livewire;

use App\Models\Day;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class WorkingHourTable extends Component
{

    public $user_id;

    public function render()
    {
        $workingHours = $this->getWorkingHours();
        return view('livewire.working-hour-table', compact('workingHours'));
    }
    public function create()
    {
        $this->emit('openModal', 'working-hour-form', ['user_id' => $this->user_id]);
    }

    private function getWorkingHours()
    {
        return Day::whereHas('users', function (Builder $query) {
            $query->where('user_id', $this->user_id);
        })->get();
    }
}
