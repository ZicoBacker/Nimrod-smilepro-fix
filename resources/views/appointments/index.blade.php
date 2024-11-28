<x-layout>
    <div class="container mx-auto p-4">
        @if(session('success'))
            <div class="bg-green-100 border-t-4 border-green-600 rounded-b px-4 py-3 text-green-700" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-4">Afspraken</h1>

        <p class="mb-4">
            <a href="{{ route('appointments.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Nieuwe afspraak maken</a>
        </p>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 font-bold">
                    <th class="p-2">Patiënt Naam</th>
                    <th class="p-2">Medewerker Naam</th>
                    <th class="p-2">Datum</th>
                    <th class="p-2">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr class="@if($loop->even) bg-gray-50 @endif">
                        <td class="p-2">{{ $appointment->patient->person->full_name }}</td>
                        <td class="p-2">{{ $appointment->employee->person->full_name }}</td>
                        <td class="p-2">{{ $appointment->date }}</td>
                        <td class="p-2">
                            <a href="{{ route('appointments.show', $appointment->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bekijken</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $appointments->links() }}
        </div>
    </div>
</x-layout>