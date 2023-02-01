<div class="p-2">
    <h2 class="text-black">Crear horario laboral</h2>
    <div class="flex space-x-2">
        @foreach($availableDays as $availableDay)
            <div>
                {{ Form::label($availableDay->name, null, ['class' => 'block text-xs']) }}
                {!! Form::checkbox('day', $availableDay->id) !!}
            </div>
        @endforeach
    </div>
    <div class="flex space-x-2">
        <x-form.time label="De" :options="['time_24hr'=>false]" wire:model="timePickerFrom"></x-form.time>
        <x-form.time label="A" :options="['time_24hr'=>false]" wire:model="timePickerTo"></x-form.time>
    </div>
    <div>
        <h4 class="text-black">Hora de descanso</h4>
        <div class="flex space-x-2">
            <x-form.time label="De" :options="['time_24hr'=>false]" wire:model="timePickerFrom"></x-form.time>
            <x-form.time label="A" :options="['time_24hr'=>false]" wire:model="timePickerTo"></x-form.time>
        </div>
    </div>
</div>
