<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Beschikbaarheid') }}
        </h2>
    </x-slot>

    <div class="container">
        <a href="{{ route('schedules.index') }}" class="btn btn-primary">Beschikbaarheid Overzicht</a>
        <a href="{{ route('schedules.create') }}" class="btn btn-primary">Beschikbaarheid Toevoegen</a>
        <ul>
            @foreach ($schedules as $schedule)
                <li>
                    <a href="{{ route('schedules.show', $schedule->id) }}">{{ $schedule->name }}</a>
                    <p><strong>Start Time:</strong> {{ $schedule->start_time }}</p>
                    <p><strong>End Time:</strong> {{ $schedule->end_time }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
