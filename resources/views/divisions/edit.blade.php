@extends('layout')

@section('content')
    <div class="container">
        <h2>Edit Division</h2>
        <form action="{{ route('divisions.update', $division->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $division->name }}" required>
            </div>
            <div class="mb-3">
                <label for="division_code" class="form-label">Division Code</label>
                <input type="text" class="form-control" id="division_code" name="division_code"
                    value="{{ $division->division_code }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
