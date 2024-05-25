@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description">{{ $task->description }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="inputState">Status</label>
            <select id="inputState" class="form-control" name="status">
                <option {{$task->status === 'Completed' ? 'selected' : ''}} value="Completed">Completed</option>
                <option {{$task->status === 'Incomplete' ? 'selected' : ''}} value="Incomplete">Incomplete</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
