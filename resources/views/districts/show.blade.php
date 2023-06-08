@extends('layout')

@section('content')
    <div class="container">
        <h2>District Details</h2>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $district->name }}" disabled>
        </div>
        <div class="mb-3">
            <label for="division" class="form-label">Division</label>
            <input type="text" class="form-control" id="division" name="division"
                value="{{ $district->division->name }}" disabled>
        </div>
        <a href="{{ route('districts.edit', $district->id) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit
        </a>
    </div>
@endsection
