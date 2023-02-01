<?php

namespace App\Http\Livewire;

use App\Models\Day;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class WorkingHourForm extends ModalComponent
{
    public $user_id;
    public $timePickerFrom;
    public $timePickerTo;

    public function render()
    {
        $availableDays = $this->getAvailableDays();
        return view('livewire.working-hour-form', compact('availableDays'));
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    private function getAvailableDays()
    {
        return Day::whereDoesntHave('users', function (Builder $query) {
            $query->where('user_id', $this->user_id);
        })->get();
    }
}
