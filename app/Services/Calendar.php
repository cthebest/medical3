<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class Calendar
{
    private Carbon $date;
    private User $user;

    /**
     * @param Carbon $date
     */
    public function setDate(Carbon $date): void
    {
        $this->date = $date;
    }


    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }


    public function buildCalendarDaysGridWithEvents(): array
    {
        $days = $this->buildGridDays();

        $events = $this->getEvents();

        return $this->buildGridDaysWithEvents($days, $events);
    }


    public function getMonthName()
    {
        return $this->date->monthName . ' ' . $this->date->year;
    }


    private function getStartAt(): Carbon
    {
        return $this->date->clone()->startOfMonth()->startOfWeek(Carbon::SUNDAY);
    }

    private function getEndAt(): Carbon
    {
        return $this->date->clone()->endOfMonth()->endOfWeek(Carbon::SATURDAY);
    }

    private function buildGridDays(): array
    {
        $days = array();

        $startAt = $this->getStartAt();
        $endAt = $this->getEndAt();

        while ($startAt <= $endAt) {
            $days[$startAt->toDateString()] = [
                'date' => $startAt->toDateString(),
                'day' => $startAt->day,
                'label' => $startAt->dayName,
                'isToday' => $startAt->isToday(),
                'isDayInMonth' => $startAt->isSameMonth($this->date),
            ];

            $startAt->addDay();
        }

        return $days;
    }

    private function getEvents(): Collection|array
    {
        $startAt = $this->getStartAt();
        $endAt = $this->getEndAt();
        return Appointment::with('patient')
            ->where('user_id', $this->user->id)
            ->whereDate('date', '>=', $startAt->toDateString())
            ->whereDate('date', '<=', $endAt->toDateString())
            ->orderBy('date', 'ASC')
            ->orderBy('start_time', 'ASC')
            ->get();
    }

    private function buildGridDaysWithEvents(array $days, Collection $events): array
    {
        $events = $events->groupBy('date');
        foreach ($events as $key => $event) {
            if (array_key_exists($key, $days))
                $days[$key] = array_merge($days[$key], ['events' => $event]);
        }
        return $days;
    }
}
