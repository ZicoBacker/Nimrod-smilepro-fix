<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Schedules') }}
        </h2>
    </x-slot>
    <div class="container">
        <h1>Schedules</h1>
        <a href="{{ route('schedules.create') }}" class="btn btn-primary">Create New Schedule</a>
        <ul>
            @foreach ($schedules as $schedule)
                <li>
                    <a href="{{ route('schedules.show', $schedule->id) }}">{{ $schedule->title }}</a>
                    <p><strong>Start Time:</strong> {{ $schedule->start_time }}</p>
                    <p><strong>End Time:</strong> {{ $schedule->end_time }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>