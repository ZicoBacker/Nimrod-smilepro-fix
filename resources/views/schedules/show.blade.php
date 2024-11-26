@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $schedule->title }}</h1>
    <p>{{ $schedule->description }}</p>
    <p><strong>Start Time:</strong> {{ $schedule->start_time }}</p>
    <p><strong>End Time:</strong> {{ $schedule->end_time }}</p>
    <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-primary">Edit</a>
    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
