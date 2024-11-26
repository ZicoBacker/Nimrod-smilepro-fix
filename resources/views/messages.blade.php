<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Berichten Overzicht</h1>

        @if ($messages->isEmpty())
            <p class="text-gray-500">Er zijn momenteel geen berichten te zien.</p>
        @else
            <ul class="space-y-4">
                @foreach ($messages as $message)
                    @if ($message->parent_id === null)
                        <li class="p-4 bg-gray-800 shadow rounded-lg mb-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-xl font-bold text-gray-300">
                                        {{ $message->user->name ?? 'Onbekende gebruiker' }}</h3>
                                    <small class="text-gray-500">Verzonden op:
                                        {{ $message->created_at->format('d-m-Y H:i') }}</small>
                                </div>
                                @if (!$message->is_read)
                                    <form action="{{ route('messages.read', $message) }}" method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Markeer
                                            als gelezen</button>
                                    </form>
                                @endif
                            </div>
                            <div class="p-4 bg-gray-300 shadow rounded-lg mb-4 mr-8">
                                <span class="text-gray-800">{{ $message->content }}</span>
                            </div>
                            @if ($message->replies->isNotEmpty())
                                <ul class="mt-4 space-y-2">
                                    @foreach ($message->replies as $reply)
                                        <li class="ml-8 p-2 bg-gray-700 rounded">
                                            <span class="text-gray-300">{{ $reply->content }}</span>
                                            <br>
                                            <small class="text-gray-500">Verzonden op:
                                                {{ $reply->created_at->format('d-m-Y H:i') }}</small>
                                            <form action="{{ route('messages.reply', $reply) }}" method="POST"
                                                class="mt-2">
                                                @csrf
                                                <div class="flex items-center space-x-4">
                                                    <input type="text" name="content" placeholder="Uw antwoord"
                                                        required class="flex-1 p-2 border border-gray-300 rounded">
                                                    <button type="submit"
                                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Antwoord</button>
                                                </div>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                            <form action="{{ route('messages.reply', $message) }}" method="POST" class="mt-4">
                                @csrf
                                <div class="flex items-center space-x-4">
                                    <input type="text" name="content" placeholder="Uw antwoord" required
                                        class="flex-1 p-2 border border-gray-300 rounded">
                                    <button type="submit"
                                        class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Antwoord</button>
                                </div>
                            </form>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
