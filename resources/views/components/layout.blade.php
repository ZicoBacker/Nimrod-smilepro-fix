<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tandartspraktijk</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
    <!-- Header -->
    <header class="bg-blue-800 text-white shadow-md">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <h1 class="text-2xl font-bold">Tandartspraktijk</h1>
            <p class="text-sm italic">Uw glimlach, onze zorg</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto mt-6 px-6">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white mt-12 py-6">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Tandartspraktijk. Alle rechten voorbehouden.</p>
        </div>
    </footer>
</body>
</html>