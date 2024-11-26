@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Schedule</h1>
    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $schedule->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $schedule->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
