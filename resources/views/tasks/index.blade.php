<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-lg mx-auto" style="max-width: 600px;">
            <div class="card-header text-center bg-primary text-white">
                <h1 class="h4">Todo List</h1>
            </div>
            <div class="card-body">
                <!-- Add Task Form -->
                <form action="/" method="POST" class="mb-4">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="task" placeholder="Enter a new task..." class="form-control" required>
                        <button type="submit" class="btn btn-primary">Add Task</button>
                    </div>
                </form>

                <!-- Task List -->
                <ul class="list-group list-group-flush">
                    @foreach ($tasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" @if($task->is_completed) checked @endif disabled>
                                <span class="@if($task->is_completed) text-decoration-line-through text-muted @endif">
                                    {{ $task->task }}
                                </span>
                            </div>
                            <div>
                                <!-- Mark as Completed Button (PATCH) -->
                                <form action="/{{ $task->id }}/complete" method="POST" class="d-inline">
                                    @method('PATCH') <!-- Simulate PATCH request -->
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-success">Mark as Completed</button>
                                </form>

                                <!-- Delete Button (DELETE) -->
                                <form action="/{{ $task->id }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
