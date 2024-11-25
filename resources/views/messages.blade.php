<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Berichten Overzicht</h1>

        @if ($messages->isEmpty())
            <p class="text-gray-500">Er zijn momenteel geen berichten te zien.</p>
        @else
            <ul class="space-y-4">
                @foreach ($messages as $message)
                    <li class="p-4 bg-gray-800 shadow rounded-lg flex justify-between items-center mb-4">
                        <span class="text-gray-300">{{ $message->content }}</span>
                        @if (!$message->is_read)
                            <form action="{{ route('messages.read', $message) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button type="submit"
                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Markeer als
                                    gelezen</button>
                            </form>
                        @endif
                    </li>
                @endforeach
                <div class="bg-green-500 text-white p-4">
                    Dit is een test om te zien of Tailwind CSS werkt voor groen.
                </div>
                <div class="bg-yellow-500 text-white p-4">
                    Dit is een test om te zien of Tailwind CSS werkt voor geel.
                </div>
                <div class="bg-red-500 text-white p-4">
                    Dit is een test om te zien of Tailwind CSS werkt voor rood.
                </div>
            </ul>
        @endif
    </div>
</x-app-layout>
