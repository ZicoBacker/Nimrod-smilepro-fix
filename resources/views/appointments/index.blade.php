<x-layout>
    <div class="container mx-auto p-4">
        @if(session('success'))
            <div class="bg-green-100 border-t-4 border-green-600 rounded-b px-4 py-3 text-green-700" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-4">Appointments</h1>

        <p class="mb-4">
            <a href="{{ route('appointments.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New Appointment</a>
        </p>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-gray-600 font-bold">
                    <th class="p-2">ID</th>
                    <th class="p-2">Patient Name</th>
                    <th class="p-2">Employee Name</th>
                    <th class="p-2">Date</th>
                    <th class="p-2">Time</th>
                    <th class="p-2">Status</th>
                    <th class="p-2">Active</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                    <tr class="@if($loop->even) bg-gray-50 @endif">
                        <td class="p-2">{{ $appointment->id }}</td>
                        <td class="p-2">{{ $appointment->patient->person->full_name }}</td>
                        <td class="p-2">{{ $appointment->employee->person->full_name }}</td>
                        <td class="p-2">{{ $appointment->date->format('Y-m-d') }}</td>
                        <td class="p-2">{{ $appointment->time }}</td>
                        <td class="p-2">{{ $appointment->status }}</td>
                        <td class="p-2">{{ $appointment->is_active ? 'Yes' : 'No' }}</td>
                        <td class="p-2">
                            <a href="{{ route('appointments.show', $appointment->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Show</a>
                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="bg-yellow-600 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
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