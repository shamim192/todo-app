@extends('layouts.app')

@section('title', 'To-Do List')

@section('content')
    <h1 class="mb-4">To-Do List</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create New Task</a>

    <table class="table align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr class="{{ $task->status === 'Completed' ? 'completed-task' : 'incomplete-task' }}">
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td id="status-text-{{ $task->id }}">{{ $task->status === 'Completed' ? 'Completed' : 'Incomplete' }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary"><i class='far fa-edit'></i></a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class='far fa-trash-alt'></i></button>
                        </form>
                        <div class="form-check form-switch d-inline">
                            <input class="form-check-input change-status" type="checkbox" id="flexSwitchCheckChecked{{ $task->id }}" {{ $task->status === 'Completed' ? 'checked' : '' }} data-id="{{ $task->id }}">
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                let statusText = isChecked ? 'Completed' : 'Incomplete';
                let taskRow = $('#status-text-' + id).closest('tr');

                $.ajax({
                    url: "{{ route('tasks.toggleStatus') }}",
                    method: 'PUT',
                    data: {
                        status: isChecked,
                        id: id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#status-text-' + id).text(statusText);
                        if (isChecked) {
                            taskRow.removeClass('incomplete-task').addClass('completed-task');
                        } else {
                            taskRow.removeClass('completed-task').addClass('incomplete-task');
                        }
                        toastr.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
