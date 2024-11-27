<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Create Schedule') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="container">
            <h1>Create Schedule</h1>
            <form action="{{ route('schedules.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    @endsection
</x-app-layout>