@extends('layouts.admin')

@section('content')
    <h1 class="mb-5">Projects by Types</h1>

    @foreach ($types as $type)
        <h4>{{ $type->name }}:</h4>
        <table class="table table-striped table-hover mb-5">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($type->projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ $project->description }}</td>
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
    @endforeach
@endsection
