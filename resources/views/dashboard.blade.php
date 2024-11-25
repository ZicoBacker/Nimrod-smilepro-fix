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
                        <p>{{ $user->name }}</p>
                        <h4 class="text-xl font-semibold mt-4">Email</h4>
                        <p>{{ $user->email }}</p>
                        <h4 class="text-xl font-semibold mt-4">Adres</h4>
                        <p>{{ $user->address }}</p>
                        <h4 class="text-xl font-semibold mt-4">Telefoon</h4>
                        <p>{{ $user->phone }}</p>
                        <!-- Voeg hier meer gebruikersgegevens toe zoals stad, postcode, etc. -->
                    </div>
                </div>

                <!-- Berichten -->
                <div class="flex-1 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-2xl font-bold mb-4">Mijn Berichten</h3>
                        @if ($messages->isEmpty())
                            <p class="text-gray-500">Je hebt nog geen berichten verstuurd.</p>
                        @else
                            <ul class="space-y-4">
                                @foreach ($messages as $message)
                                    <li class="p-4 bg-gray-800 shadow rounded-lg mb-4">
                                        <span class="text-gray-300">{{ $message->content }}</span>
                                        @foreach ($message->replies as $reply)
                                            <div class="ml-4 mt-2 p-2 bg-gray-700 rounded">
                                                <span class="text-gray-400">{{ $reply->content }}</span>
                                            </div>
                                        @endforeach
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
