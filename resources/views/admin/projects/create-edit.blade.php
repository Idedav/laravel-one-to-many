@extends('layouts.admin')


@section('content')
    <h1>{{ $title }}</h1>

    <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($method)
        <div class="mb-3">
            <label for="name" class="form-label">Project Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project?->name) }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Project Type:</label>
            <select class="form-select" id="type" name="type">
                <option selected>Select a type</option>
                @foreach ($types as $type)
                    <option value="{{ $type->id }}"
                        {{ old('type_id', $project?->type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach

            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" class="form-control" id="image" name="image"
                value="{{ old('image', $project?->image) }}">
            @if ($project)
                <img width="150" src="{{ asset('storage/' . $project->image) }}" alt="">
            @endif
        </div>
        <div class="mb-3">
            <label for="description">Description:</label>
            <textarea class="form-control" placeholder="Leave a description here" id="description" name="description"
                style="height: 100px">{{ old('description', $project?->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Confirm</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </form>
@endsection
