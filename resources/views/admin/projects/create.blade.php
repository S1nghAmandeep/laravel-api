@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1>Create Project</h1>
        </div>
        <div class="container">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        
              @csrf
        
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Titolo" value="{{ old('title') }}">
              </div>
              <div class="mb-3">
                <label for="link_project" class="form-label">Project (url)</label>
                <input type="url" class="form-control" name="link_project" id="link_project" placeholder="Url Project" value="{{ old('link_project') }}">
              </div>
              <div class="mb-3">
                <select class="form-select" name="category_id" id="category_id"  aria-label="Default select example">
                  <option value="">Select Category</option>
                  @foreach ($categories as $category)
                  <option @selected( old('category_id') == $category->id ) value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
              <p>Select the Technologies:</p>
              <div class="mb-3 d-flex flex-wrap gap-4">
                @foreach ($technologies as $technology)
                <div class="form-check">
                    <input class="form-check-input" name="technologies[]" type="checkbox" value="{{ $technology->id }}" id="technology_{{$technology->id}}" @checked( in_array($technology->id, old('technologies', [])))>
                    <label class="form-check-label" for="technology_{{$technology->id}}">
                      {{$technology->name}}
                    </label>
                </div>
                @endforeach
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Descrivi il comic">{{old('description')}}</textarea>
              </div>

              <div class="mb-3">
                <label for="cover_image" class="form-label">Default file input example</label>
                <input class="form-control" name="cover_image" type="file" id="cover_image">
              </div>
        
              <div class="mb-3">
                <input type="submit" class="btn btn-primary" value="create">
              </div>
        
            </form>
            @if ($errors->any())
              <div class="alert alert-danger">
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