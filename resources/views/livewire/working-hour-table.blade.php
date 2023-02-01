<div>
    {!! Form::button('Nuevo horario laboral', [
    'class'=>'border p-2 dark:text-gray-200 dark:bg-gray-500 rounded hover:bg-gray-200',
    'wire:click'=>'create']) !!}
    @foreach($workingHours as $workingHour)
        <div class="bg-white rounded-md">{{$workingHour->name}}</div>
    @endforeach
</div>
