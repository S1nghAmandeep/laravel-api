@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Category</th>
                        <th></th>
                        <th>
                            @if (request()->has('trashed'))
                            <a href="{{ route('admin.projects.index') }}">Home</a></th>
                            @else
                            <a href="{{ route('admin.projects.index', ['trashed' => 1]) }}">Trash({{$trashedProjects}})</a></th>
                            @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td><a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a></td>
                            <td>{{ $project->slug }}</td>
                            <td>{{ isset($project->category) ? $project->category->name : '-' }}</td>
                            {{-- <td>{{ optional($project->category)->name }}</td> --}}
                            <td><a class="btn btn-primary btn-sm" href="{{ route('admin.projects.edit', $project) }}">edit</a></td>
                            <td>
                                @if ($project->trashed())
                                <form action="{{  route('admin.projects.restore', $project)}}" method="POST">
                                    @csrf
                                    <input class="btn btn-success btn-sm mb-2" type="submit" value="Restore">
                                </form>
                                @endif
                                <form  action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td>No Project</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection