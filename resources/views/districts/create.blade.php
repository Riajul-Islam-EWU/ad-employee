@extends('layout')

@section('content')
    <div class="container">
        <h2>Add District</h2>
        <form action="{{ route('districts.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter district name" required>
            </div>
            <div class="mb-3">
                <label for="division_id" class="form-label">Division</label>
                <select class="form-control" id="division_id" name="division_id" required>
                    <option value="">Select division</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
