@extends('layouts.app')

@section('title', 'Edit task')

@section('content')
    <form method="POST" action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $task->title }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">Long description</label>
            <textarea id="long_description" name="long_description" rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Edit task</button>
        </div>
    </form>
@endsection
