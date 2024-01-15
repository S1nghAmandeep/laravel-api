@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Project Link</th>
                        <th>Category</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td><a href="{{ route('admin.projects.show', $project) }}">{{ $project->title }}</a></td>
                            <td><a href="#">{{ $project->link_project }}</a></td>
                            <td>{{ isset($project->category) ? $project->category->name : '-' }}</td>
                            {{-- <td>{{ optional($project->category)->name }}</td> --}}
                            <td><a class="btn btn-primary btn-sm" href="{{ route('admin.projects.edit', $project) }}">edit</a></td>
                            <td>
                                <button myBtn id="myBtn" class="btn btn-sm btn-danger delete">Delete</button>
                                <div id="bgForm" class="bg-form">
                                    <div class="d-flex gap-3 delete-form">
                                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-lg">Yes</button>
                                        </form>
                                    <button id="noBtn" class="btn btn-primary btn-lg">No</button>
                                </div>
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