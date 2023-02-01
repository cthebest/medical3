<div>
    <div class="flex justify-between">
        @if($specialists && $specialists->count() > 0)
            {!! Form::select('specialists', $specialists->pluck('name','id'), null,
                            ['placeholder'=>'--Seleccione un especialista--', 'wire:model'=>'specialist_id',
                            'class'=> 'border border-gray-300 dark:bg-gray-500
                            dark:text-gray-200 p-1  rounded'])!!}
        @endif
        @if($specialist_id)
            <div>
                {!! link_to(route('working-hours.create', ['specialist'=>$specialist_id]),'Nueva cita',
                             ['class'=>'border p-2 dark:text-gray-200 dark:bg-gray-500 rounded hover:bg-gray-200']) !!}

                {!! link_to(route('working-hours.index', ['specialist'=>$specialist_id]),'Horario laboral',
                             ['class'=>'border p-2 dark:text-gray-200 dark:bg-gray-500 rounded hover:bg-gray-200']) !!}

                {!! link_to(route('working-hours.edit', ['specialist'=>$specialist_id]),'Duración de la cita',
                                             ['class'=>'border p-2 dark:text-gray-200 dark:bg-gray-500 rounded hover:bg-gray-200']) !!}
            </div>
        @endif
    </div>
    <div class="mt-2">
        <button class="p-2 dark:text-gray-200 dark:bg-gray-500 rounded hover:bg-gray-200" wire:click="prevMonth">
            <i class="fa-solid fa-caret-left"></i>
        </button>
        <span>{{$monthName}}</span>
        <button class="p-2 dark:text-gray-200 dark:bg-gray-500 rounded hover:bg-gray-200" wire:click="nextMonth">
            <i class="fa-solid fa-caret-right"></i>
        </button>

    </div>

    @if(count($days) >0)
        <div class="grid grid-cols-7 gap-[1px] bg-gray-200 border">
            @foreach($weekdays as $weekday)
                <div class="font-bold text-center p-2 bg-white">
                    {{$weekday}}
                </div>
            @endforeach

            @foreach($days as $day)
                <div
                    class="bg-white  h-32 {{$day['isToday']?'text-red-700':''}} {{!$day['isDayInMonth']?'text-gray-400':''}}">
                    <span class="text-sm">{{$day['day']}}</span>
                    <!--Events-->
                    @if(array_key_exists('events', $day) && count($day['events'])>0)
                        <div class="p-1">
                            <ul class="text-xs rounded-md font-medium">
                                @foreach($day['events']->take(3) as $event)
                                    <li>
                                        <span>{{$event->start_time}}</span>
                                        <span>{{$event->end_time}}</span>
                                        <span>{{$event->patient->name}}</span>
                                    </li>
                                @endforeach
                            </ul>
                            @if(($day['events']->count()-3)>0)
                                <div>
                                    <span
                                        class="text-xs text-blue-700 block text-right">
                                        + {{$day['events']->count()-3}}
                                    </span>
                                    <span class="text-xs text-orange-500">Ver todo</span>
                                </div>
                            @endif
                        </div>
                    @endif


                </div>
            @endforeach
        </div>
    @endif
</div>
