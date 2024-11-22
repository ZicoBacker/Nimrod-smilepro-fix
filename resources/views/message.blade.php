<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berichten Overzicht</title>
</head>

<body>
    <h1>Berichten Overzicht</h1>
    <ul>
        @foreach ($messages as $message)
            <li>
                {{ $message->content }}
                @if (!$message->is_read)
                    <form action="{{ route('messages.read', $message) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PUT')
                        <button type="submit">Markeer als gelezen</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
    <form action="{{ route('messages.store') }}" method="POST">
        @csrf
        <input type="text" name="content" placeholder="Nieuw bericht" required>
        <button type="submit">Toevoegen</button>
    </form>
</body>

</html>
