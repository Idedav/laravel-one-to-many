@extends('layouts.admin')

@section('content')
    <h1>Projects</h1>

    <div class="pagination-container">
        {{ $projects->links() }}
    </div>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Type</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->type?->name ?? '-' }}</td>
                    <td class="d-flex">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning me-2">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-primary me-2">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        @include('admin.partials.form-delete', [
                            'route' => route('admin.projects.destroy', $project),
                            'name' => $project->name,
                        ])
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
