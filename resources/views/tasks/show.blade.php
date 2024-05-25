@extends('layouts.app')

@section('title', 'Task Details')

@section('content')
    <h1>Task Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text">{{ $task->description }}</p>
            <p class="card-text"><strong>Status: </strong>{{ $task->status ? 'Completed' : 'Incomplete' }}</p>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
