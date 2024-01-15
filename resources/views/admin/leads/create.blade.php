@extends('layouts.app')

@section('content')

<section>
    <div class="container">
        <form action="{{ route('admin.leads.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name')}}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email')}}">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message" id="message" rows="3" placeholder="Descrivi il comic">{{ old('message') }}</textarea>
        </div>

        <div class="mb-3 d-flex flex-wrap gap-4">
            <div class="form-check">
                <input class="form-check-input" name="privacy_policy" type="checkbox" value="1" id="privacy_policy" @checked( old('privacy_policy')))>
                <label class="form-check-label" for="privacy_policy">Acconsento al trattamento dei dati personali</label>
            </div>
        </div>

        <div class="">
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </div>
</form>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</section>
    
@endsection