<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Berichten Overzicht</h1>

        @if ($messages->isEmpty())
            <p class="text-gray-500">Er zijn momenteel geen berichten te zien.</p>
        @else
            <ul class="space-y-4">
                @foreach ($messages as $message)
                    <li class="p-4 bg-white shadow rounded-lg flex justify-between items-center mb-4">
                        <span>{{ $message->content }}</span>
                        @if (!$message->is_read)
                            <form action="{{ route('messages.read', $message) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Markeer als
                                    gelezen</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('messages.store') }}" method="POST" class="mt-6">
            @csrf
            <div class="flex items-center space-x-4">
                <input type="text" name="content" placeholder="Nieuw bericht" required
                    class="flex-1 p-2 border border-gray-300 rounded">
                <button type="submit"
                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Toevoegen</button>
            </div>
        </form>
    </div>
</x-app-layout>
