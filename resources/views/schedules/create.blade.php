<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Create Schedule') }}
        </h2>
    </x-slot>

    @section('content')
        <div class="container">
            <h1>Beschikbaarheid Toevoegen</h1>
            <form action="{{ route('schedules.store') }}" method="POST">
                @csrf
                
                
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    @endsection
</x-app-layout>
