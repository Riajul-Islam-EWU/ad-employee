@extends('layout')

@section('content')
    <div class="container">
        <h2>Edit District</h2>
        <form action="{{ route('districts.update', $district->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $district->name }}" required>
            </div>
            <div class="mb-3">
                <label for="district_code" class="form-label">District Code</label>
                <input type="text" class="form-control" id="district_code" name="district_code"
                    value="{{ $district->district_code }}" required>
            </div>
            <div class="mb-3">
                <label for="division_id" class="form-label">Division</label>
                <select class="form-control" id="division_id" name="division_id" required>
                    <option value="">Select division</option>
                    @foreach ($divisions as $division)
                        <option value="{{ $division->id }}" {{ $district->division_id == $division->id ? 'selected' : '' }}>
                            {{ $division->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
