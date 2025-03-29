@section('title', isset($task) ? 'Edit task' : 'Add task')

@section('content')
    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title ?? old('title') }}"
                @class(['border-red-500' => $errors->has('title')])>
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" @class(['border-red-500' => $errors->has('title')])>{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="long_description">Long description</label>
            <textarea id="long_description" name="long_description" rows="10" @class(['border-red-500' => $errors->has('title')])>{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex gap-2 items-center">
            <button type="submit" class="btn">
                {{ isset($task) ? 'Edit task' : 'Add task' }}
            </button>
            <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
        </div>
    </form>
@endsection
