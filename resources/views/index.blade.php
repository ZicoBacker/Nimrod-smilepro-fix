<x-layout>
    <div class="text-center">
        <h2 class="text-3xl font-semibold mb-4">Welkom bij SmilePro</h2>
        <p class="text-lg">Bij SmilePro bieden wij professionele en vriendelijke tandheelkundige zorg voor het hele
            gezin. Uw glimlach is onze prioriteit!</p>
    </div>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Stuur een bericht</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('messages.store') }}" method="POST">
            @csrf
            <div class="flex items-center space-x-4">
                <input type="text" name="content" placeholder="Uw bericht" required
                    class="flex-1 p-2 border border-gray-300 rounded">
                <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Verstuur</button>
            </div>
        </form>
    </div>
</x-layout>
