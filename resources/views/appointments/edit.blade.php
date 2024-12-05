<x-layout>
    <div class="container mx-auto p-4">
        @if(session('success'))
            <div class="bg-green-100 border-t-4 border-green-600 rounded-b px-4 py-3 text-green-700" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border-t-4 border-red-600 rounded-b px-4 py-3 text-red-700" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold mb-4">Afspraak Bewerken</h1>

        <form action="{{ route('appointments.update', $appointment->id) }}" method="POST" class="w-full max-w-lg mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="patient_id" class="block text-gray-700 text-sm font-bold mb-2">Patiënt Naam:</label>
                <select name="patient_id" id="patient_id" class="w-full px-4 py-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    @foreach($patients as $id => $name)
                        <option value="{{ $id }}" {{ old('patient_id', $appointment->patient_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('patient_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="employee_id" class="block text-gray-700 text-sm font-bold mb-2">Medewerker Naam:</label>
                <select name="employee_id" id="employee_id" class="w-full px-4 py-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    @foreach($employees as $id => $name)
                        <option value="{{ $id }}" {{ old('employee_id', $appointment->employee_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
                @error('employee_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Datum:</label>
                <input type="date" name="date" id="date" class="w-full px-4 py-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('date', $appointment->date) }}">
                @error('date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="time" class="block text-gray-700 text-sm font-bold mb-2">Tijd:</label>
                <input type="time" name="time" id="time" class="w-full px-4 py-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('time', $appointment->time) }}">
                @error('time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <input type="text" name="status" id="status" class="w-full px-4 py-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ old('status', $appointment->status) }}">
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="is_active" class="block text-gray-700 text-sm font-bold mb-2">Actief:</label>
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $appointment->is_active) ? 'checked' : '' }} class="form-checkbox h-5 w-5 text-blue-600">
                    <span class="ml-2 text-gray-700">Ja</span>
                </label>
                @error('is_active')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">Opmerking:</label>
                <textarea name="comment" id="comment" rows="4" class="w-full px-4 py-2 border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">{{ old('comment', $appointment->comment) }}</textarea>
                @error('comment')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('appointments.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2">Annuleren</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Bewaren</button>
            </div>
        </form>
    </div>
</x-layout>