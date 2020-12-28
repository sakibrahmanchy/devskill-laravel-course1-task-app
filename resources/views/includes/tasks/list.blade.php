@if(count($tasks) <= 0)
    You don't have any task created yet!!
    Maybe, <a href="">Create</a> one?
@else
    <div class="row">
        @foreach($tasks as $task)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $task->name }}</h5>
                        <p class="card-text">{{ $task->description }}</p>
                        <span class="text-primary">Ends at: {{ $task->end_time }}</span>
                        <br/><br/>
                        <a href="{{ route('task.edit', ['id' => $task->id]) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('task.delete', ['id' => $task->id]) }}"
                           class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
