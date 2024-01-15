@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>hello World edit</h1>
            <div class="container">
                <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            
                  @csrf
                    @method('PUT')
                  <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{ old('title', $project->title )}}">
                  </div>
                  <div class="mb-3">
                    <label for="link_project" class="form-label">Project (url)</label>
                    <input type="url" class="form-control" name="link_project" id="link_project" placeholder="Url Project" value="{{ $project->link_project }}">
                  </div>
                  <div class="mb-3">
                    <select class="form-select" name="category_id" id="category_id" aria-label="Default select example">
                      <option value="">Select Category</option>
                      @foreach ($categories as $category)
                      <option @selected( old('category_id', optional($project->category)->id) == $category->id ) value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <p>Select the Technologies:</p>
                  <div class="mb-3 d-flex flex-wrap gap-4">
                    @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input class="form-check-input" name="technologies[]" type="checkbox" value="{{ $technology->id }}" id="technology_{{$technology->id}}" @checked( in_array($technology->id, old('technologies', $project->technologies->pluck('id')->all())))>
                        <label class="form-check-label" for="technology_{{$technology->id}}">
                          {{$technology->name}}
                        </label>
                    </div>
                    @endforeach
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrivi il comic">{{ $project->description }}
                    </textarea>
                  </div>

                  <div class="mb-3">
                    <label for="cover_image" class="form-label">Add file</label>
                    <input class="form-control" name="cover_image" type="file" id="cover_image">
                  </div>
            
            
                  <div class="mb-3">
                      <button type="submit" class="btn btn-primary">Save</button>
                  </div>
            
                </form>
            </div>
            @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

    </section>
@endsection