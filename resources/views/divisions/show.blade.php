@extends('layout')

@section('content')
    <div class="container">
        <h2>Division Details</h2>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $division->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="division_code" class="form-label">Division Code</label>
            <input type="text" class="form-control" id="division_code" name="division_code"
                value="{{ $division->division_code }}" disabled>
        </div>
        <a href="{{ route('divisions.edit', $division->id) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
@endsection
