<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Gebruikersgegevens -->
                <div class="flex-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8 lg:mb-0">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-2xl font-bold mb-4">Mijn Gegevens</h3>
                        <h4 class="text-xl font-semibold">Naam</h4>
                        <p>{{ Auth::user()->name }}</p>
                        <h4 class="text-xl font-semibold mt-4">Email</h4>
                        <p>{{ Auth::user()->email }}</p>
                        <h4 class="text-xl font-semibold mt-4">Adres</h4>
                        <p>{{ Auth::user()->address }}</p>
                        <h4 class="text-xl font-semibold mt-4">Telefoon</h4>
                        <p>{{ Auth::user()->phone }}</p>
                    </div>
                </div>

                <!-- Berichten -->
                <div class="flex-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100" style="max-height: 500px; overflow-y: auto;">
                        <h3 class="text-2xl font-bold mb-4">Mijn Berichten</h3>
                        @if ($conversations->isEmpty())
                            <p class="text-gray-500">Je hebt nog geen berichten verstuurd.</p>
                        @else
                            <ul class="space-y-4">
                                @foreach ($conversations as $conversation)
                                    <li class="p-4 bg-gray-800 shadow rounded-lg mb-4">
                                        @foreach ($conversation->messages as $message)
                                            <div
                                                class="{{ $message->user_id == Auth::id() ? 'text-right' : 'text-left' }}">
                                                <span class="text-gray-300 break-words">{{ $message->content }}</span>
                                            </div>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('messages.store') }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex items-center space-x-4">
                                <input type="text" name="content" placeholder="Uw bericht" required
                                    class="flex-1 p-2 border border-gray-300 rounded">
                                <button type="submit"
                                    class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Verstuur</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
