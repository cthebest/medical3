<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\User;
use App\Services\Calendar;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CalendarLivewire extends Component
{

    public Collection $specialists;
    public array $days;
    // user uuid
    public string $specialist_id;
    public Carbon $date;
    public User $user;
    public string $monthName;
    public array $weekdays = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];

    /**
     *  Initialize and set variables
     * @return void
     */
    public function mount(): void
    {
        // Authenticate user
        $this->user = Auth::user();
        // The current date is obtained when the component is started.
        $this->date = $this->getCurrentDate();
        $this->getSpecialists();
        // Calendario inicial
    }

    public function render(): Factory|View|Application
    {
        $this->days = $this->getDays();

        return view('livewire.calendar-livewire');
    }

    public function updatedSpecialistId($value)
    {
        if ($value) {
            $this->changeUser();
        } else {
            $this->days = [];
        }
    }

    private function getCurrentDate(): Carbon
    {
        return Carbon::now();
    }

    private function getDays(): array
    {
        $calendar = new Calendar();
        if ($this->user->hasRole('specialist')) {
            $calendar->setUser($this->user);
            $calendar->setDate($this->date);
            $this->monthName = $calendar->getMonthName();
            return $calendar->buildCalendarDaysGridWithEvents();
        }
        return [];
    }

    private function getSpecialists()
    {
        if (!$this->user->hasRole('specialist')) {
            $this->specialists = User::whereHas('roles', function ($query) {
                $query->where('name', 'specialist');
            })->get();
        }
    }

    public function changeUser()
    {
        $this->user = User::findOrFail($this->specialist_id);
    }

    public function prevMonth()
    {
        $this->date = $this->date->subMonthNoOverflow();
    }

    public function nextMonth()
    {
        $this->date = $this->date->addMonthNoOverflow();
    }
}
