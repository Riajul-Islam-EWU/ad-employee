@extends('layout')

@section('content')
    <div class="container">
        <h2>Add Division</h2>
        <form action="{{ route('divisions.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter division name"
                    required>
            </div>
            <div class="mb-3">
                <label for="division_code" class="form-label">Division Code</label>
                <input type="text" class="form-control" id="division_code" name="division_code"
                    placeholder="Enter division code" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
