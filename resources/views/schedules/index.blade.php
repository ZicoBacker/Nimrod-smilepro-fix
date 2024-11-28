<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Beschikbaarheid Overzicht') }}
        </h2>
    </x-slot>

    <div class="container mx-auto mt-4">
        <div class="flex justify-between mb-4">
            <a href="{{ route('schedules.create') }}" class="btn btn-primary">Beschikbaarheid Toevoegen</a>
        </div>
        <ul class="list-disc pl-5">
            @foreach ($schedules as $schedule)
                <li class="mb-2">
                    <a href="{{ route('schedules.show', $schedule->id) }}" class="text-blue-500 hover:underline">{{ $schedule->name }}</a>
                    <p><strong>Start Time:</strong> {{ $schedule->start_time }}</p>
                    <p><strong>End Time:</strong> {{ $schedule->end_time }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
