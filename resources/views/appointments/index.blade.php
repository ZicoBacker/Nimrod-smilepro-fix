<x-layout>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Appointments</h1>

    <p><a href="{{ route('appointments.create') }}" class="btn btn-primary">Create New Appointment</a></p>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Patient Name</th>
                <th>Employee Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient->person->full_name }}</td>
                    <td>{{ $appointment->employee->person->full_name }}</td>
                    <td>{{ $appointment->date->format('Y-m-d') }}</td>
                    <td>{{ $appointment->time }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>{{ $appointment->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $appointments->links() }}
</x-layout>