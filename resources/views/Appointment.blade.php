<x-layout>
    <!-- component -->
    <div class="min-h-screen p-6 flex items-center justify-center">
        <div class="container max-w-screen-lg mx-auto">
            <div>
                <h2 class="font-semibold text-xl text-gray-600">Afspraak Formulier</h2>
                <p class="text-gray-500 mb-6">Vul het formulier in om een afspraak te maken.</p>

                <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Persoonlijke Gegevens</p>
                            <p>Vul alle velden in.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <div class="md:col-span-5">
                                    <label for="full_name">Volledige Naam</label>
                                    <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Bijv. Jan Jansen" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="email">E-mailadres</label>
                                    <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="email@voorbeeld.com" />
                                </div>
-
                                <div class="md:col-span-5">
                                    <label for="phone">Telefoonnummer</label>
                                    <input type="tel" name="phone" id="phone" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="+31 6 12345678" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="appointment_date">Afspraakdatum</label>
                                    <input type="date" name="appointment_date" id="appointment_date" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" />
                                </div>

                                <div class="md:col-span-5">
                                    <label for="notes">Eventuele Opmerkingen</label>
                                    <textarea name="notes" id="notes" rows="4" class="h-20 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Bijv. specifieke klachten of verzoeken"></textarea>
                                </div>

                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Verstuur</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
